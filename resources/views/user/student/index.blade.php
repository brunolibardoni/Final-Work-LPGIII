@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>All Courses</h3>
                    <a href="/subscription/" class="float-right btn btn-success">My Subscriptions</a><br><br>

                </div>
                
                <div class="card-body">
                    @if (session('erro'))
                        <div class="alert alert-danger">
                            {{ session('erro') }}
                        </div>
                    @endif
                   
                    <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
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
                                    <td><a href="/enroll/{{ $u->id }}/" class="btn btn-success">Enroll</a></td>
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
