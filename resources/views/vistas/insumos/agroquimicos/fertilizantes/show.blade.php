@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver Fertilizante: {{$insumo->nombre}}
                    </h3>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h5><b>Nombre</b></h5>
                                    <input readonly
                                           type="text"
                                           class="form-control"
                                           value=" {{$insumo->nombre}}"
                                           name="nombre">


                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h5><b>Envase</b></h5>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$insumo->envase}}"
                                       name="nombre">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h5><b>Tipo</b></h5>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$insumo->subtipo->nombre}}"
                                       name="nombre">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h5><b>Existencias</b></h5>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$insumo->existencias}} {{$insumo->unidad->nombre}}"
                                       name="nombre">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h5><b>Info</b></h5>
                                <textarea readonly class="form-control" rows="3">{{$insumo->info}}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered color-table info-table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">INGREDIENTE ACTIVO</th>
                                        <th class="text-center">CONCENTRACION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detalles as $detalle)
                                        <tr class="text-center">
                                            <td>{{$detalle->ingrediente_activo}}</td>
                                            <td>{{$detalle->concentracion}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                    <a href="{{url('insumos/fertilizantes')}}" class="btn btn-warning">Atrás</a>


                </div>
            </div>
        </div>
    </div>
@endsection
