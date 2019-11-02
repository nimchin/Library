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
                    <table>
                        @foreach($books as $book)
                            <div class="book_name">{{$book->name}}</div>
                            <div class="book_author">{{$book->author}}</div>
                            <div class="book_topic">{{$book->topic}}</div>
                            <div class="book_year">{{$book->year}}</div>
                            <img src="{{asset($book->img)}}" alt="{{$book->name}}">
                            @if(Auth::user()->role_id == 1)
                                <a href="{{route('book', ['id' => $book->id])}}"><button>View</button></a>
                            @endif
                            <hr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
