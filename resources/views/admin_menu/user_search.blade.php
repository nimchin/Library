@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('app.admin_menu')}}</div>
                    <div class="card-body">
                        <div class="user_search">
                            <form action="{{route('search_user')}}">
                                <input class="search_input" type="text" name="searched_text" placeholder="Search...">
                                <input class="search_button" type="submit" value="{{__('app.search')}}">
                            </form>
                        </div>
                        <div class="user">
                            @foreach($users as $user)
                                <div class="name">{{$user->name}}</div>
                                <div class="email">{{$user->email}}</div>
                                <div class="role">{{\App\Role::getRoleById($user->role_id)}}</div>
                                <div class="registration_date">{{$user->created_at}}</div>
                                <hr>
                            @endforeach
                            <div class="pagination">{{$users->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection