@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Editar Vehículo:
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
                    <form method="POST" action="{{url('vehiculos/'.$vehiculo->id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           value="{{$vehiculo->nombre}}"
                                           name="nombre">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Código</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{$vehiculo->codigo}}"
                                           name="codigo">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <select class="form-control" name="marca_id">
                                        @foreach($marcas as $marca)
                                            @if($vehiculo->marca_id == $marca->id)
                                                <option selected value="{{$marca->id}}">{{$marca->nombre}}</option>
                                            @else
                                                <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Serie</label>
                                    <select class="form-control" name="serie_id">
                                        <option value="">Seleccione una serie (opcional)</option>
                                        @foreach($series as $serie)
                                            @if($vehiculo->serie_id == $serie->id)
                                                <option selected value="{{$serie->id}}">{{$serie->nombre}}</option>
                                            @else
                                                <option value="{{$serie->id}}">{{$serie->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <a href="{{url('vehiculos')}}" class="btn btn-warning">Atrás</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
