@extends ('layouts.main')
@section ('title','Новости')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Новости</h3>
                    </div>
                    <div class="card-body">
                        @forelse($news as $key => $value)
                            <h3>{{ $value->title }}</h3>
                            @if (!$value->isPrivate)
                                <a href="{{ route('NewsOne', $value->id) }}">Подробнее ...</a><br>
                            @endif
                        @empty
                            Нет новостей
                        @endforelse
                    </div>
                    <div class="card-footer">
                        {{  $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
