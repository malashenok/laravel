@extends ('layouts.main')
@section ('title','Новости')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $slug }}</div>
                    <div class="card-body">
                        @forelse($news as $key => $value)
                            <h3>{{ $value->title }}</h3>
                            <div class="card-img"
                                 style="background-image: url({{ $value->image ?? asset('storage/default.jpg') }});">
                            </div>
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
