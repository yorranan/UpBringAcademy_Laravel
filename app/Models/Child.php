<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $table = 'children';

    protected $fillable = [
        'children_id',
        'parent_id',
        'points'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'children_id');
    }
}
