<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;

class FileStoreRequest extends FormRequest
{
    const FILE = 'file';

    public function rules(): array
    {
        return [
            self::FILE => 'required|file',
        ];
    }

    public function getFile(): \Illuminate\Http\UploadedFile
    {
        return $this->file(self::FILE);
    }
}
