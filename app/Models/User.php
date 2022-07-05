<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'name',
        'role',
        'email',
        'password',
        'expertise_area',
        'employee_type',
        'managerial_capacity',
        'employee_category',
        'designation',
        'level',
        'partner',
        'sbu',
        'hr',
        'pm',
        'team',
        'previous_team',
        'joining_date',
        'confirmation_date',
        'career_start_date',
        'experience',
        'blood_group',
        'engagement',
        'eligible_salary_review',
        'eligible_bonus_review',
        'q_1_jul_sep_performance',
        'q_1_jul_sep_percentage',
        'q_2_oct_dec_performance',
        'q_2_oct_dec_percentage',
        'q_3_jan_mar_performance',
        'q_3_jan_mar_percentage',
        'promotion_22a',
        'promotion_21b',
        'promotion_21a',
        'plan_1',
        'plan_2',
        'current_status',
        'available_from'
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    protected $casts = [

    ];

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    public static function  getUser(){
        $users = DB::table('users')
            ->select(
                'id',
                'name',
                'role',
                'email',
                // 'password',
                'state',
                'expertise_area',
                'employee_type',
                'managerial_capacity',
                'employee_category',
                'designation',
                'level',
                'partner',
                'sbu',
                'hr',
                'pm',
                'mm',
                'team',
                'previous_team',
                'joining_date',
                'confirmation_date',
                'career_start_date',
                'experience',
                'blood_group',
                'engagement',
                'eligible_salary_review',
                'eligible_bonus_review',
                'q_1_jul_sep_performance',
                'q_1_jul_sep_percentage',
                'q_2_oct_dec_performance',
                'q_2_oct_dec_percentage',
                'q_3_jan_mar_performance',
                'q_3_jan_mar_percentage',
                'promotion_22a',
                'promotion_21b',
                'promotion_21a',
                'plan_1',
                'plan_2',
                'current_status',
                'available_from'
            )
            ->get()
            ->toArray();
        return $users;
    }

}
