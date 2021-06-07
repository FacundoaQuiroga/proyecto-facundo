<?php

namespace App\Exports;

use App\Models\Subsidio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class SubsidiosExport implements FromCollection,WithHeadings,WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return [
            'nombres',
            'apellidos',
            'rut',
            'email',
            'tipo_de_subsidio',
            'tramo',
            'fecha_de_viaje',
            'estado',
        ];
    }
    public function collection()
    {
        return Subsidio::select(
            "nombres",
            "apellidos",
            "user_rut",
            "email",
            "tipo_subsidio",
            "tramo",
            "fecha_viaje",
            "estado")->get();
    }

    private $year;
    public function forYear($year){
        $this->year = $year;

        return $this;
    }


    public function sheets(): array
    {
        $sheets = [];
        foreach(range(1, 12) as $month){
            $sheets = [] = new SubsidiosPerMonth($this->year, $month);
        }
    }
}
