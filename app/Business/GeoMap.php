<?php


namespace App\Business;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class GeoMap
{
    /**
     * GeoMap constructor.
     */
    public function __construct( )
    {

    }

    /**
     * Función que retorna las coordenadas y localización según estado, municipio y ordenamiento
     * @param $direccion, string con los datos de ordenamiento, municipio y estado
     * @return $datosmapa, array con latitud = $datosmapa[0], longitud = $datosmapa[1] y localizacion = $datosmapa[2];
     */
    public function geolocalizar($direccion)
    {
        // urlencode codifica datos de texto modificando simbolos como acentos
        $direccion = urlencode($direccion);
        // envio la consulta a Google map api
        $API_KEY = Config::get("apikey");
        $url = "http://maps.google.com/maps/api/geocode/json?address=".$direccion."&key=".$API_KEY["api_key"];
        // recibo la respuesta en formato Json
        $datosjson = file_get_contents($url);
        // decodificamos los datos Json
        $datosmapa = json_decode($datosjson, true);
        // si recibimos estado o status igual a OK, es porque se encontro la direccion
        //print_r($datosmapa);
        if ($datosmapa['status'] = 'OK') {
            // asignamos los datos

            $latitud = $datosmapa['results'][0]['geometry']['location']['lat'];

            $longitud = $datosmapa['results'][0]['geometry']['location']['lng'];
            $localizacion = $datosmapa['results'][0]['formatted_address'];

            // Guardamos los datos en una matriz
            $datosmapa = array();
            array_push(
                $datosmapa,
                $latitud,
                $longitud,
                $localizacion
            );
            return $datosmapa;
        }
    }

    /** Función para
     * @param  \Illuminate\Http\Request  $request
      * @return $datosmapa
     */
    public function GestLeocalizacion(Request $request){
        // Se crea la localización para obtener la latitud, longitud en base a la direccion calle y número, ciudad, municipio, estado y país (Ciudad igual nombre que país)
        $localization = $request->ordenamiento.", ".$request->municipio.",".$request->municipio.", ".$request->estado.", México";
        /* Le falta el key_api para que funcione por lo que se pondrá una dirección fija y se deja en comentario para que no
         * de error obtención de la geolocalización*/
        //$datosmapa = $this->geolocalizar($localization);
        $datosmapa[0] = 21.896410;
        $datosmapa[1] = -102.317018;
        $datosmapa[2] = "Fraccionamiento Las Brisas, Aguascalientes, Aguascalientes, Aguascalientes, Mexico";
        return $datosmapa;
    }
}
