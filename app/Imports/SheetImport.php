<?php


namespace App\Imports;

use App\Business\DataDB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

/**
 * Class SheetImport
 * @package App\Imports
 */
class SheetImport implements ToCollection
{

    /**
     * Función para importar por collection
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        $datadb = new DataDB();
        $datadb->SaveDataOfXLS($rows);
    }
}

