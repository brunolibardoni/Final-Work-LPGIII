@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>All my Subscriptions</h3>
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
                            @foreach($student->courses as $u)
                                <td>{{ $u->pivot->id }}</td>
                                
                            @endforeach
                        </tr>

                        <tr>
                            <th>User ID</th>
                            @foreach($student->courses as $u)
                                <td>{{ $u->pivot->user_id }}</td>
                            @endforeach
                        </tr>

                        <tr>
                            <th>Course ID</th>
                            @foreach($student->courses as $u)
                                <td>{{ $u->pivot->course_id }}</td>
                            @endforeach
                        </tr>

                        <tr>                            
                            <th>Authorized</th>
                            @foreach($student->courses as $u)
                                <td>{{ $u->pivot->authorized }}</td>
                            @endforeach
                        </tr>

                        <tr>                            
                            <th>Created at</th>
                            @foreach($student->courses as $u)
                                <td>{{ $u->pivot->created_at }}</td>
                            @endforeach
                        </tr>

                        <tr>                            
                            <th>Updated at</th>
                            @foreach($student->courses as $u)
                                <td>{{ $u->pivot->updated_at }}</td>
                            @endforeach
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
