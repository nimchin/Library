@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('message', '') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Books</div>
                <div class="card-body">
                    <div class="content">
                    <table>
                        @foreach($books as $book)
                            <div class="book_content">
                                <img src="{{asset($book->img)}}" alt="{{$book->name}}">
                                <div class="book_info">
                                    <div class="book_name">{{$book->name}}</div>
                                    <div class="book_author">{{$book->author}}</div>
                                    <div class="book_topic">{{$book->topic}}</div>
                                    <div class="book_year">{{$book->year}}</div>
                                    @if(Auth::user()->role_id == \App\Role::USER_ROLE_ID)
                                        <a href="{{route('book', ['id' => $book->id])}}"><button>@lang('books.view')</button></a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <div class="pagination">{{$books->links()}}</div>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


