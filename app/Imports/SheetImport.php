<?php


namespace App\Imports;

use App\Models\Sepomex;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;

class SheetImport implements ToCollection, SkipsUnknownSheets
{
    public function collection(Collection $rows)
    {
        /**
         * Función para importar por collection
         * @param array $row
         * @return \Illuminate\Database\Eloquent\Model|null
         */
        foreach ($rows as $row)
        {
            Sepomex::create([
                'd_codigo'      => $row[0],
                'd_asenta'      => $row[1],
                'd_tipo_asenta' => $row[2],
                'D_mnpio'       => $row[3],
                'd_estado'      => $row[4],
                'd_ciudad'      => $row[5],
                'd_CP'          => $row[6],
                'c_estado'      => $row[7],
                'c_oficina'     => $row[8],
                'c_CP'          => $row[9],
                'c_tipo_asenta' => $row[10],
                'c_mnpio'       => $row[11],
                'id_asenta_cpcons' => $row[12],
                'd_zona'           => $row[13],
                'c_cve_ciudad'     => $row[14],
            ]);
        }
    }

    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Hoja {$sheetName} fue omitida");
    }
}

