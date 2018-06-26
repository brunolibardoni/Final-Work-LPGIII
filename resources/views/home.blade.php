@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>


                <a class="dropdown-item" href="/manager"
                                    onclick="event.preventDefault();
                                                document.getElementById('edit-form').submit();">
                                    {{ __('Students') }}
                                    </a>

                                    <a href="/manager/index_courses" class="float-right btn btn-success">Todos os Cursos</a>


                                    <a class="dropdown-item" href="/manager/index_courses"
                                    onclick="event.preventDefault();
                                                document.getElementById('get-form').submit();">
                                    {{ __('Courses') }}
                                    </a>

                                       <form id="edit-form" action="/manager"  style="display: none;">
                                        @csrf
                                    </form>

                                    <form id="get-form" action="/manager/index_courses"  style="display: none;">
                                        @csrf
                                    </form>



                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged with adm!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
