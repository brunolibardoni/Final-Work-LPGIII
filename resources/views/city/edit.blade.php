@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edição de Estado                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "/city/$city->id", 'method' => 'put']) !!}
                    <div class="form-group row">
                        {{ Form::label('nome', 'Nome:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        <div class="col-sm-10">
                            {{ Form::text('nome', $city->nome_cidade, ['class' => 'form-control form-control-sm'] ) }}
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
                                    {{-- {{dd($decoy)}} --}}
                                    <select name="id_estado">';
                                            @foreach($states as $p)
                                                @if($p->id==$city->state_id)
                                                    <option value="{{$p->id}}">{{$p->nome_estado}}</option>
                                                @endif
                                            @endforeach
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
