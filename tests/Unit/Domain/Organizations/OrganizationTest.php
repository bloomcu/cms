<?php

namespace Tests\Unit\Domain\Organizations;

use Tests\TestCase;

use Cms\Domain\Organizations\Organization;
use Cms\Domain\Layouts\Layout;
use Cms\Domain\Users\User;
use Cms\Domain\Pages\Page;
use Cms\Domain\Files\File;

class OrganizationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->organization = Organization::factory()->create();
    }

    /** @test */
    public function it_has_a_uuid()
    {
        $this->assertNotNull($this->organization->uuid);
    }

    /** @test */
    public function its_uuid_is_unique()
    {
        $anotherOrganization = Organization::factory()->create();

        $this->assertNotEquals(
            $this->organization->uuid,
            $anotherOrganization->uuid
        );
    }

    /** @test */
    public function it_has_a_slug()
    {
        $this->assertNotNull($this->organization->slug);
    }

    /** @test */
    public function it_uses_the_slug_for_the_route_key_name()
    {
        $this->assertEquals($this->organization->getRouteKeyName(), 'slug');
    }

    /** @test */
    public function it_belongs_to_many_users()
    {
        $this->organization->users()->attach(
            User::factory()->create()
        );

        $this->assertInstanceOf(User::class, $this->organization->users->first());
    }

    /** @test */
    public function it_has_many_pages()
    {
        $this->organization->pages()->save(
            Page::factory()->create()
        );

        $this->assertInstanceOf(Page::class, $this->organization->pages->first());
    }

    /** @test */
    public function it_has_many_files()
    {
        $this->organization->files()->save(
            File::factory()->create()
        );

        $this->assertInstanceOf(File::class, $this->organization->files->first());
    }
}
