@extends('blogify::admin.layouts.dashboard')
@section('page_heading', trans("blogify::navigation.Slide.title") )

@section('section')

@section ('cotable_panel_body')
    <style type="">
        .clase{
            display:inline-block;
        }
    </style>

    <table class="table table-bordered sortable">
        <thead>
        <tr>
            <td>Imagen</td>
            <td>Posición</td>
            <td>Opciones</td>
        </tr>

        </thead>
        <tbody>
        @if ( count($slides) <= 0 )
            <tr>
                <td colspan="7">
                    <em>@lang('blogify::posts.overview.no_results')</em>
                </td>
            </tr>
        @endif
        @foreach ( $slides as $slide )
            <tr>
                <td><img src="{{ asset($slide->source) }}" width="100" alt="">  </td>
                <td>{!! $slide->position !!}</td>
                <td>
                    {!! Form::open( [ 'route' => ['admin.slide.delete', $slide->id], 'class' => $slide->id . ' form-delete' ] ) !!}
                    {!! Form::hidden('_method', 'delete') !!}
                    <a href="#" title="" class="btn btn-info delete" id="{{$slide->id}}"><span class="fa fa-trash-o fa-fw"></span></a>
                    {!! Form::close() !!}
                    {!! Form::open( [ 'route' => ['admin.slide.up', $slide->id], 'class' => 'clase' ] ) !!}
                    {!! Form::hidden('_method', 'post') !!}
                    <button  class="btn btn-info" type="submit" onclick="return confirm('Desea Subir un Nivel?')"><span class="fa fa-arrow-circle-up fa-fw"></span></button>
                    {!! Form::close() !!}
                    {!! Form::open( [ 'route' => ['admin.slide.down', $slide->id], 'name' => 'down', 'class' => 'clase' ] ) !!}
                    {!! Form::hidden('_method', 'post') !!}
                    <button  class="btn btn-info" type="submit" onclick="return confirm('Desea Bajar un Nivel?')"><span class="fa fa-arrow-circle-down fa-fw"></span></button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@include('blogify::admin.widgets.panel', ['header'=>true, 'as'=>'cotable'])



@stop
