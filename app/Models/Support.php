<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    // Indicate which values I wanna receive from the user.
    protected $fillable = [
        'subject',
        'status',
        'body'
    ];
}
