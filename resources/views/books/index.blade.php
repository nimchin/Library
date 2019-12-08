@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    @if($book)
                    <div class="book_content">
                        <img src="{{asset($book->img)}}" alt="{{$book->name}}">
                        <div class="book_info">
                            <div class="book_name">{{$book->name}}</div>
                            <div class="book_author">{{$book->author}}</div>
                            <div class="book_topic">{{$book->topic}}</div>
                            <div class="book_year">{{$book->year}}</div>
                            @if(Auth::user()->role_id == \App\Role::USER_ROLE_ID)
                                <form action="{{route('book_order', $book->id)}}">
                                    <input type="submit" value="Order">
                                </form>
                            @endif
                        </div>
                    </div>
                    @else
                        @include('errors.404')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript" src="{{asset('js/books.js')}}"></script>
@endsection