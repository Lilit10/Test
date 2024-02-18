<?php

namespace App\Services\Files;

use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUpdateAction
{
    public function run(int $fileId, UploadedFile $file): File
    {
        $fileModel = File::findOrFail($fileId);

        Storage::delete($fileModel->file_path);

        $fileModel->update(['file_path' => Storage::put('files', $file)]);

        return $fileModel;
    }
}
