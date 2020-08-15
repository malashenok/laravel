@extends ('layouts.main')
@include ('menu')
@section ('title')
    @parent Новости
@endsection
@section('content')
    <div class="container">
        @if (!$news['isPrivate'])
            <h1>Новость <?=$id?></h1>
            <h2>{{ $news['title'] }}</h2>
            <p>{{ $news['text'] }}</p>
        @else
            Новость приватная. Зарегистрируйтесь для просмотра
        @endif
    </div>
@endsection
