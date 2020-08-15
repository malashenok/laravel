@extends ('layouts.main')
@include ('menu')
@section ('title')
    @parent Категории новостей
@endsection
@section('content')
    <div class="container">
        <h1>Категории новостей</h1>
        @forelse($categories as $key => $value)
            <a category_id="{{ $key }}" href="{{ route('CategoryOne', $value['slug']) }}">{{ $value['text'] }}</a><br>
        @empty
            Категорий нет
        @endforelse
    </div>
@endsection
