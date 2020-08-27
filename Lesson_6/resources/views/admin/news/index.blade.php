@extends ('layouts.main')
@include ('menu')
@section ('title','Новости')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">CRUD Новости</h3>
                    </div>
                    <div class="card-body">
                            @forelse($news as $key => $value)
                            <h4>{{ $value->title }}</h4>
                                <a href="{{ route('admin.news.edit', $value) }}" class="card-link btn btn-success">
                                    Edit
                                </a>
                                <a href="{{ route('admin.news.destroy', $value) }}" class="card-link btn btn-danger">
                                    Delete
                                </a>
                            @empty
                                Нет новостей
                            @endforelse
                    </div>
                    <div class="card-footer">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
