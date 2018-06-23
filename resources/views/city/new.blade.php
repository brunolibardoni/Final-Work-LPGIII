@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    CADASTRO DE CIDADE                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/city', 'method' => 'post']) !!}
                        <div class="form-group row">
                            {{ Form::label('nome', 'Nome:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::text('nome', null, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('habitante', 'Habitantes:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::Number('habitante', null, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>
                        <div class="form-group row">
                                {{ Form::label('estado', 'Selecione um estado:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                                <div class="col-sm-10">
                                        <select name="id_estado">';
                                                <option>Selecione...</option>
                                                @foreach($states as $p)
                                                <option value="{{$p->id}}"> {{$p->sigla}} </option>
                                                @endforeach
                                        </select>
                                </div>
                            </div>
                        

                         <div class="form-group row">
                            <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection