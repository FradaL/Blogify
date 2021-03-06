@extends('blogify::admin.layouts.dashboard')
@section('page_heading', trans("blogify::likes.overview.title") )

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
            <th>@lang('blogify::likes.overview.table.title-one')</th>
            <th>@lang('blogify::likes.overview.table.title-three')</th>
            <th>@lang('blogify::likes.overview.table.title-two')</th>

        </tr>

        </thead>
        <tbody>

        @foreach ( $likes as $like )
            <tr>

            @if($like->likeable_type == 'jorenvanhocht\Blogify\Models\Metadata')
                    <td> {{$like->likeable->title }}</td>
                    <td> Visitante </td>
                    <td> {{ $like->total }} </td>
                @else
                    <td> {{$like->likeable->title }}</td>
                    <td> {{ $like->likeable->user->username}} </td>
                    <td> {{ $like->total }} </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@include('blogify::admin.widgets.panel', ['header'=>true, 'as'=>'cotable'])



@stop
