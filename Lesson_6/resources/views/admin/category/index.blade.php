@extends ('layouts.main')
@include ('menu')
@section ('title','Новости')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">CRUD Категории</h3>
                    </div>
                    <div class="card-body">
                            @forelse($categories as $key => $value)
                            <h4>{{ $value->text }}</h4>
                                <a href="{{ route('admin.category.edit', $value) }}" class="card-link btn btn-success">
                                    Edit
                                </a>
                                <a href="{{ route('admin.category.show', $value) }}" class="card-link btn btn-danger">
                                    Delete
                                </a>
                            @empty
                                Нет категорий
                            @endforelse
                    </div>
                    <div class="card-footer">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
