<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    // public function getStartAttribute ($value) {
    //     return Carbon::createFromFormat('Y-m-d',$value)->format('j-M-y');
    // }

    // public function getEndAttribute ($value) {
    //     return Carbon::createFromFormat('Y-m-d',$value)->format('j-M-y');
    // }

    // public function setStartAttribute ($value) {
    //     return Carbon::createFromFormat('j-M-y',$value)->format('Y-m-d');
    // }

    // public function setEndAttribute ($value) {
    //     return Carbon::createFromFormat('j-M-y',$value)->format('Y-m-d');
    // }

    public function xp() {
        $start = strtotime($this->start);
        $end = strtotime($this->end);
        return number_format(($end-$start)/(86400*365), 2);
    }

    public function salaryReview(){
        return $this->hasOne(SalaryReview::class);
    }
}
