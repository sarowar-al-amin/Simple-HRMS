<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusReview extends Model
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
}
