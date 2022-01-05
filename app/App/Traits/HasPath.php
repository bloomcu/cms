<?php

namespace Cms\App\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasPath {

    protected static function bootHasPath(): void
    {
        static::creating(function (Model $model) {
            // TODO: Initially, the path is generated from the slug alone.

            $model->uri = implode('/', [$model->path, $model->slug]);
        });

        static::updating(function (Model $model) {
            // TODO: Eventually you might need to generate your slug from
            // other model properties. For this, consider a pipeline, "generateSlugPipline".
            // The pipeline accept the model properties to be used e.g., title, category, published date.

            if ($model->isDirty('slug') || $model->isDirty('path')) {
                $model->uri = $model->generateUriFromParts([$model->path, $model->slug]);
            }
        });
    }

    protected function generateUriFromParts(array $parts): string
    {
        $uri = implode('/', $parts);

        return $uri;
    }
}
