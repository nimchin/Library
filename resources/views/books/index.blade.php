@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    <div class="book_image">
                        <img src="{{$book->img}}" alt="{{$book->name}}">
                    </div>
                    <div class="book_name">{{$book->name}}</div>
                    <div class="book_author">{{$book->author}}</div>
                    <div class="book_topic">{{$book->topic}}</div>
                    <div class="book_year">{{$book->year}}</div>
                    <form action="{{route('book_order', $book->id)}}">
                        <input type="submit" value="Order">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{mix('js/books.js')}}"></script>
@endsection