@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="margin-t-15">Тестовое задание</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($data as $item)
                <div class="col-md-4 margin-t-15">
                    <div class="card h-100">
                        <div class="card-header">
                            Дата выхода: {{ date('d-m-Y', $item->date) }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Название: {{ $item->name }}</h5>
                            <p class="card-text">Эпизод: {{ $item->episode }}</p>
                            <a href="{{ $item->link }}" class="btn btn-secondary">Перейти на страницу</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 margin-t-15 margin-b-50">
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection