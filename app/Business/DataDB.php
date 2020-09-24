<?php


namespace App\Business;

use App\Models\AdminPostal;
use App\Models\Asentamiento;
use App\Models\DCiudad;
use App\Models\DEstado;
use App\Models\DMnpio;
use App\Models\DTipoAsenta;
use App\Models\DZona;
use Illuminate\Support\Facades\DB;

/**
 * Class DataDB
 * @package App\Business
 */
class DataDB
{
    /**
     * DataDB constructor.
     */
    public function __construct()
    {
    }

    /**
     * Función para consultar la base de datos y recuperar un objeto según los parámetros
     * @param $table , nombre de la tabla
     * @param $column , nombre de la columna
     * @param $value ,  valor de la columna a buscar
     * @return \Illuminate\Support\Collection
     */
    public function findByCTCT($table, $column, $value)
    {
        $q = DB::table($table)
            ->where($column, '=', $value)
            ->get();
        return $q;
    }

    /**
     * Función para guardar los datos que llegan desde el XLS en la base de datos
     * @param $rows , arreglo que contiene los datos capturados del xls para una hoja
     */
    public function SaveDataOfXLS($rows)
    {
        try {
            $state = new DEstado();
            DB::beginTransaction();
            $qe = $this->findByCTCT('d_estados', 'd_estado', $rows[1][4]);
            if (count($qe) == 0) {
                $state->c_estado = $rows[1][7];
                $state->d_estado = $rows[1][4];
                $state->save();
            } else {
                if (isset($qe[0])) {
                    $state = $qe[0];
                }
            }
            foreach ($rows as $row) {
                if ($row[3] != "D_mnpio") {
                    $mnio = new DMnpio();
                    $qm = $this->findByCTCT('d_mnpios', 'd_mnpio', $row[3]);
                    if (count($qm) == 0) {
                        $mnio->d_mnpio = $row[3];
                        $mnio->c_mnpio = $row[11];
                        $mnio->d_estados_id = $state->id;
                        $mnio->save();
                    } else {
                        if (isset($qm[0])) {
                            $mnio = $qm[0];
                        }
                    }
                    $ciudad = new DCiudad();
                    $qc = $this->findByCTCT('d_ciudads', 'd_ciudad', $row[5]);
                    if (count($qc) == 0 && $row[5] != "d_ciudad") {
                        $ciudad->d_ciudad = $row[5];
                        $ciudad->c_cve_ciudad = $row[14];
                        $ciudad->d_mnpios_id = $mnio->id;
                        $ciudad->save();
                    } else {
                        if (isset($qc[0])) {
                            $ciudad = $qc[0];
                        }
                    }
                    $tipo_asenta = new DTipoAsenta();
                    $qta = $this->findByCTCT('d_tipo_asentas', 'c_tipo_asenta', $row[10]);
                    if (count($qta) == 0) {
                        $tipo_asenta->d_tipo_asenta = $row[2];
                        $tipo_asenta->c_tipo_asenta = $row[10];
                        $tipo_asenta->save();
                    } else {
                        if (isset($qta[0])) {
                            $tipo_asenta = $qta[0];
                        }
                    }
                    $admin_postal = new AdminPostal();
                    $qap = $this->findByCTCT('d_admin_postals', 'c_oficina', $row[8]);
                    if (count($qap) == 0) {
                        $admin_postal->d_cp = (Integer)$row[6];
                        $admin_postal->c_oficina = (Integer)$row[8];
                        $admin_postal->c_cp = $row[9];
                        $admin_postal->save();
                    } else {
                        if (isset($qap[0])) {
                            $admin_postal = $qap[0];
                        }
                    }
                    $zona = new DZona();
                    if ($row[1] != "d_asenta") {
                        $qz = $this->findByCTCT('d_zonas', 'zona', $row[13]);
                        if (isset($qz[0])) {
                            $zona = $qz[0];
                            $qa = $this->findByCTCT('d_asentamientos', 'd_asenta', $row[1]);
                            if (count($qa) == 0) {
                                $asentamiento = new Asentamiento();
                                $asentamiento->d_codigo = (Integer)$row[0];
                                $asentamiento->d_asenta = $row[1];
                                $asentamiento->id_ciudad = $ciudad->id;
                                $asentamiento->id_tipo_asentamiento = $tipo_asenta->id;
                                $asentamiento->id_zona = $zona->id;
                                $asentamiento->id_admin_postal = $admin_postal->id;
                                $asentamiento->id_asenta_cpcons = $row[12];
                                $asentamiento->save();
                            }
                        }
                    }
                }
            }  // endFor
            DB::commit();

        } catch (ErrorException $e) {
            DB::rollBack();
        }
    }


    /**
     * Función para recuperar todas los datos de una tabla determinada
     * @param $table , nombre de la tabla a seleccionar los datos
     * @param $selectcolumns , string con los nombres de las columnas a seleccionar
     * @return \Illuminate\Support\Collection
     */
    public function allData($table)
    {
        return DB::table($table)->distinct()->get();
    }

}
