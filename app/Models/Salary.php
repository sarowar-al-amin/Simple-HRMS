<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Salary extends Model
{
    use HasFactory;

    protected $table = 'salary_review_metadata';

    public static function  getReview(){
        $review = DB::table('salary_review_metadata')->select('salary_review_id','user_id', 'performance', 'promotion', 'sbu_comment')->get()->toArray();
        return $review;
    }
}
