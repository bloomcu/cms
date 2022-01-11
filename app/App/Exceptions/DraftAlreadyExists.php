<?php

namespace Cms\App\Exceptions;

use Exception;

class DraftAlreadyExists extends Exception
{
    public function render($request)
    {
        $code = 409;

        return response()->json([
            'error'   => $code,
            'message' => 'A draft already exists for this model',
        ], $code);
    }
}
