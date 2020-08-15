@extends ('layouts.main')
@include ('menu')
@section ('title')
    @parent Ошибка
@endsection
@section('content')
    <div class="container">
        <h2>К сожалению, {{ $error }}</h2>
    </div>
@endsection
