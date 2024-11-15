<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = ['title', 'description', 'image_1', 'image_2', 'status'];
}