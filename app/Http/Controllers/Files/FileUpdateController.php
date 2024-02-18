<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\FileUpdateRequest;
use App\Services\Files\FileUpdateAction;

class FileUpdateController extends Controller
{
    public function __invoke(FileUpdateRequest $request, FileUpdateAction $fileUpdateAction, $id)
    {
        $file = $fileUpdateAction->run($id, $request->getFile());

        return response()->json($file, 201);
    }
}
