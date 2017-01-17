<?php
$editable = (isset($user)) ? "disabled" : null;
?>
@extends('blogify::admin.layouts.dashboard')
@section('page_heading', isset($user) ? trans("blogify::gallery.form.page_title_edit")  : trans("blogify::gallery.form.page_title_create") )
@section('section')

    <div class="row">
        <div class="col-md-6">
            @if($media->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach($media as $image)

                        <tr>

                            <td><img src="{{ asset( 'media/' . $image->id . '/' . $image->file_name) }}" class="" alt="" style="max-width: 200px; min-width: 200px; max-height: 150px; min-height: 150px;"></td>
                            <td>
                                <a  class="btn btn-info"  href="{{ route('admin.gallery.images.edit', $image->id) }}"><span class="fa fa-pencil fa-fw"></span> </a>
                                {!! Form::open( [ 'route' => ['admin.gallery.images.delete', $image->id], 'class' => $image->id . ' form-delete' ] ) !!}
                                {!! Form::hidden('_method', 'delete') !!}
                                <a href="#" title="" class="btn btn-info delete" id="{{$image->id}}"><span class="fa fa-trash-o fa-fw"></span></a>
                                {!! Form::close() !!}
                                {!! Form::open( [ 'route' => ['admin.gallery.images.up', $image->id], 'class' => 'form-delete' ] ) !!}
                                {!! Form::hidden('_method', 'post') !!}
                                <button   class="btn btn-info"  onclick="return confirm('Desea Cambiar Posición?')"><span class="fa fa-arrow-circle-up fa-fw"></span></button>
                                {!! Form::close() !!}
                                {!! Form::open( [ 'route' => ['admin.gallery.images.down', $image->id], 'class' => 'form-delete' ] ) !!}
                                {!! Form::hidden('_method', 'post') !!}
                                <button class="btn btn-info"  onclick="return confirm('Desea Cambiar Posición?')"><span class="fa fa-arrow-circle-down fa-fw"></span></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
                {!!  $image->render !!}
            @else
                <p align="center"> No hay Imagenes En esta galeria.</p>
            @endif
        </div>
    </div>

@stop