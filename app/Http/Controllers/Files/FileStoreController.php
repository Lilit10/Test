<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\FileStoreRequest;
use App\Services\Files\FileStoreAction;

class FileStoreController extends Controller
{
    public function __invoke(FileStoreRequest $request, FileStoreAction $fileStoreAction)
    {
        $path = $fileStoreAction->run($request->getFile());

        return response()->json($path, 201);
    }
}
