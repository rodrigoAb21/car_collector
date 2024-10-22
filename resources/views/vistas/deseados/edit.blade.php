@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Editar marca
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
                    <form method="POST" action="{{url('deseados/'.$deseado->id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           value="{{$deseado->nombre}}"
                                           name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Código</label>
                                    <input
                                           type="text"
                                           class="form-control"
                                           value="{{$deseado->codigo}}"
                                           name="codigo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <input
                                           type="text"
                                           class="form-control"
                                           value="{{$deseado->marca}}"
                                           name="marca">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Serie</label>
                                    <input
                                           type="text"
                                           class="form-control"
                                           value="{{$deseado->serie}}"
                                           name="serie">
                                </div>
                            </div>
                        </div>
                        <a href="{{url('deseados')}}" class="btn btn-warning">Atrás</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
