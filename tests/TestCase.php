<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Pages\Page;
use Cms\Domain\Blocks\Block;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function setUp(): void
    {
        parent::setup();

        // Our codebase is structured by domain, so we must
        // tell the Factory builder where to find our factories
        // Factory::guessFactoryNamesUsing(function (string $modelName) {
        //     return 'Database\\Factories\\' . class_basename($modelName) . 'Factory';
        // });
    }
}
