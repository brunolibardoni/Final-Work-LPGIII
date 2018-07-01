@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    REGISTER COURSE                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/course', 'method' => 'post']) !!}
                        <div class="form-group row">
                            {{ Form::label(' ', 'Course Name: ', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::text('course_name', null, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label(' ', 'Menu: ', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::text('menu', null, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label(' ', 'Maximum Students: ', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::number('maximum', null, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>

                        

                         <div class="form-group row">
                            <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection