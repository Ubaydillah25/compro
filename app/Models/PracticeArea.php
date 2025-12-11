<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'content',
        'icon',
        'order',
        'published',
    ];

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
}
