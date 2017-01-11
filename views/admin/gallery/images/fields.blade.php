<?php
$editable = (isset($user)) ? "disabled" : null;
?>
@extends('blogify::admin.layouts.dashboard')
@section('page_heading', isset($user) ? trans("blogify::gallery.form.page_title_edit")  : trans("blogify::gallery.form.page_title_create") )
@section('section')

    {!! Form::open( [ 'route' => 'admin.images.store', 'files' => true]) !!}
    <div class="row">
        <div class="col-sm-2">
            {!! Form::submit(trans("blogify::gallery.images.button"), ['class'=>'btn btn-success']) !!}
            <br>
            <br>
        </div>
    </div>
        <?php $count=1 ?>
    <div class="row">
        @foreach(Session::get('gallery') as $image)
            @if(($count % 4) == 0)
                <div class="row">
            @endif
                    <div class="col-xs-18 col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="{{ asset($image->getUrl()) }}" class="img-thumbnail" width="500" alt="" style="max-height: 210px; min-height: 210px;">
                            <div class="caption">
                                {!! Form::text('title', null, ['class'=>'form-control', 'placeholder' => 'Ingrese Título']) !!}
                                <br>
                                {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder' => 'Ingrese Descripción'] ) !!}
                                <br>
                                {!! Form::text('ubication', null, ['class'=>'form-control', 'placeholder' => 'Ingrese Ubicación' ] ) !!}</td>
                            </div>
                        </div>
                    </div>
            @if(($count % 4) == 0)
                </div>
            @endif

            <?php $count++ ?>
        @endforeach
    </div>
    {!! Form::close() !!}

@stop