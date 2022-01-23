<?php

namespace Cms\App\Traits;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as BaseCollection;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

// Domains
use Cms\Domain\Categories\Category;

// TODO: We might need an exception that ensures a model
// can only have one category from a given tree.

trait IsCategorizable 
{
    /**
     * Boot the categorizable trait for the model.
     *
     * @return void
     */
    public static function bootIsCategorizable()
    {
        static::deleted(function (self $model) {
            $model->categories()->detach();
        });
    }
    
    /**
     * Get all attached categories to the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function categories(): MorphToMany
    {
        return $this->morphToMany('Cms\Domain\Categories\Category', 'categorizable')->withTimestamps();
    }
    
    /**
     * Attach model categories.
     *
     * @param mixed $categories
     *
     * @return $this
     */
    public function attachCategories($categories)
    {
        return $this->syncCategories($categories, false);
    }

    /**
     * Detach model categories.
     *
     * @param mixed $categories
     *
     * @return $this
     */
    public function detachCategories($categories = null)
    {
        $categories = ! is_null($categories) ? $this->prepareCategoryIds($categories) : null;
    
        // Sync model categories
        $this->categories()->detach($categories);
    
        return $this;
    }
    
    /**
     * Sync model categories.
     *
     * @param mixed $categories
     * @param bool  $detaching
     *
     * @return $this
     */
    public function syncCategories($categories, bool $detaching = true)
    {
        // Find categories
        $categories = $this->prepareCategoryIds($categories);

        // Sync model categories
        $this->categories()->sync($categories, $detaching);

        return $this;
    }

    /**
     * Prepare category IDs.
     *
     * @param mixed $categories
     *
     * @return array
     */
    protected function prepareCategoryIds($categories): array
    {
        // Convert collection to plain array
        if ($categories instanceof BaseCollection && is_string($categories->first())) {
            $categories = $categories->toArray();
        }

        // Find categories by their ids
        if (is_numeric($categories) || (is_array($categories) && is_numeric(Arr::first($categories)))) {
            return array_map('intval', (array) $categories);
        }

        // Find categories by their slugs
        if (is_string($categories) || (is_array($categories) && is_string(Arr::first($categories)))) {
            $categories = Category::whereIn('slug', (array) $categories)->get()->pluck('id');
        }

        if ($categories instanceof Model) {
            return [$categories->getKey()];
        }

        if ($categories instanceof Collection) {
            return $categories->modelKeys();
        }

        if ($categories instanceof BaseCollection) {
            return $categories->toArray();
        }

        return (array) $categories;
    }
}
