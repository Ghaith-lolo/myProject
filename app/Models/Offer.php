<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table = "offers";

    protected $fillable = [
        'photo',
        'name',
        'price',
        'details',
        'created-at',
        'updated_at',

    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
}
