<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'name',
        'role',
        'email',
        'password',
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
        'mm',
        'team',
        'previous_team',
        'joining_date',
        'confirmation_date',
        'career_start_date',
        'blood_group',
        'engagemant',
        'last_performance',
        'last_review',
        'comments',
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
}
