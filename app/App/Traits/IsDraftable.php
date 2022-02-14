<?php

namespace Cms\App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Cms\App\Exceptions\DraftAlreadyPublished;

use Cms\Domain\Layouts\Actions\ReplicateLayoutAction;

trait IsDraftable {

    /**
     * Drafts that belong to model instance.
     *
     * @return HasMany
     */
    public function ancestor()
    {
        return $this->belongsTo(self::class, 'drafted_id');
    }

    /**
     * Scope a query to only include drafted models.
     *
     */
    public function scopeDrafted($query)
    {    
        return $query->whereNotNull('drafted_at')->latest()->first();
    }
    
    /**
     * Scope a query to only include published models.
     *
     */
    public function scopePublished($query)
    {
        return $query->whereNull('drafted_at')->latest()->first();
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
     * Show draft belonging to model instance.
     *
     */
    public function publish(): Model
    {
        if (!$this->isDraft()) {
            throw new DraftAlreadyPublished;
        }
        
        // TODO: Wrap the following two operations in a
        // database transactions in case of failure
        
        // Draft ancestor
        if ($this->ancestor()->exists()) {
            $this->ancestor->update([
                'drafted_at' => now()
            ]);
        }
        
        // Publish draft
        $this->update([
            'drafted_at' => null,
        ]);
        
        // TODO: Add "replicate" method to model and call it from here.
        // Or, create a "CanReplicate" trait that resolves the action.
        // The layout model has leaked into this trait.
        
        // Create new working draft
        $draft = ReplicateLayoutAction::execute($this, [
            'drafted_id' => $this->id,
            'drafted_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return $this;
    }

    /**
     * Store a new draft of model instance.
     *
     */
    // public function draft(): Model
    // {
    //     if ($this->isDraft()) {
    //         throw new DraftAlreadyDrafted;
    //     }
    // 
    //     // Make a drafted copy of this model
    //     $draft = ReplicateLayoutAction::execute($this, [
    //         'drafted_id' => $this->id,
    //         'drafted_at' => null,
    //         'created_at' => now(),
    //         'updated_at' => now(),
    // 
    //         // TODO: Scope draft to user who created it
    //         // 'user_id' => Auth::user()->id,
    //     ]);
    // 
    //     $this->update([
    //         'drafted_at' => now()
    //     ]);
    // 
    //     return $draft;
    // }
}
