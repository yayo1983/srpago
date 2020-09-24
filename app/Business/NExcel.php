<?php


namespace App\Business;

use App\Imports\SepomexImport;
use Maatwebsite\Excel\Exceptions\SheetNotFoundException;
use Maatwebsite\Excel\Exceptions\UnreadableFileException;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

/**
 * Class NExcel
 * @package App\Business
 */
class NExcel
{
    /**
       Función para importar los datos desde un archivo en excel
     *  @param  \Illuminate\Http\Request  $request
     * @return $status, string
    */
    public function importfile(Request $request){
        if($request->hasFile('file')){
            try {
                $sepomeximport = new SepomexImport();
                Excel::import($sepomeximport, $request->file('file'));
                $status = "Archivo importado satisfactoriamente.";
            }catch (SheetNotFoundException $e) {
                $status = "Error al importar archivo. Hoja no encontrada.";
            }catch (UnreadableFileException $e) {
                $status = "Error al importar archivo. Archivo ilegible.";
            }catch (ErrorException $e) {
                $status = "Error al importar archivo.";
            }
        }
        return $status;
    }

        /**
         * Función  que importa un archivo xls desde una ruta fija
         * @return \Illuminate\Support\Collection
         */
        public function import(){
            return (new SepomexImport)->import('Campeche.xls');
        }
}
