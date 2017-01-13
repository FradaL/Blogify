<?php
$editable = (isset($user)) ? "disabled" : null;
?>
@extends('blogify::admin.layouts.dashboard')
@section('page_heading', isset($user) ? trans("blogify::gallery.form.page_title_edit")  : trans("blogify::gallery.form.page_title_create") )
@section('section')

    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php $count=0;?>
                @foreach($media as $image)
                    <?php $x = $image->gallery->getMedia(); ?>
                    <tr>
                        <td><img src="{{ asset($x[$count]->getUrl()) }}" class="" alt="" style="max-width: 200px; min-width: 200px; max-height: 150px; min-height: 150px;"></td>
                        <td><a  class="btn btn-info"  href="{{ route('admin.gallery.images.edit', $image->id) }}"><span class="fa fa-pencil fa-fw"></span> </a></td>
                    </tr>
                    <?php $count++ ?>
                @endforeach
                </tbody>
            </table>
            {!!  $image->render !!}
        </div>
    </div>

@stop