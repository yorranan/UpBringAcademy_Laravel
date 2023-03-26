<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskChildren extends Model
{
    use HasFactory;

    protected $table = 'tasks_children';

    protected $fillable = [
        'tasks_id',
        'users_id',
        'status'
    ];
}
