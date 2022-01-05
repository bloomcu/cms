<?php

namespace Cms\App\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait HasSlug {

    protected static function bootHasSlug(): void
    {
        static::creating(function (Model $model) {
            $slug = Str::slug($model->title);
            $model->slug = $model->generateUniqueSlug($slug);
        });

        // TODO: After "updated" event, we might check that the slug is still unique
        // static::updated(function (Model $model) {});
    }

    protected function generateUniqueSlug(string $slug): string
    {
        $baseSlug = $slug;

        $i = 2;
        while ($this->otherRecordsExistWithSlug($slug)) {
            $slug = $baseSlug . '-' . $i++;
        }

        return $slug;
    }

    protected function otherRecordsExistWithSlug(string $slug): bool
    {
        $query = static::where('slug', '=', $slug);

        if ($this->usesSoftDeletes()) {
            $query->withTrashed();
        }

        return $query->exists();
    }

    protected function usesSoftDeletes(): bool
    {
        return in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($this), true);
    }
}
