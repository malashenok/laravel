@extends ('layouts.main')
@section ('title','Редактирование источника')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div
                        class="card-header">@if ($resource->id){{ __('Изменить источник') }}@else{{ __('Добавить источник') }}@endif</div>
                    <div class="card-body">
                        <form method="post"
                              action="@if (!$resource->id){{ route('admin.resources.create') }}@else{{ route('admin.resources.update', $resource) }}@endif">
                            @csrf
                            <div class="form-group">
                                <label for="link">RSS ссылка</label>
                                @if ($errors->has('link'))
                                    <div class="alert alert-danger">
                                        @foreach($errors->get('link') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" class="form-control" id="link"
                                       aria-describedby="linkHelp"
                                       placeholder="RSS ссылка" name="link" value="{{ old('link') ?? $resource->link ?? '' }}">
                                <small id="linkHelp" class="form-text text-muted">Введите rss ссылку</small>
                            </div>
                            <button type="submit"
                                    class="btn btn-primary">@if ($resource->id){{ __('Изменить') }}@else{{ __('Добавить') }}@endif</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
