@extends ('layouts.main')
@include ('menu')
@section ('title','Добавить новость')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@if ($news->id){{ __('Изменить новость') }}@else{{ __('Добавить новость') }}@endif</div>
                    <div class="card-body">
                        <form method="post" action="@if (!$news->id){{ route('admin.news.create') }}@else{{ route('admin.news.update', $news) }}@endif">
                            @csrf
                            <div class="form-group">
                                <label for="newsHeader">Заголовок</label>
                                <input type="text" class="form-control" id="newsHeader"
                                       aria-describedby="newsHeaderHelp"
                                       placeholder="Заголовок" name="title" value="{{ $news->title ?? old('title') }}">
                                <small id="newsHeaderHelp" class="form-text text-muted">Введите заголовок</small>
                            </div>
                            <div class="form-group">
                                <label for="newsText">Текст</label>
                                <textarea class="form-control" id="newsText" name="text" aria-describedby="newsTextHelp"
                                          rows="3">{{ $news->text ?? old('text') }}</textarea>
                                <small id="newsTextHelp" class="form-text text-muted">Введите текст</small>
                            </div>
                            <div class="form-group">
                                <label class="my-1 mr-2" for="newsCategory">Категория</label>
                                <select name="category_id" id="newsCategory" class="custom-select my-1 mr-sm-2">
                                    @forelse($categories as $key => $value)
                                        <option @if ($value->id == old('category_id')) selected
                                                @endif
                                                value="{{ $value->id }}">{{ $value->text }}</option>
                                    @empty
                                        <option value="0" selected>Нет категории</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-check">
                                <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked @endif id="isPrivate"
                                       name="isPrivate" value="1" class="form-check-input" type="checkbox">
                                <label for="isPrivate">Приватная</label>
                            </div>
                            <button type="submit" class="btn btn-primary">@if ($news->id){{ __('Изменить') }}@else{{ __('Добавить') }}@endif</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
