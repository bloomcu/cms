<?php

namespace Cms\Http\Files;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Organizations\Organization;
use Cms\Domain\Properties\Property;

// Vendors
use Aws\S3\PostObjectV4;

class FileSignUploadController extends Controller
{
    /**
     * Create a signed upload request
     *
     */
    public function sign(Organization $organization, Property $property, Request $request)
    {
        // Generate a filename
        $filename = md5($request->name . microtime()) . '.' . $request->extension;

        // Create a signed upload request for AWS S3
        $object = new PostObjectV4(
            // S3 Client interface
            Storage::disk('s3')->getAdapter()->getClient(),

            // Bucket to be used
            config('filesystems.disks.s3.bucket'),

            // Form inputs
            ['key' => 'files/' . $filename],

            // Policy condition options
            [
                ['bucket' => config('filesystems.disks.s3.bucket')],
                ['starts-with', '$key', 'files']
            ]
        );

        return response()->json([
            'attributes' => $object->getFormAttributes(),
            'additionalData' => $object->getFormInputs(),
        ]);
    }
}
