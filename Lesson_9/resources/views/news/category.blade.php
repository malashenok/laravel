@extends ('layouts.main')
@section ('title','Категории новостей')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Категории новостей</h3>
                    </div>
                    <div class="card-body">
                                @forelse($categories as $key => $value)
                                    <a category_id="{{ $value->id }}"
                                       href="{{ route('CategoryOne', $value->slug) }}">{{ $value->text }}</a><br>
                                @empty
                                    Категорий нет
                                @endforelse
                    </div>
                    <div class="card-footer">
                        {{  $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
