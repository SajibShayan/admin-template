<?php

namespace App\Models;

use App\Traits\OrderByDesc;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, OrderByDesc;
    public const TAG = "categories";

    protected $fillable = [
        'name',
        'description',
    ];
}
