<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class SalaryReviewMetadata extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    public $timestamps = false;

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('user_id', 'like', '%'.$search.'%')
                ->orWhere('sbu', 'like', '%'.$search.'%')
                ->orWhere('pm', 'like', '%'.$search.'%')
                ->orWhere('promotion', 'like', '%'.$search.'%');
    }

}
