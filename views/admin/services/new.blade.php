<?php
$editable = (isset($user)) ? "disabled" : null;
?>
@extends('blogify::admin.layouts.dashboard')
@section('page_heading', isset($user) ? trans("blogify::users.form.page_title_edit")  : trans("blogify::services.services.title") )
@section('section')

    @include('blogify::admin.snippets.validation-errors')

    @if ( isset($service) )
        {!! Form::model($service, [ 'route' => ['admin.services.update', $service->id], 'files' => true] ) !!}
        {!! Form::hidden('_method', 'put') !!}
    @else
        {!! Form::open( [ 'route' => 'admin.services.store', 'files' => true] ) !!}
    @endif
    <div class="row form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <div class="col-sm-2 col-md-1">
            {!! Form::label('name', trans("blogify::services.form.lbl.value1") ) !!}
        </div>
        <div class="col-sm-10 col-md-4">
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="row form-group {{ $errors->has('description') ? 'has-error' : '' }}">
        <div class="col-sm-2 col-md-1">
            {!! Form::label('name', trans("blogify::services.form.lbl.value2") ) !!}
        </div>
        <div class="col-sm-10 col-md-4">
            {!! Form::textarea('description', null, ['class'=>'form-control', 'maxlength' => '100']) !!}
        </div>
    </div>

    <div class="row form-group {{ $errors->has('image') ? 'has-error' : '' }}">
        <div class="col-sm-2 col-md-2">
            {!! Form::label('name', trans("blogify::services.form.lbl.value3") ) !!}
        </div>
        <div class="col-sm-10 col-md-4">
            {!! Form::file('image') !!}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            {!! Form::submit(trans("blogify::services.form.button"), ['class'=>'btn btn-success']) !!}
        </div>
    </div>

    {!! Form::close() !!}

@stop