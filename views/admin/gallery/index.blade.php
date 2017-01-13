@extends('blogify::admin.layouts.dashboard')
@section('page_heading', trans("blogify::gallery.overview.page_title") )

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
            <td>@lang('blogify::gallery.table.thead-one')</td>
            <td>@lang('blogify::gallery.table.thead-two')</td>
            <td>Opciones</td>
        </tr>

        </thead>
        <tbody>
        @if ( count($gallerys) <= 0 )
            <tr>
                <td colspan="7">
                    <em>@lang('blogify::gallery.table.no_results')</em>
                </td>
            </tr>
        @endif
        @foreach ( $gallerys as $gallery )
            <tr>
                <td> {{$gallery->name }}</td>
                <td> {{ $gallery->mediaImage()->count() }}
                    @if($gallery->mediaImage()->count() > 0)
                    <a href="{{ route('admin.images.info.view', $gallery->id) }}" class="fa fa-eye fa-fw"></a>
                    @else
                        </td>
                    @endif
                <td>
                    {!! Form::open( [ 'route' => ['admin.gallery.delete', $gallery->id], 'class' => $gallery->id . ' form-delete' ] ) !!}
                    {!! Form::hidden('_method', 'delete') !!}
                    <a href="#" title="" class="btn btn-info delete" id="{{$gallery->id}}"><span class="fa fa-trash-o fa-fw"></span></a>
                    {!! Form::close() !!}
                    {!! Form::open( [ 'route' => ['admin.gallery.edit', $gallery], 'name' => 'down', 'class' => 'clase' ] ) !!}
                    {!! Form::hidden('_method', 'get') !!}
                    <button  class="btn btn-info" type="submit" onclick="return confirm('Desea Editar?')"><span class="fa fa-arrow-circle-down fa-fw"></span></button>
                    {!! Form::close() !!}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@include('blogify::admin.widgets.panel', ['header'=>true, 'as'=>'cotable'])



@stop
