@extends ('layouts.main')
@include ('menu')
@section ('title','Ошибка')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>К сожалению, {{ $error }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
