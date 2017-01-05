@extends('blogify::admin.layouts.dashboard')
@section('page_heading', trans("blogify::navigation.Slide.title") )
@section('section')

@section ('cotable_panel_body')
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
                    <a href="#" title="" class="delete" id="{{$slide->id}}"><span class="fa fa-trash-o fa-fw"></span></a>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@include('blogify::admin.widgets.panel', ['header'=>true, 'as'=>'cotable'])



@stop
