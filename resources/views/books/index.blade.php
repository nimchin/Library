@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="book_image">
            <img src="{{$book->img}}" alt="{{$book->name}}">
        </div>
        <div class="book_name">{{$book->name}}</div>
        <div class="book_author">{{$book->author}}</div>
        <div class="book_topic">{{$book->topic}}</div>
        <div class="book_year">{{$book->year}}</div>
    </div>
@endsection