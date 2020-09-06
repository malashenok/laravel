@extends ('layouts.main')
@section ('title','Редактирование категории')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if ($category->id)
                            {{ __('Изменить категорию') }}
                        @else
                            {{ __('Добавить категорию') }}
                        @endif
                    </div>
                    <div class="card-body">
                        <form method="post" action="
                        @if (!$category->id)
                            {{ route('admin.category.store') }}
                        @else
                            {{ route('admin.category.update', $category) }}
                        @endif
                            ">
                            @if($category->id)
                                <input type="hidden" name="_method" value="PUT">
                            @else
                                <input type="hidden" name="_method" value="POST">
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="categoryHeader">Заголовок</label>
                                @if ($errors->has('slug'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('slug') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" class="form-control" id="categoryHeader"
                                       aria-describedby="categoryHeaderHelp"
                                       placeholder="Заголовок" name="slug" value="{{ $category->slug ?? old('slug') }}">
                                    <small id="categoryHeaderHelp" class="form-text text-muted">Введите заголовок</small>
                            </div>
                            <div class="form-group">
                                <label for="categoryText">Текст</label>
                                @if ($errors->has('text'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('text') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <textarea class="form-control" id="categoryText" name="text"
                                          aria-describedby="categoryTextHelp"
                                          rows="3">{{ $category->text ?? old('text') }}</textarea>
                                    <small id="categoryTextHelp" class="form-text text-muted">Введите текст</small>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                @if ($category->id)
                                {{ __('Изменить') }}
                                @else
                                {{ __('Добавить') }}
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
