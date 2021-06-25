<?php

namespace App\Exports\Sheets;

use App\Models\Subsidio;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class SubsidiosPerMonthSheet implements FromQuery,WithTitle,WithHeadings
{

    private $year;
    private $month;
    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function query()
    {
        return Subsidio::query()
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month);
    }

    public function title(): string
    {
        return Carbon::parse("$this->year-{$this->month}-01")->translatedFormat('F-Y');
    }

    public function headings():array{
        return [
            'id',
            'nombres',
            'apellidos',
            'rut',
            'email',
            'tipo_de_subsidio',
            'tramo',
            'fecha_de_viaje',
            'estado',
            'creado',
            'actualizado',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }


}
