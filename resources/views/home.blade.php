@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">DASHBOARD</div>
                    <a href="/admin" class="float-right btn btn-success">Inicial Page</a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
