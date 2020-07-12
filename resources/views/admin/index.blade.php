@extends('layout')

@section('title')
    {{ $title }}
@endsection



@section('header')

@endsection



@section('sidebar')

@endsection



@section('content')

    <div id="app">
        <div class="title"><h3>Список мероприятий</h3></div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">City</th>
                <th scope="col">Date</th>
                <th scope="col">Members</th>
            </tr>
            </thead>
            <tbody>
            @foreach($models as $model)
            <tr>
                <th scope="row">{{ $model->id }}</th>
                <td><a href="{{ route('event_page', ['id'=>$model->id]) }}">{{ $model->title }}</a> </td>
                <td>{{ $model->town }}</td>
                <td>{{ $model->event_date }}</td>
                <td>{{ count($model->members) }}</td>
            </tr>
            @endforeach
        </table>

        @if( method_exists($models,'links') )
            <div class="justify-content-center row">
                <div>
                    @if(isset($sorting))
                        {{ $models->appends(['sorting'=>$sorting])->links() }}
                    @else
                        {{ $models->links() }}
                    @endif
                </div>
            </div>
        @endif
    </div>

@endsection





@section('footer_js')

@endsection