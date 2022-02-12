<?php

namespace Cms\App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Cms\App\Exceptions\DraftAlreadyDrafted;
use Cms\App\Exceptions\DraftAlreadyUnrafted;

use Cms\Domain\Layouts\Actions\ReplicateLayoutAction;

trait IsDraftable {

    /**
     * Drafts that belong to model instance.
     *
     * @return HasMany
     */
    public function draftParent()
    {
        return $this->belongsTo('Cms\Domain\Layouts\Layout', 'drafted_id');
    }

    /**
     * Scope a query to only include drafted models.
     *
     */
    public function scopeDrafted($query)
    {
        $query->where('drafted_at', '<=', Carbon::now())
            ->whereNotNull('drafted_at')
            ->latest();
    }
    
    /**
     * Scope a query to only include undrafted models.
     *
     */
    public function scopeUndrafted($query)
    {
        $query->where('drafted_at', '>', Carbon::now())
            ->orWhereNull('drafted_at')
            ->latest();
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
     * Store a new draft of model instance.
     *
     */
    public function draft(): Model
    {
        if ($this->isDraft()) {
            throw new DraftAlreadyDrafted;
        }

        // TODO: Add "replicate" method to model and call it from here.
        // Or, create a "CanReplicate" trait that resolves the action.
        // The layout model has leaked into this trait.
        
        // Make a drafted copy of this model
        $draft = ReplicateLayoutAction::execute($this, [
            'drafted_id' => $this->id,
            'drafted_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            
            // TODO: Scope draft to user who created it
            // 'user_id' => Auth::user()->id,
        ]);
        
        return $draft;
    }

    /**
     * Show draft belonging to model instance.
     *
     */
    public function undraft(): Model
    {
        if (!$this->isDraft()) {
            throw new DraftAlreadyUnrafted;
        }
        
        // Make an undrafted copy of this model
        $undrafted = ReplicateLayoutAction::execute($this, [
            'drafted_id' => null,
            'drafted_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Redraft parent
        if ($this->draftParent) {
            $this->draftParent->update([
                'drafted_at' => now(),
                'drafted_id' => $undrafted->id
            ]);    
        }

        return $undrafted;
    }
}
