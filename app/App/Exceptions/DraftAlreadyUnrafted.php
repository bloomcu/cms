<?php

namespace Cms\App\Exceptions;

use Exception;

class DraftAlreadyUnrafted extends Exception
{
    public function render($request)
    {
        $code = 409;

        return response()->json([
            'error'   => $code,
            'message' => 'This model has already been undrafted.',
        ], $code);
    }
}
