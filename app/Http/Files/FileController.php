<?php

namespace Cms\Http\Files;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

use Cms\Domain\Organizations\Organization;

use Cms\Http\Files\Resources\FileCollection;
use Cms\Http\Files\Resources\FileResource;
use Cms\Domain\Files\File;

class FileController extends Controller
{
    /**
     * List files.
     *
     */
    public function index(Organization $organization, Request $request)
    {
        $organization = $organization->files()
            ->latest()
            ->get();

        return new FileCollection($organization);
    }

    /**
     * Store a file.
     *
     */
    public function store(Organization $organization, Request $request)
    {
        // TODO: If user uploads a duplicate, do we just update it's name and size?
        // TODO: This will likely require more check to be sure it's a duplicate.
        // $file = $organization->files()->firstOrCreate(
        //     $request->only('path'),
        //     $request->only(['name', 'size'])
        // );

        // TODO: Use a FormRequest to validate request before creating file.
        $file = File::create([
            'organization_id' => 1,
            'user_id' => 1,
            'type' => $request['type'],
            'name' => $request['name'],
            'path' => $request['path'],
            'size' => $request['size']
        ]);

        return new FileResource($file);
    }
}
