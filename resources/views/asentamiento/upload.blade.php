@extends('layouts.app')
@section('title', 'Importar desde Microsoft Excel')
@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div>
                @if (isset($status) && $status != "")
                    <div class="alert alert-info">
                        <span>{{ $status }}</span>
                    </div>
                @endif
                @if ($errors->has('file'))
                    <span class="alert alert-danger"><strong>{{ $errors->first('file') }}</strong></span>
                @endif
            </div>
            <div class="card">
                <div class="card-header">{{ trans('interfaz.form.excel') }}</div>
                <div class="card-body">
                    <form accept-charset="UTF-8" enctype="multipart/form-data" name="excel" id="excel" method="post"
                          action="{{ route('importarfile') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <input type="file" class="btn btn-primary" name="file" multiple=false
                                       accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                       value="{{ old('file') }}" required autofocus>
                            </div>
                        </div>

                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">{{ trans('interfaz.enviar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
