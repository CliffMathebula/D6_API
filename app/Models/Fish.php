<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    use HasFactory;

    protected $table = 'fish';
    protected $fillable = ['user_id','aquarium_id', 'species', 'color', 'fins_no'];
    protected $hidden = ['created_at', 'updated_at'];
}