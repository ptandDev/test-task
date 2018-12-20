@extends('layout')

@section('content')
    <div class="container">
        @if($data->isEmpty())
            <div class="container">
                <div class="row thumb-list">
                    <div class="jumbotron margin-t-15">
                        <h1>Ничего не найдено</h1>
                        <p class="lead">К сожалению, по вашему запросу ничего не найдено. Попробуйте ввести другой поисковый запрос.</p>
                        <hr class="my-4">
                        <a href="/" class="btn btn-secondary">Вернуться</a>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <h1 class="margin-t-15">Результаты поиска:</h1>
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
        @endif
    </div>
@endsection