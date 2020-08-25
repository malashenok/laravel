@extends ('layouts.main')
@include ('menu')
@section ('title','Добавить новость')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if (!empty($delete))
                            {{ __('Удалить категорию') }}
                        @elseif ($category->id)
                            {{ __('Изменить категорию') }}
                        @else
                            {{ __('Добавить категорию') }}
                        @endif
                    </div>
                    <div class="card-body">
                        <form method="post" action="
                        @if (!empty($delete))
                        {{ route('admin.category.destroy', $category) }}
                        @elseif (!$category->id)
                        {{ route('admin.category.store') }}
                        @else
                        {{ route('admin.category.update', $category) }}
                        @endif
                            ">
                            @if ($category->id && !empty($delete))
                                <input type="hidden" name="_method" value="DELETE">
                            @elseif($category->id)
                                <input type="hidden" name="_method" value="PUT">
                            @else
                                <input type="hidden" name="_method" value="POST">
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="categoryHeader">Заголовок</label>
                                <input type="text" class="form-control" id="categoryHeader"
                                       aria-describedby="categoryHeaderHelp" @if (!empty($delete)) {{ 'disabled' }}@endif
                                       placeholder="Заголовок" name="slug" value="{{ $category->slug ?? old('slug') }}">
                                @if (empty($delete))
                                    <small id="categoryHeaderHelp" class="form-text text-muted">Введите заголовок</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="categoryText">Текст</label>
                                <textarea class="form-control" id="categoryText" name="text" @if (!empty($delete)) {{ 'disabled' }}@endif
                                          aria-describedby="categoryTextHelp"
                                          rows="3">{{ $category->text ?? old('text') }}</textarea>
                                @if (empty($delete))
                                    <small id="categoryTextHelp" class="form-text text-muted">Введите текст</small>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">
                                @if (!empty($delete))
                                {{ __('Удалить') }}
                                @elseif ($category->id)
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
