<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\UserResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    protected  $primaryKey = 'rut';
    public $incrementing = false;
    public $timestamps = false;
    const UPDATED_AT = false;

    public function residente(){
        return $this->hasOne(Residente::class);
    }


    public function role() {

        return $this->belongsTo(Role::class);

    }

    public function esAdmin(){

        if($this->role->nombre_rol == 'administrador'){

            return true;

        }
        return false;

    }

    public function esResidente(){

        if($this->role->nombre_rol == 'residente'){

            return true;

        }
        return false;

    }




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'rut',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }

}
