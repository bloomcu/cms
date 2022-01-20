<?php

namespace Cms\Http\Files;

use Illuminate\Http\Request;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;
use Cms\Domain\Files\File;

// Resources
use Cms\Http\Files\Resources\FileCollection;
use Cms\Http\Files\Resources\FileResource;

class FileController extends Controller
{
    /**
     * List files.
     *
     */
    public function index(Organization $organization, Property $property, Request $request)
    {
        $files = $property->files()
            ->latest()
            ->get();

        return new FileCollection($files);
    }

    /**
     * Store a file.
     *
     */
    public function store(Organization $organization, Property $property, Request $request)
    {
        // TODO: Use a FormRequest to validate request before creating file.
        
        // TODO: Create some kind of helper that automatically attributes the
        // authenticated user to this model.
        
        $file = $property->files()->create([
            'user_id' => 1,
            'type' => $request['type'],
            'name' => $request['name'],
            'path' => $request['path'],
            'size' => $request['size']
        ]);

        return new FileResource($file);
    }
    
    // TODO: Here, we want to update the path and size,
    // We're essentially replacing the file. We may want to
    // trigger a file deletion in S3 for the old file. Or,
    // We could keep that file path as a "revision".
    
    // public function update(Organization $organization, Property $property, File $file, Request $request)
    // {
    //     $file->update(
    //         
    //     );
    // 
    //     return new FileResource($file);
    // }
}
