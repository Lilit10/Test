<?php

// In Chat.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'is_group', 'avatar'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'chat_users');
    }
}
