<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aquariums extends Model
{
    use HasFactory;

    protected $table = 'aquariums';

    protected $fillable = ['user_id', 'glass_type', 'size_in_litres', 'shape' ];

    protected $hidden =['created_at', 'updated_at',];
}
