<?php

namespace App\Http\Controllers;

use App\Business\DataDB;
use Illuminate\Http\Request;
use App;
use App\Business\DataApi;
use App\Business\GeoMap;

class AsentamientoController extends Controller
{
    protected $data_api;
    protected $data_map;
    protected $datadb;

    /**
     * AsentamientoController constructor.
     */
    public function __construct(DataApi $data_api, GeoMap $data_map, DataDB $datadb)
    {
        $this->data_api = $data_api;
        $this->data_map = $data_map;
        $this->datadb   = $datadb;
    }

     /**
     *  Función para mostrar la página inicial de la aplicación
     *  @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asentamiento/index');
    }

    /**
     *  Función para cargar la vista formulario
     *  @return \Illuminate\Http\Response
     */
	public function create(){
        $states = $this->datadb->allData('d_estados');
        $mnpios = $this->datadb->allData('d_mnpios');
        return view('asentamiento.create',compact('states','mnpios'));
    }

    /**
     *  Función para cargar la vista formulario
     *  @return \Illuminate\Http\Response
     */
    public function estado(){
        $states = $this->datadb->allData('sepomexes','d_estado, c_estado');
        return response()->json($states);
    }

    /**
     *  Función para llamar el objeto que se ocupa de consumir el api de precios de gasolina
     *   @return \Illuminate\Http\Response
     */
    public function apigasolina(){
        $response = $this->data_api->apigasolina2();
        return $response;
    }

    /**
     *   Función para llamar el objeto que se ocupa de consumir el api de precios de gasolina
     *   @param  \Illuminate\Http\Request  $request
     *   @return \Illuminate\Http\Response
     */
    public function show(Request $request){
       $this->validate($request, [
            'ordenamiento' => 'required|string|max:255',
            'estado'       => 'required|not_in:-1',
            'municipio'    => 'required|not_in:-1',
        ]);
        $datosmapa = $this->data_map->GestLeocalizacion($request);
        $latitude  = $datosmapa[0];
        $longitud  = $datosmapa[1];
        $localization = $datosmapa[2];
        $json = $this->data_api->apigasolina2();
        $data_api = (object) json_decode($json->getContent())->results;
        return view('asentamiento/show',compact('data_api', 'latitude','longitud','localization'));
    }
}
