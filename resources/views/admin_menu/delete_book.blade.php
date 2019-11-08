@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('app.admin_menu')}}</div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ Session::get('message', '') }}
                            </div>
                        @endif
                        <div class="user">
                            @foreach($books as $book)
                                <div class="book_content">
                                    <img src="{{asset($book->img)}}" alt="{{$book->name}}">
                                    <div class="book_info_wrapper">
                                        <div class="book_info">
                                            <div class="book_name">{{$book->name}}</div>
                                            <div class="book_author">{{$book->author}}</div>
                                            <div class="book_topic">{{$book->topic}}</div>
                                            <div class="book_year">{{$book->year}}</div>
                                        </div>
                                        @if(Auth::user()->role_id == \App\Role::ARCHIVE_ADMIN_ROLE_ID)
                                            <div class="delete_book">
                                                <a href="{{route('delete_book', ['id' => $book->id])}}">
                                                    <img src="{{asset('img/close_icon.png')}}" alt="" width="20">
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            <div class="pagination">{{$books->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/delete_books.css')}}">
@endsection