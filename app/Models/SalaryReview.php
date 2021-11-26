<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryReview extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function quarter(){
        return $this->belongsTo(Quarter::class);
    }
}
