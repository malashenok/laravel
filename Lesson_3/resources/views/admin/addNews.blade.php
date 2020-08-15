@extends ('layouts.main')
@include ('menu')
@section ('title')
    @parent Добавить новость
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Добавить новость') }}</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="newsHeader">Заголовок</label>
                                <input type="text" class="form-control" id="newsHeader"
                                       aria-describedby="newsHeaderHelp"
                                       placeholder="Заголовок">
                                <small id="newsHeaderHelp" class="form-text text-muted">Введите заголовок</small>
                            </div>
                            <div class="form-group">
                                <label for="newsText">Текст</label>
                                <textarea class="form-control" id="newsText" aria-describedby="newsTextHelp"
                                          rows="3"></textarea>
                                <small id="newsTextHelp" class="form-text text-muted">Введите текст</small>
                            </div>
                            <div class="form-group">
                                <label class="my-1 mr-2" for="newsCategory">Категория</label>
                                <select class="custom-select my-1 mr-sm-2" id="newsCategory">
                                    @forelse($categories as $key => $value)
                                        <option value="{{ $key }}">{{ $value['text'] }}</option>
                                    @empty
                                        <option value=""></option>
                                    @endforelse
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
