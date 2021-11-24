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
        // $file = $organization->files()->firstOrCreate(
        //     $request->only('path'),
        //     $request->only(['name', 'size'])
        // );

        $file = File::create([
            'organization_id' => 1,
            'user_id' => 1,
            'name' => $request['name'],
            'path' => $request['path'],
            'size' => $request['size']
        ]);

        return new FileResource($file);
    }
}