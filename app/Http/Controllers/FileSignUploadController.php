<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Company;

use Aws\S3\PostObjectv4;

class FileSignUploadController extends Controller
{
    /**
     * Create a signed upload request
     *
     */
    public function sign(Company $company, Request $request)
    {
        // Generate a filename
        $filename = md5($request->name . microtime()) . '.' . $request->extension;

        // Create a signed upload request for AWS S3
        $object = new PostObjectv4(
            // S3 Client interface
            Storage::disk('s3')->getAdapter()->getClient(),

            // Bucket to be used
            config('filesystems.disks.s3.bucket'),

            // Form inputs
            ['key' => 'files/' . $filename],
            // ['key' => $filename],

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
