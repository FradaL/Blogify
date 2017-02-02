<?php
$editable = (isset($user)) ? "disabled" : null;
?>
@extends('blogify::admin.layouts.dashboard')
@section('page_heading', isset($user) ? trans("blogify::gallery.form.page_title_edit")  : trans("blogify::gallery.form.page_title_create") )
@section('section')

    @if ( isset($gallery) )
        {!! Form::open( [ 'route' => ['admin.gallery.update', $gallery->id] ] ) !!}
        {!! Form::hidden('_method', 'put') !!}
    @else
        {!! Form::open( [ 'route' => 'admin.gallery.store']) !!}
    @endif
    <div class="row form-group {{ $errors->has('imagen') ? 'has-error' : '' }}">
        <div class="col-sm-2 col-md-1">
            {!! Form::label('name', trans("blogify::gallery.form.name.label") ) !!}
        </div>
        <div class="col-sm-10 col-md-4">
            @if ( isset($gallery) )
                {!! Form::text('name', $gallery->name, ['class' => 'form-control', 'placeholder' => trans("blogify::gallery.form.placeholder.value")]) !!}
            @else
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans("blogify::gallery.form.placeholder.value")]) !!}
            @endif
        </div>
    </div>

    <div class="row form-group {{ $errors->has('imagen') ? 'has-error' : '' }}">
        <div class="col-sm-2 col-md-1">
            {!! Form::label('description', trans("blogify::gallery.form.name.labeld") ) !!}
        </div>
        <div class="col-sm-10 col-md-4">
            @if ( isset($gallery) )
                {!! Form::text('description', $gallery->Description, ['class' => 'form-control', 'placeholder' => trans("blogify::gallery.form.placeholder.valued")]) !!}
            @else
                {!! Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => '200', 'placeholder' => trans("blogify::gallery.form.placeholder.valued")]) !!}
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            {!! Form::submit(trans("blogify::gallery.form.submit_button.value"), ['class'=>'btn btn-success']) !!}
        </div>
    </div>

    {!! Form::close() !!}

@stop