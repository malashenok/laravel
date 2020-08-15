@extends ('layouts.main')
@include ('menu')
@section ('title')
    @parent Новости
@endsection
@section('content')
    <div class="container">
        <h2>{{ $slug }}</h2>
        @forelse($news as $key => $value)
            <h2>{{ $value['title'] }}</h2>
            @if (!$value['isPrivate'])
                <a href="{{ route('NewsOne', $key) }}">Подробнее ...</a><br>
            @endif
        @empty
            Нет новостей
        @endforelse
    </div>
@endsection
