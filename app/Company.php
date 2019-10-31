<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Company extends Model
{
    //
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'companyname','companyaddress'
    ];

    public function users(){
        return $this->hasMany('App\User');
    }
}

