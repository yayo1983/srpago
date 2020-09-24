<?php

namespace App\Imports;

use App\Models\Sepomex;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class SepomexImport implements WithMultipleSheets
{
    //use Importable;
    /**
     * SepomexImport constructor.
     */
    public function __construct()
    {
    }


    /**
        Función para importar varias hojas
     *  @return array SheetImport
     */
    public function sheets(): array
    {
        return [
            1 => new SheetImport(),
            2 => new SheetImport(),
            3 => new SheetImport(),
            4 => new SheetImport(),
            5 => new SheetImport(),
            6 => new SheetImport(),
            7 => new SheetImport(),
            8 => new SheetImport(),
            9 => new SheetImport(),
            10 => new SheetImport(),
            11 => new SheetImport(),
            12 => new SheetImport(),
            13 => new SheetImport(),
            14 => new SheetImport(),
            15 => new SheetImport(),
            16 => new SheetImport(),
            17 => new SheetImport(),
            18 => new SheetImport(),
            19 => new SheetImport(),
            20 => new SheetImport(),
            21 => new SheetImport(),
            22 => new SheetImport(),
            23 => new SheetImport(),
            24 => new SheetImport(),
            25 => new SheetImport(),
            26 => new SheetImport(),
            27 => new SheetImport(),
            28 => new SheetImport(),
            29 => new SheetImport(),
            30 => new SheetImport(),
            31 => new SheetImport(),
            32 => new SheetImport(),
        ];
    }
}
