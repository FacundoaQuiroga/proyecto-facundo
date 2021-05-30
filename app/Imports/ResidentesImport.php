<?php

namespace App\Imports;

use App\Models\Residente;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;


class ResidentesImport implements ToModel,WithHeadingRow,WithUpserts
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function model(array $row)
    {

        return new Residente([
            'nombres' => $row['nombres'],
            'apellidos' => $row['apellidos'],
            'user_rut' => $row['rut'],
            'comuna' => $row['comuna'],
            'fecha_certificado' => $row['fechacert'],
            'fecha_actualizacion' => $row['fechaactualizacion'],
            'sector' => $row['sector'],
        ]);
    }
    public function uniqueBy()
    {
        return 'nombres';
    }

}
