<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Den extends Model
{
    use HasFactory;
     protected $fillable = ['id','siki', 'goukei'];
}
