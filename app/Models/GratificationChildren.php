<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GratificationChildren extends Model
{
    use HasFactory;

    protected $table = 'gratifications_children';

    protected $fillable = [
        'gratifications_id',
        'children_id',
        'status'
    ];
}
