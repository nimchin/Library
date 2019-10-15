@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="search">
                    <input type="text" name="searched_text" placeholder="Search...">
                    <input type="submit" name="send" value="Send">
                </div>
                <div class="card-header">Books</div>

                <div class="card-body">
                    <table>
                        @foreach($books as $book)
                            <div class="book_name">{{$book->name}}</div>
                            <img src="{{asset('/img/book1.jpg')}}" alt="">
                            <div class="author">{{$book->author}}</div>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
