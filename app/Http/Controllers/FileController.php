<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;

use App\Http\Resources\FileResource;

class FileController extends Controller
{
    /**
     * List files.
     *
     */
    public function index(Company $company, Request $request)
    {
        return FileResource::collection($company->files);
    }

    /**
     * Store a file.
     *
     */
    public function store(Company $company, Request $request)
    {
        $file = $company->files()->firstOrCreate(
            $request->only('path'),
            $request->only(['name', 'size'])
        );

        return new FileResource($file);
    }
}
