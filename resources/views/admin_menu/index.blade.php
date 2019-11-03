@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('app.admin_menu')}}</div>
                    <div class="card-body">
                        <div class="content">
                            <div class="admin_menu">
                            @if(auth()->user()->id == App\Role::ARCHIVE_ADMIN_ROLE_ID)
                                <a href="{{route('add_user')}}" class="button8">Додати користувача</a>
                                <a href="{{route('search_user')}}" class="button8">Пошук по користувачам</a>
                            @elseif(auth()->user()->id == App\Role::ARCHIVE_ADMIN_ROLE_ID)
                                <a href=""><button>Додати книгу</button></a>
                                <a href=""><button>Видалити книгу</button></a>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection