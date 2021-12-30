<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryReview extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    public function getStartAttribute ($value) {
        return Carbon::createFromFormat('Y-m-d',$value)->format('j M Y');
    }

    public function getEndAttribute ($value) {
        return Carbon::createFromFormat('Y-m-d',$value)->format('j M Y');
    }

    public function quarter(){
        return $this->belongsTo(Quarter::class);
    }
}
