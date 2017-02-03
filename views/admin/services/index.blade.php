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
            <td>Imagen</td>
            <td>@lang('blogify::gallery.table.thead-one')</td>
            <td>@lang('blogify::gallery.table.thead-two')</td>
            <td>Opciones</td>
        </tr>
        </thead>
        <tbody>
        @if ( count($services) <= 0 )
            <tr>
                <td colspan="7">
                    <em>@lang('blogify::gallery.table.no_results')</em>
                </td>
            </tr>
        @endif
        @foreach ( $services as $service )
            <tr>

                <td><img src="{{ url($service->getMedia()->sortByDesc('created_at')->first()->getUrl('thumb')) }}" alt=""></td>
                <td> {{$service->name }}</td>
                <td> {{ $service->description}} </td>
                <td>  {!! Form::open( [ 'route' => ['admin.services.edit', $service], 'name' => 'down', 'class' => 'clase' ] ) !!}
                    {!! Form::hidden('_method', 'get') !!}
                    <button  class="btn btn-info" type="submit" onclick="return confirm('Desea Editar?')"><span class="fa fa-pencil fa-fw"></span></button>
                    {!! Form::close() !!}
                    {!! Form::open( [ 'route' => ['admin.services.delete', $service->id], 'class' => $service->id . ' form-delete' ] ) !!}
                    {!! Form::hidden('_method', 'delete') !!}
                    <a href="#" title="" class="btn btn-info delete" id="{{$service->id}}"><span class="fa fa-trash-o fa-fw"></span></a>
                    {!! Form::close() !!} </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@include('blogify::admin.widgets.panel', ['header'=>true, 'as'=>'cotable'])



@stop
