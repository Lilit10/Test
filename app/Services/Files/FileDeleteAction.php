<?php

namespace App\Services\Files;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileDeleteAction
{
    public function run(int $fileId): void
    {
        $file = File::findOrFail($fileId);

        Storage::delete($file->file_path);

        $file->delete();
    }
}
