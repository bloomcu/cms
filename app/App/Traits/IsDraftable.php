<?php

namespace Cms\App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Cms\App\Exceptions\DraftAlreadyUnrafted;

use Cms\Domain\Layouts\Actions\ReplicateLayoutAction;

trait IsDraftable {

    /**
     * Drafts that belong to model instance.
     *
     * @return HasMany
     */
    public function descendents()
    {
        return $this->hasMany(self::class, 'draft_id');
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
        $query->whereNull('drafted_at')->latest();
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
    public function undraft(): Model
    {
        if (!$this->isDraft()) {
            throw new DraftAlreadyUnrafted;
        }
        
        // dd($this->draftParent);
        
        // TODO: Wrap the following two operations in a
        // database transactions in case of failure
        
        // Draft descendents
        $this->descendents()->update([
            'drafted_at' => now()
        ]); 
        
        // TODO: Add "replicate" method to model and call it from here.
        // Or, create a "CanReplicate" trait that resolves the action.
        // The layout model has leaked into this trait.
        
        // Make an undrafted copy of this model
        $undrafted = ReplicateLayoutAction::execute($this, [
            'draft_id' => $this->id,
            'drafted_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $undrafted;
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
    //         'draft_id' => $this->id,
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
