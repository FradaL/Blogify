<?php
$editable = (isset($user)) ? "disabled" : null;
?>
@extends('blogify::admin.layouts.dashboard')
@section('page_heading', isset($user) ? trans("blogify::gallery.form.page_title_edit")  : trans("blogify::gallery.form.page_title_create") )
@section('section')

    {!! Form::open( [ 'route' => 'admin.images.update', 'method' => 'put', 'files' => true]) !!}
    <div class="row">
        <div class="col-sm-2">
            {!! Form::submit(trans("blogify::gallery.images.buttonUpdate"), ['class'=>'btn btn-success']) !!}
            <br>
            <br>
        </div>
    </div>
    <?php $count=1 ?>
    <div class="row">
                <div class="row">
                    <div class="col-xs-18 col-sm-6 col-md-3">
                        <div class="thumbnail">
                            {!! Form::hidden('image[]', $meta->media_id) !!}

                            <img src="{{ asset($img->getUrl()) }}" class="img-thumbnail" width="500" alt="" style="max-height: 210px; min-height: 210px;">

                            <div class="caption">
                                {!! Form::text('title[]', $meta->title, ['class'=>'form-control', 'placeholder' => 'Ingrese Título']) !!}
                                <br>
                                {!! Form::textarea('description[]', $meta->description, ['class'=>'form-control', 'placeholder' => 'Ingrese Descripción'] ) !!}
                                <br>
                                {!! Form::text('ubication[]', $meta->location, ['class'=>'form-control', 'placeholder' => 'Ingrese Ubicación' ] ) !!}</td>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    {!! Form::close() !!}

@stop