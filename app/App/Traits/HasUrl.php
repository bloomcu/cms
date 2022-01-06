<?php

namespace Cms\App\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasUrl {

    protected static function bootHasUrl(): void
    {
        static::creating(function (Model $model) {
            $model->url = $model->generateUrlFromParts([$model->path, $model->slug]);

            // TODO: Decide if we want to serve absolute URLs instead.
            // Personally, I think this might violate the headless paradigm
            // by bleeding client domain into the CMS. Imagine clients on
            // seperate domains (website, blog) might consume CMS content.
        });

        static::updating(function (Model $model) {
            if ($model->isDirty('slug') || $model->isDirty('path')) {
                $model->url = $model->generateUrlFromParts([$model->path, $model->slug]);
            }

            // TODO: Eventually you might need to generate your slug from
            // other model properties. For this, consider a pipeline, "generateSlugPipline".
            // The pipeline accepts properties to be used e.g., domain, category, title, published date.
        });
    }

    protected function generateUrlFromParts(array $parts): string
    {
        $url = implode('/', $parts);

        return $url;
    }
}
