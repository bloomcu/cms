<?php

namespace Cms\App\Traits;

use Illuminate\Database\Eloquent\Model;

use Cms\App\Exceptions\DraftCannotBeDrafted;
use Cms\App\Exceptions\DraftAlreadyExists;
use Cms\App\Exceptions\DraftDoesNotExist;

use Cms\Domain\Layouts\Actions\ReplicateLayoutAction;

// TODO: Consider renaming this trait IsDraftable and creating
// another trait, IsPublishable to handle publishing.
trait IsPublishable {

    protected static function bootIsDraftable(): void
    {
        // tatic::addGlobalScope(new DraftingScope);
    }

    /**
     * Drafts that belong to model instance.
     *
     * @return HasMany
     */
    public function drafts()
    {
        return $this->hasMany('Cms\Domain\Layouts\Layout', 'drafted_id');
    }

    /**
     * Latest draft that belongs to model instance.
     *
     * @return HasOne
     */
    public function draft()
    {
        return $this->hasOne('Cms\Domain\Layouts\Layout', 'drafted_id')->latestOfMany();
    }

    /**
     * Determine if a model instance is a draft.
     *
     */
    public function isDraft(): bool
    {
        return $this->drafted_at !== null;
    }

    /**
     * Determine if model instance has a draft.
     *
     */
    public function hasDraft(): bool
    {
        return $this->draft()->exists();
    }

    /**
     * Store a new draft of model instance.
     *
     */
    public function createDraft(): Model
    {
        if ($this->isDraft()) {
            throw new DraftCannotBeDrafted;
        }

        if ($this->hasDraft()) {
            throw new DraftAlreadyExists;
        }

        // TODO: Add "replicate" method to model and call it from here.
        // Or, create a "CanReplicate" trait that resolves the action.
        // The layout model has leaked into this trait.

        $draft = ReplicateLayoutAction::execute($this, [
            'title'      => $this->title . ' - Draft',
            'drafted_id' => $this->id,
            'drafted_at' => now(),
            'created_at' => now(),

            // TODO: Scope draft to user who created it
            // 'user_id' => Auth::user()->id,
        ]);

        return $draft;
    }

    /**
     * Show draft belonging to model instance.
     *
     */
    public function publishDraft(): Model
    {
        if (! $this->hasDraft()) {
            throw new DraftDoesNotExist;
        }

        $published = ReplicateLayoutAction::execute($this->draft, [
            'title'      => $this->title,
            'drafted_id' => null,
            'drafted_at' => null,
            'created_at' => now(),
        ]);

        $this->delete();

        return $published;
    }

    /**
     * Show draft belonging to model instance.
     *
     */
    public function showDraft(): Model
    {
        if ($this->isDraft()) {
            throw new DraftCannotBeDrafted();
        }

        if (! $this->hasDraft()) {
            throw new DraftDoesNotExist;
        }

        return $this->draft;
    }
}
