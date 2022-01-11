<?php

namespace Cms\App\Exceptions;

use Exception;

class DraftDoesNotExist extends Exception
{
    public function render($request)
    {
        $code = 404;

        return response()->json([
            'error'   => $code,
            'message' => 'A draft does not exist for this model',
        ], $code);
    }
}
