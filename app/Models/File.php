<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class File extends Model
{
    use HasFactory;

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    protected $fillable = ['file_path'];

}
