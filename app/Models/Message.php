<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'chat_id', 'content', 'file_id'];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

}
