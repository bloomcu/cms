<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Testing\TestResponse;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        // Add macro to Illuminate\Testing\TestResponse
        // Assert response uses the API resource provided
        TestResponse::macro('assertResource', function ($resource) {
            $this->assertJson($resource->response()->getData(true));
        });

        return $app;
    }
}
