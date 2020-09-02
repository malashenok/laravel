@extends ('layouts.main')
@section ('title','Редактирование новостей')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div
                        class="card-header">@if ($news->id){{ __('Изменить новость') }}@else{{ __('Добавить новость') }}@endif</div>
                    <div class="card-body">
                        <form method="post"
                              action="@if (!$news->id){{ route('admin.news.create') }}@else{{ route('admin.news.update', $news) }}@endif">
                            @csrf
                            <div class="form-group">
                                <label for="newsHeader">Заголовок</label>
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('title') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" class="form-control" id="newsHeader"
                                       aria-describedby="newsHeaderHelp"
                                       placeholder="Заголовок" name="title" value="{{ old('title') ?? $news->title ?? '' }}">
                                <small id="newsHeaderHelp" class="form-text text-muted">Введите заголовок</small>
                            </div>
                            <div class="form-group">
                                <label for="newsText">Текст</label>
                                @if ($errors->has('text'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('text') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <textarea class="form-control" id="newsText" name="text" aria-describedby="newsTextHelp"
                                          rows="3">{{ old('text') ?? $news->text ?? '' }}</textarea>
                                <small id="newsTextHelp" class="form-text text-muted">Введите текст</small>
                            </div>
                            <div class="form-group">
                                <label class="my-1 mr-2" for="newsCategory">Категория</label>
                                @if ($errors->has('category_id'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('category_id') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <select name="category_id" id="newsCategory" class="custom-select my-1 mr-sm-2">
                                    @forelse($categories as $key => $value)
                                        @if (old('category_id'))
                                            <option @if ($value->id == old('category_id')) selected
                                                    @endif value="{{ $value->id }}">{{ $value->text }}
                                        @else
                                            <option @if (!empty($category_id) && $value->id == $category_id) selected
                                                    @endif
                                                    value="{{ $value->id }}">{{ $value->text }}</option>
                                        @endif
                                    @empty
                                        <option value="0" selected>Нет категории</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-check">
                                <input @if ($news->isPrivate == 1) checked @endif id="isPrivate"
                                       name="isPrivate" value="1" class="form-check-input" type="checkbox">
                                <label for="isPrivate">Приватная</label>
                            </div>
                            @if ($errors->has('isPrivate'))
                                <div class="alert alert-danger">
                                    @foreach($errors->get('isPrivate') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <button type="submit"
                                    class="btn btn-primary">@if ($news->id){{ __('Изменить') }}@else{{ __('Добавить') }}@endif</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
