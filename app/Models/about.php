<?php

namespace App\Models;


use App\Models\About;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about extends Model
{
     use HasFactory;

    protected $table = 'about';

     protected $fillable = [
        'title',
        'description'
    ];
}
