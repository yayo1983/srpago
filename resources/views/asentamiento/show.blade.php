@extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div id="latitude" data-user=@json($latitude)></div>
                <div id="longitud" data-user=@json($longitud)></div>
                <div id="localization" data-user=@json($localization)></div>
                <div id="mapa" class="row justify-content-center"></div>
            </div>
        <br>
         <div class="col-md-12 col-lg-12 col-sm-12">
             <div class="card">
                 <div class="card-header"><i class="fas fa-table"></i> Lista de resultados</div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                             <thead>
                             <tr>
                                 <th style="width: 15%;">RFC </th>
                                 <th style="width: 15%;">Calle</th>
                                 <th style="width: 10%;">Número permiso</th>
                                 <th style="width: 10%;">Código postal</th>
                                 <th style="width: 10%;">Razón social</th>
                                 <th style="width: 10%;">Premium</th>
                                 <th style="width: 10%;">Regular</th>
                             </tr>
                             </thead>
                             <tbody>
                             @foreach($data_api as $data)
                                 <tr>
                                     <td>{{$data->rfc}}</td>
                                     <td>{{$data->calle}}</td>
                                     <td>{{$data->numeropermiso }}</td>
                                     <td>{{$data->codigopostal}}</td>
                                     <td>{{$data->razonsocial}}</td>
                                     <td>{{$data->premium}}</td>
                                     <td>{{$data->regular }}</td>
                                 </tr>
                             @endforeach
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="card-footer small text-muted"></div>
             </div>
         </div>
        </div>
    </div>
    @endsection
