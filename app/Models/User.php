<?php

namespace App\Models;

use EscapeWork\LaravelSteroids\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{

    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * Table
     */
    protected $table = 'users';

    /**
     * Fillable fields
     */
     protected $fillable = [
         'name',
         'cpf',
         'email',
         'address',
         'city',
         'state',
         'phone',
         'income',
        'password',
     ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($password)
    {
      if ($password != '') {
          $this->attributes['password'] = \Hash::make($password);
      }
    }

    public function setPhoneAttribute($phone){
      $this->attributes['phone'] = str_replace(['(', ')', '-'], '', $phone);
    }

    public function setCpfAttribute($cpf){
      $this->attributes['cpf'] = str_replace(['.', '-'], '', $cpf);
    }

    public function setIncomeAttribute($income){

      $data = str_replace('.', '', $income);

      $this->attributes['income'] = str_replace(',', '.', $data);
    }

}
