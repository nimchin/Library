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
                            <form action="{{route('store_book')}}" method="post" enctype="multipart/form-data">
                                <div class="user_add_form">
                                    @csrf
                                    <label class="label" for="name">Назва*</label>
                                    <input type="text" name="name" id="name">
                                    <br>
                                    <label class="label" for="author">Автор*</label>
                                    <input type="text" name="author" id="author">
                                    <br>
                                    <label class="label" for="topic">Жанр*</label>
                                    <input type="text" name="topic" id="topic">
                                    <br>
                                    <label class="label" for="book_img">Фото*</label>
                                    <input type="file" name="book_img" id="book_img" accept="image/*">
                                    <br>
                                    <label for="year">Рік виданння*</label>
                                    <input type="number" name="year" id="year">
                                    <br>
                                    <label for="count_of_books">Кількість примірників*</label>
                                    <input type="number" name="count_of_books" id="count_of_books">
                                    <br>
                                    <div class="add_book_button">
                                        <input type="submit" class="button8" id="add_book_button" value="Додати книгу">
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