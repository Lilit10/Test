<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Services\Files\FileShowAction;

class FileShowController extends Controller
{
    public function __invoke(FileShowAction $fileShowAction, $id)
    {
        $file = $fileShowAction->run($id);

        return response()->json($file);
    }
}
