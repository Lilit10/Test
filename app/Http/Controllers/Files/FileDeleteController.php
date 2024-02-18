<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Services\Files\FileDeleteAction;

class FileDeleteController extends Controller
{
    public function __invoke(FileDeleteAction $fileDeleteAction, $id)
    {
        $fileDeleteAction->run($id);

        return response()->json(['message' => 'File deleted successfully']);
    }
}
