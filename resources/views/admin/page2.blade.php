@extends('layout')

@section('title')
    {{ $title }}
@endsection

@section('js')
    <script>
        let event_item_id = @json($event_item_id);
    </script>
@endsection

@section('header')

@endsection



@section('sidebar')

@endsection



@section('content')
    <div class="card mb-3">
        <div class="card-header">
            Название мероприятия
        </div>
        <div class="card-body">
            {{ $model->title }}
        </div>
    </div>


    <div id="vue_app"></div>

@endsection





