<?php

namespace App\Exports;

use App\Models\Residente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResidentesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return [
            'nombres',
            'apellidos',
            'rut',
            'comuna',
            'fecha_certificado',
            'fecha_actualizacion',
            'sector',
        ];
    }
    public function collection()
    {
        return Residente::select(
            "nombres",
            "apellidos",
            "user_rut",
            "comuna",
            "fecha_certificado",
            "fecha_actualizacion",
            "sector")->get();
    }
}
