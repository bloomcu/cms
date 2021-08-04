<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Str;

use App\Models\Company;

use App\Http\Resources\FileResource;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Company $company, Request $request)
    {
        return FileResource::collection($company->files);
    }
}
