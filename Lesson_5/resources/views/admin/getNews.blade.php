@extends ('layouts.main')
@include ('menu')
@section ('title','Выгрузить новости')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Выгрузить новости') }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.download') }}">
                            @csrf
                            <div class="form-group">
                                <label class="my-1 mr-2" for="newsText">Категория</label>
                                <select name="category" class="custom-select my-1 mr-sm-2" id="newsText">
                                    @forelse($categories as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->text }}</option>
                                    @empty
                                        <option value=""></option>
                                    @endforelse
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Выгрузить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
