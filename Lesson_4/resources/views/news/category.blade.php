@extends ('layouts.main')
@include ('menu')
@section ('title','Категории новостей')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                                <h1>Категории новостей</h1>
                                @forelse($categories as $key => $value)
                                    <a category_id="{{ $key }}"
                                       href="{{ route('CategoryOne', $value['slug']) }}">{{ $value['text'] }}</a><br>
                                @empty
                                    Категорий нет
                                @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
