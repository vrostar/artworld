<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $table = 'artworks';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'artist', 'description', 'year', 'price'];

    use HasFactory;
}
