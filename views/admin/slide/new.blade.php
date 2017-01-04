<?php
$editable = (isset($user)) ? "disabled" : null;
?>
@extends('blogify::admin.layouts.dashboard')
@section('page_heading', isset($user) ? trans("blogify::users.form.page_title_edit")  : trans("blogify::users.form.page_title_create") )
@section('section')

@include('blogify::admin.snippets.validation-errors')

@if ( isset($user) )
    {!! Form::open( [ 'route' => ['admin.users.update', $user->hash] ] ) !!}
    {!! Form::hidden('_method', 'put') !!}
@else
    {!! Form::open( [ 'route' => 'admin.users.store' ] ) !!}
@endif
    <div class="row form-group {{ $errors->has('imagen') ? 'has-error' : '' }}">
        <div class="col-sm-2">
            {!! Form::label('imagen', trans("blogify::users.form.name.label") ) !!}
        </div>
        <div class="col-sm-10">
            {!! Form::file('file') !!}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            {!! Form::submit(trans("blogify::users.form.submit_button.value"), ['class'=>'btn btn-success']) !!}
        </div>
    </div>

{!! Form::close() !!}

@stop