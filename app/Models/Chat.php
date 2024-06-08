<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Chat extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = false;

    protected $fillable = [
        'title',
        'description',
        'avatar_path',
    ];
}
