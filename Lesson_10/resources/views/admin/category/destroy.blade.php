@extends ('layouts.main')
@section ('title','Удалить категорию')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Удалить категорию') }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.category.destroy', $category) }}">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <div class="form-group">
                                <label>Все новости данной категории будут удалены, вы уверены?</label>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Да, Удалить') }}</button>
                            <a class="btn btn-primary" href="{{ route('admin.category.index') }}" role="button">{{ __('Нет') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
