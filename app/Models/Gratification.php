<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gratification extends Model
{
    use HasFactory;

    protected $table = 'gratifications';

    protected $primary_key = 'id';

    protected $fillable = [
        'user_id',
        'name',
        'realizationPoints',
        'description'
    ];
}
