<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryReview extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function quarter(){
        return $this->belongsTo(Quarter::class);
    }
}
