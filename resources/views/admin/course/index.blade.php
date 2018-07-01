@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>All Courses</h3>
                    <a href="/student" class="float-right btn btn-success">All Students</a><br><br>
                    <a href="/student/" class="float-right btn btn-success">All Enrolment</a><br><br>     
                    <a href="/course/create" class="float-right btn btn-info">New Course</a>

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
                            @foreach($course as $u)
                                <td>{{ $u->id }}</td>
                                
                            @endforeach
                        </tr>

                        <tr>
                            <th>Couse Name</th>
                            @foreach($course as $u)
                                <td>{{ $u->course_name }}</td>
                            @endforeach
                        </tr>

                        <tr>
                            <th>Course menu</th>
                            @foreach($course as $u)
                                <td>{{ $u->menu }}</td>
                            @endforeach
                        </tr>

                        <tr>                            
                            <th>Maximum students</th>
                            @foreach($course as $u)
                                <td>{{ $u->maximum }}</td>
                            @endforeach
                        </tr>
                        
                        <tr>   
                            <th>Options</th>
                            @foreach($course as $u)
                                    <td><a href="/course/{{ $u->id }}/edit" class="btn btn-warning">Edit</a><a href="/exclusaoC/{{ $u->id }}/del" class="btn btn-danger">Delete</a></td>
                            @endforeach
                        </tr> 

                    </table>

                    {!! $course->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
