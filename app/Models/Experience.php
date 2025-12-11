<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sector',
        'year',
        'summary',
        'content',
        'practice_area_id',
    ];

    public function practiceArea()
    {
        return $this->belongsTo(PracticeArea::class);
    }
}
