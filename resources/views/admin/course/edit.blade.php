@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edition of Course!                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "/course/$course->id", 'method' => 'put']) !!}
                    <div class="form-group row">
                        {{ Form::label('course_name', 'Course name:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        <div class="col-sm-10">
                            {{ Form::text('course_name', $course->course_name, ['class' => 'form-control form-control-sm'] ) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label('menu', 'Menu:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        <div class="col-sm-10">
                            {{ Form::text('menu', $course->menu, ['class' => 'form-control form-control-sm'] ) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label('maximum', 'Maximum:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        <div class="col-sm-10">
                            {{ Form::text('maximum', $course->maximum, ['class' => 'form-control form-control-sm'] ) }}
                        </div>
                    </div>
                     
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
