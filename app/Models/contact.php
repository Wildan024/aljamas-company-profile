<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
     use HasFactory;

    protected $table = 'contact';

     protected $fillable = [
        'name',
        'description',
        'logo',
        'alamat',
        'email',
        'telepon',
        'maps_embed'
    ];
}
