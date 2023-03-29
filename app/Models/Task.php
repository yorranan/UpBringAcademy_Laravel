<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model{
    
    use HasFactory;

    protected $table = 'tasks';
    
    protected $primary_key = 'id';

    protected $fillable = [
        'user_id',
        'name',
        'beginDateTime',
        'endDateTime',
        'description',
        'points_realization',
    ];
}
