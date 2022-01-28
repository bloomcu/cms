<?php

namespace Tests\Unit\Domain\Organizations;

use Tests\TestCase;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Users\User;
use Cms\Domain\Properties\Property;

class OrganizationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_has_a_slug()
    {
        $organization = Organization::factory()->create();
        
        $this->assertNotNull($this->organization->slug);
    }

    /** @test */
    public function it_uses_the_slug_for_the_route_key_name()
    {
        $organization = Organization::factory()->create();
        
        $this->assertEquals($organization->getRouteKeyName(), 'slug');
    }

    /** @test */
    public function it_belongs_to_many_users()
    {
        $organization = Organization::factory()
            ->has(User::factory())
            ->create();

        $this->assertInstanceOf(User::class, $organization->users->first());
    }

    /** @test */
    public function it_has_many_properties()
    {
        $organization = Organization::factory()
            ->has(Property::factory())
            ->create();

        $this->assertInstanceOf(Property::class, $organization->properties->first());
    }
}
