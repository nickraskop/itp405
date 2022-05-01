<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["caption", "file_path", "user_id", "created_at", "updated_at"];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
