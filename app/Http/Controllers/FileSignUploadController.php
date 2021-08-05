<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Company;

use Aws\S3\PostObjectv4 as S3PostObject;

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
        $object = new S3PostObject(
            Storage::disk('s3')->getAdapter()->getClient(),
            config('filesystems.disks.s3.bucket'),
            ['key' => 'files/' . $filename],
            [
                ['bucket' => config('filesystems.disks.s3.bucket')],
                ['starts-with', '$key', 'files/']
            ]
        );

        return response()->json([
            'attributes' => $object->getFormAttributes(),
            'additionalData' => $object->getFormInputs(),
        ]);
    }
}
