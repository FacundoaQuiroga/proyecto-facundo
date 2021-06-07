<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsidio extends Model
{
    use HasFactory;

    protected $guarded = [];
    //si le agregas las llave primaria a user_rut te quita el guion con el numero verificador nose porque? pero tampoco sirve aca


    public function residente(){
        return $this->belongsTo(Residente::class);
    }
}
