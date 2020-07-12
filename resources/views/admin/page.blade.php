@extends('layout')

@section('title')
    {{ $title }}
@endsection



@section('header')

@endsection



@section('sidebar')

@endsection



@section('content')

    <div class="members_list">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">E-mail</th>
            </tr>
            </thead>
            <tbody>
            @foreach($models as $model)
                <tr>
                    <th scope="row">{{ $model->id }}</th>
                    <td>{{ $model->first_name }}</td>
                    <td>{{ $model->last_name }}</td>
                    <td>{{ $model->email }}</td>
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection





@section('footer_js')

@endsection
