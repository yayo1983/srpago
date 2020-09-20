<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\NExcel;

class SepomexController extends Controller
{

    protected $nexcel;
    /**
     * SepomexController constructor.
     */
    public function __construct(NExcel $nexcel)
    {
       $this->nexcel = $nexcel;
    }

    /**
     *  Función para mostrar el formulario cargar archivo xls
     *  @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asentamiento/upload');
    }

    /**
    * Función que manda a importar un archivo xls desde un formulario
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function fileImport(Request $request)
    {
        $this->validate($request, [
            'file' => 'bail|required',
        ]);
        $status = $this->nexcel->importfile($request);
        return view('asentamiento/upload', ['status' => $status]);
    }
}
