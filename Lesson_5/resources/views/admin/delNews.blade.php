@extends ('layouts.main')
@include ('menu')
@section ('title','Удалить новость')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Удалить новость') }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.delete') }}">
                            @csrf
                            <div class="form-group">
                                <label class="my-1 mr-2" for="newsText">Новость</label>
                                <select name="news_id" class="custom-select my-1 mr-sm-2" id="newsText">
                                    @forelse($news as $key => $value)
                                        <option
                                            value="{{ $value->id }}">{{ sprintf("[ %-5s ] - %50s", $value->id, $value->title) }}</option>
                                    @empty
                                        <option value=""></option>
                                    @endforelse
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
