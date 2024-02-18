<?php

namespace App\Services\Files;

use App\Models\File;

class FileShowAction
{
    public function run(int $fileId): File
    {
        return File::findOrFail($fileId);
    }
}
