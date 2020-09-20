<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App;
use App\Business\DataApi;
use App\Business\GeoMap;

class AsentamientoController extends Controller
{
    protected $data_api;
    protected $data_map;

    /**
     * AsentamientoController constructor.
     */
    public function __construct(DataApi $data_api, GeoMap $data_map)
    {
        $this->data_api = $data_api;
        $this->data_map = $data_map;
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
        $states = DB::table('sepomexes')->select('d_estado', 'c_estado')->distinct()->get();
        $mnpios = DB::table('sepomexes')->select('D_mnpio', 'c_mnpio')->distinct()->get();
        return view('asentamiento.create',compact('states','mnpios'));
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
