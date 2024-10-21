@extends('layouts.index')

@section('contenido')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="pb-2">
                    Nueva Serie
                </h3>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{url('series')}}" autocomplete="off">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input required type="text" class="form-control" value="{{old('nombre')}}" name="nombre">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>marca</label>
                                <select class="form-control" name="marca_id">
                                    @foreach($marcas as $marca)
                                        <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>


                    <a href="{{url('series')}}" class="btn btn-warning">Atrás</a>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
