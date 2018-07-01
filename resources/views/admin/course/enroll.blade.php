@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>All Enrollments</h3>
                    <a href="/student/" class="float-right btn btn-success">All Students</a><br><br>     
                    <a href="/course" class="float-right btn btn-success">All Courses</a>

                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                   

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            @foreach($student as $u)
                                <td>{{ $u->id}}</td>
                                
                            @endforeach
                        </tr>

                        <tr>
                            <th>User ID</th>
                            @foreach($student as $u)
                                <td>{{ $u->user_id }}</td>
                            @endforeach
                        </tr>

                        <tr>
                            <th>Course ID</th>
                            @foreach($student as $u)
                                <td>{{ $u->course_id }}</td>
                            @endforeach
                        </tr>

                        <tr>                            
                            <th>Authorized</th>
                            @foreach($student as $u)
                                <td>{{ $u->authorized }}</td>
                            @endforeach
                        </tr>

                        <tr>                            
                            <th>Created at</th>
                            @foreach($student as $u)
                                <td>{{ $u->created_at }}</td>
                            @endforeach
                        </tr>

                        <tr>                            
                            <th>Updated at</th>
                            @foreach($student as $u)
                                <td>{{ $u->updated_at }}</td>
                            @endforeach
                        </tr>
                        <tr>                            
                            <th>Option</th>
                            @foreach($student as $u)
                                <td><a href="/validar/{{ $u->id }}/matricula" class="btn btn-success">Validar</a></td>
                            @endforeach
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
