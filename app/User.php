<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use jazmy\FormBuilder\Traits\HasFormBuilderTraits;
class User extends Authenticatable
{
    use Notifiable,HasApiTokens,HasFormBuilderTraits;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name', 'email' , 'role_id' ,
        'username', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function OauthAccessToken(){
        return $this->hasMany('\App\Models\OauthAccessToken');
    }
    public function question(){
        return $this->hasMany('\App\Models\Question');
    }
    public function survey(){
        return $this->hasMany('\App\Models\SurveyAPI');
    }
    public function answer(){
        return $this->hasMany('\App\Models\Answer');
    }
}
