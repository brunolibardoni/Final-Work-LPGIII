@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>All Courses</h3>
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
                            @foreach($enrollment as $u)
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
                                    <td><a href="/state/{{ $u->id }}/delete" class="btn btn-success">Enroll</a></td>
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
