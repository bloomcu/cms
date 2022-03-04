<?php

namespace Cms\App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Carbon\Carbon;

use Cms\Domain\Posts\Actions\ReplicatePostAction;

// use Cms\App\Exceptions\DraftCannotBeDrafted;
// use Cms\App\Exceptions\DraftAlreadyExists;
// use Cms\App\Exceptions\DraftDoesNotExist;

trait IsPublishable {
    
    /**
     * Apply scope that excludes published posts globally
     *
     */
    protected static function bootIsPublishable(): void
    {
        static::addGlobalScope(function(Builder $builder) {
            $builder->whereNull('published_at');
        });
    }
    
    /**
     * Published descendents of model.
     *
     */
    public function descendents()
    {
        return $this->hasMany(self::class, 'draft_id')->withoutGlobalScopes();
    }
    
    /**
     * Scope a query to only include published models.
     *
     */
    public function scopePublished(Builder $builder)
    {
        $builder->withoutGlobalScopes()->whereNotNull('published_at');
    }
    
    /**
     * Scope a query to only include drafted models.
     *
     */
    public function scopeDrafted(Builder $builder)
    {
        $builder->withoutGlobalScopes()->whereNotNull('drafted_at');
    }
    
    /**
     * Does draft model have a published decendent.
     *
     */
    public function wasPublished(): bool
    {
        return $this->descendents()->whereNotNull('published_at')->exists();
    }
    
    /**
     * Does draft model have unpublished changes.
     */
    public function hasUnpublishedChanges(): bool
    {
        return $this->updated_at->gt($this->drafted_at);
    }
    
    /**
     * Publish model
     */
    public function publish()
    {
        $this->update([
            'drafted_at' => now(),
        ]);
        
        // TODO: Rather then delete, we could make set a 'revised_at' column
        $this->descendents()->delete();
        
        ReplicatePostAction::execute($this, [
            'draft_id'   => $this->id,
            'drafted_at' => null,
            'published_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    /**
     * @return bool
     */
    public function unpublish()
    {
        $this->descendents()->withoutGlobalScopes()->delete();
    }
}
