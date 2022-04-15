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
        // 'state',
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
        // 'mm',
        'team',
        'previous_team',
        'joining_date',
        'confirmation_date',
        'career_start_date',
        'experience',
        'blood_group',
        'engagement',
        'last_performance',
        'second_last_performance',
        'last_promotion',
        'second_last_promotion',
        //'eligibility',
        // 'comments',
        'eligible_salary_review',
        'eligible_bonus_review',
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
                'last_performance',
                'second_last_performance',
                'last_promotion',
                'second_last_promotion',
                //'eligibility',
                'comments',
                'eligible_salary_review',
                'eligible_bonus_review',
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
