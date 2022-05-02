<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePic extends Model
{
    use HasFactory;
    protected $fillable = ["photo", "user_id", "created_at", "updated_at"];
}
