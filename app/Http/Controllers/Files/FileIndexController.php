<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Services\Files\FileIndexAction;

class FileIndexController extends Controller
{
    public function __invoke(FileIndexAction $fileIndexAction)
    {
        $files = $fileIndexAction->run();

        return response()->json($files);
    }
}
