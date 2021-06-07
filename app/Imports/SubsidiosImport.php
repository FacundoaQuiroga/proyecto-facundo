<?php

namespace App\Imports;

use App\Models\Subsidio;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class SubsidiosImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    //OJO SI QUIERES QUE NO TE DUPLIQUE LOS DATOS EN LA TABLA ENTONCES COLOCALE UNIQUE A LA COLUMNA USER_RUT SINO QUITALE EL UNIQUE.
    //AGREGUE UN BOTON ACTUALIZAR A LA VISTA DE SOLICITUDES SUBSIDIO PARA QUE PUEDA HACER UPDATE SIN DUPLICAR LOS QUE YA HAY
    public function model(array $row)
    {
        return new Subsidio([
            'nombres' => $row['nombres'],
            'apellidos' => $row['apellidos'],
            'user_rut' => $row['rut'],
            'email' => $row['email'],
            'tipo_subsidio' => $row['tipo_de_subsidio'],
            'tramo' => $row['tramo'],
            'fecha_viaje' => $row['fecha_de_viaje'],
            'estado' => $row['estado'],
        ]);
    }

}
