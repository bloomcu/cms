<?php

namespace Cms\Http\Files;

use Illuminate\Http\Request;

use Cms\App\Controllers\Controller;
use Cms\Domain\Organizations\Organization;
use Cms\Http\Files\Resources\FileResource;

class FileController extends Controller
{
    /**
     * List files.
     *
     */
    public function index(Organization $organization, Request $request)
    {
        return FileResource::collection(
            $organization->files()
                ->orderBy('created_at', 'DESC')->get()
        );
    }

    /**
     * Store a file.
     *
     */
    public function store(Organization $organization, Request $request)
    {
        $file = $organization->files()->firstOrCreate(
            $request->only('path'),
            $request->only(['name', 'size'])
        );

        return new FileResource($file);
    }
}
