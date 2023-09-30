<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'image'];

    protected $casts = ['image' => 'array'];
}
