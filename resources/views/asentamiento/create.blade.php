@extends('layouts.app')
@section('page_heading','Consultar precio de la gasolina')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error!</strong> Revise los campos obligatorios.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-info">
            {{Session::get('success')}}
        </div>
    @endif

    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Formulario</div>
        <div class="card-body">
            <form method="POST" action="mostrar">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <div>
                            <label for="estado">Estado</label>
                            <select  id="estado" class="form-control" name="estado">
                                <option value="-1" selected>Seleccione estado</option>
                                @foreach($states as $state)
                                    <option value="{{$state->c_estado}}">{{$state->d_estado }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('estado')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div>
                            <label for="municipio">Municipio</label>
                            <select  id="municipio" class="form-control" name="municipio">
                                <option value="-1" selected>Seleccione municipio</option>
                                @foreach($mnpios as $mnpio)
                                    <option value="{{$mnpio->c_mnpio}}">{{$mnpio->D_mnpio }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('municipio')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input id="ordenamiento" type="text" class="form-control @error('ordenamiento') is-invalid @enderror" name="ordenamiento" required
                               value="{{ old('ordenamiento') }}" autofocus>
                        @error('ordenamiento')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <label for="inputPassword">Ordenamiento</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-area-chart"></i> Mostrar
                </button>
                <br></br>
                <a class="btn btn-primary btn-block" href="{{ route('index') }}" class="btn btn-primary">
                    <i class="fa fa-remove"></i> Cancelar
                </a>
            </form>
        </div>
    </div>
@stop
