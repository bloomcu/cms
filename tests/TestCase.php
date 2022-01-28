<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function setUp(): void
    {
        parent::setup();
        
        $this->organization = Organization::factory()->create();
        
        $this->property = Property::factory()->for($this->organization)->create();
    }
}
