<?php

namespace App\Business;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlMultiHandler;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\ResponseInterface;

class DataApi
{
    private $request;

    /**
     * DataApi constructor.
     */
    public function __construct()
    {

    }

    /**
         Función que consume el api de precios de gasolina
     *   Devuelve en formato json el resultado de la respuesta de la api consumida
     */
    public function apigasolina()
    {
            try {
                $client = new Client();
                $response = $client->request('GET', 'https://api.datos.gob.mx/v1/precio.gasolina.publico');
                $statusCode = $response->getStatusCode();
                if ($statusCode == 200) {
                    $response = (object) json_decode($response->getBody()->getContents());
                    return response()->json(['status'=>true,'results'=>$response->results], 200);
                } else {
                    return null;
                }
            } catch (ErrorException $e) {
                return 'Error status: ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase();
            }
    }

    /**
    Función que consume el api de precios de gasolina en modo asíncrono
     *   Devuelve en formato json el resultado de la respuesta de la api consumida
     */
    public function apigasolina2()
    {
        try {
            $client = new Client();
            $promise = $client->getAsync('https://api.datos.gob.mx/v1/precio.gasolina.publico');
            $response = $promise->then(
                function (ResponseInterface $res) {
                    $response = (object) json_decode($res->getBody()->getContents());
                    return $response;
                },
                function (RequestException $e) {
                    $response = [];
                    $response->data = $e->getMessage();
                    return $response;
                }
            )->wait();
        } catch (ErrorException $e) {}
        return response()->json(['status'=>true,'results'=>$response->results], 200);
    }
}
