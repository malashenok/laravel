@extends ('layouts.main')
@include ('menu')
@section ('title','Новости')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (!$news['isPrivate'])
                            <h3>{{ $news['title'] }}</h3>
                            <p>{{ $news['text'] }}</p>
                        @else
                            Новость приватная. Зарегистрируйтесь для просмотра
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
