<?php

namespace Cms\App\Exceptions;

use Exception;

class DraftCannotBeDrafted extends Exception
{
    public function render($request)
    {
        $code = 409;

        return response()->json([
            'error'   => $code,
            'message' => 'A draft cannot be drafted.',
        ], $code);
    }
}
