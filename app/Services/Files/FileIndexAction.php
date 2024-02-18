<?php

namespace App\Services\Files;

use App\Models\File;

class FileIndexAction
{
    public function run(): array
    {
        return File::all()->toArray();
    }
}
