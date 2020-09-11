@extends ('layouts.main')
@section ('title','Профили')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">CRUD Профили</h3>
                    </div>
                    <div class="card-body">
                        @forelse($users as $key => $value)
                            <h4>{{ $value->name }}</h4>
                            <a href="{{ route('admin.profiles.edit', $value) }}" class="card-link btn btn-success">
                                Edit
                            </a>
                            <a href="{{ route('admin.profiles.destroy', $value) }}" class="card-link btn btn-danger">
                                Delete
                            </a>
                            <a href="{{ route('admin.profiles.setAdmin', $value) }}" class="card-link btn
                                            @if ($value->isAdmin){{ __('btn-danger') }}@else{{ __('btn-success') }}@endif">
                                @if ($value->isAdmin)
                                    Admin
                                @else
                                    User
                                @endif
                            </a>
                        @empty
                            Нет пользователей
                        @endforelse
                    </div>
                    <div class="card-footer">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
