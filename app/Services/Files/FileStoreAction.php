<?php

namespace App\Services\Files;

use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileStoreAction
{
    public function run(UploadedFile $file): string
    {
        $path = Storage::put('files', $file);

        File::create([
            "file_path" => $path
        ]);

        return $path;
    }
}
