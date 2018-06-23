@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cidades
                    <a href="/city/create" class="float-right btn btn-success">Nova Cidade</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Habitantes</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                        @foreach($city as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->nome_ci }}</td>
                                <td>{{ $p->habitante }}</td>
                                <td>{{ $p->sigla }}</td>
                                <td>
                                    <a href="/city/{{ $p->id }}/edit" class="btn btn-warning">Editar</a>

                                    {!! Form::open(['url' => "/city/$p->id", 'method' => 'delete']) !!}
                                        {!! Form::submit('Deletar', null, ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
