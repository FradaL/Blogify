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
        {!! Form::open( [ 'route' => 'admin.images.store', 'files' => true]) !!}
    @endif

    <div class="row">
        <div class="col-sm-2 col-md-2">
            {!! Form::label('name', trans("blogify::gallery.images.gallery") ) !!}
        </div>

        <div class="col-sm-2 col-md-4">
            {!! Form::select('category_id', $gallerys, null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="row form-group {{ $errors->has('imagen') ? 'has-error' : '' }}">
        <div class="col-sm-2 col-md-2">
            {!! Form::label('name', trans("blogify::gallery.images.label") ) !!}
        </div>
        <div class="col-sm-10 col-md-4">
            @if ( isset($gallery) )
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans("blogify::gallery.form.placeholder.value")]) !!}
            @else
                {!! Form::file('file[]', ['class' => 'form-control', 'multiple' => true]) !!}
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