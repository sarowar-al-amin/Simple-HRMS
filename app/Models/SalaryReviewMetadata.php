<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryReviewMetadata extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'categorical_feedbacks' => 'array',
        'categorical_justifications' => 'array',
        'behavioural_feedbacks' => 'array',
        'behavioural_justifications' => 'array',
    ];

    public $timestamps = false;
}
