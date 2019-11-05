@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('app.admin_menu')}}</div>
                        <div class="card-body">
                            <div class="user_add_form_container">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {{ Session::get('message', '') }}
                                    </div>
                                @endif
                            <form action="{{route('store_user')}}" method="post">
                                <div class="user_add_form">
                                    @csrf
                                    <label class="label" for="name">Username*</label>
                                    <input type="text" name="name" id="name">
                                    <br>
                                    <label class="label" for="email">E-mail*</label>
                                    <input type="email" name="email" id="email">
                                    <br>
                                    <label class="label" for="password">Password*</label>
                                    <input type="password" name="password" id="password">
                                    <br>
                                    <label class="label" for="password_confirmation">Confirm Password*</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation">
                                    <br>
                                    <label for="user_role_id">Роль користувача</label>
                                    <select name="role_id" id="user_role_id">
                                        <option value="{{App\Role::USER_ROLE_ID}}">{{'Звичайний Користувач'}}</option>
                                        <option value="{{App\Role::HALL_ADMIN_ROLE_ID}}">{{'Адміністратор залу'}}</option>
                                        <option value="{{App\Role::ARCHIVE_ADMIN_ROLE_ID}}">{{'Адміністратор архіву'}}</option>
                                    </select>
                                    <div class="add_user_button">
                                        <input type="submit" class="button8" id="add_user_button" value="Додати користувача">
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection