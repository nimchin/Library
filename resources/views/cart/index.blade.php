@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    @if(!empty(array_values($orders)[0]) && !empty(array_values($orders)[0]))
                        <div class="cart_content">
                            @isset($orders['sameOrders'])
                                @php $book = $orders['sameOrders'][0]->book()->first(); @endphp
                                <div class="order">
                                    <div class="order_book_img">
                                        <img src="{{asset($book->img)}}" alt="" width="100">
                                    </div>
                                    <div class="book_info">
                                        <div class="order_title">
                                            <div class="order_book_name">
                                                <a href="{{route('book', $book->id)}}">
                                                    {{$book->name}}
                                                </a>
                                            </div>
                                            <div class="delete_order">
                                                <a href="{{route('delete_order', $book->id)}}">
                                                    <img src="{{asset('img/close_icon.png')}}" alt="" width="20">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="order_book_author">
                                            {{$book->author}}
                                        </div>
                                        <div class="order_book_count">
                                            {{__('books.count'). ' ' . count($orders['sameOrders'])}}
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endisset
                            @isset($orders['uniqueOrders'])
                                @foreach($orders['uniqueOrders'] as $order)
                                    @php $book = $order->book()->first(); @endphp
                                    <div class="order">
                                        <div class="order_book_img">
                                            <img src="{{asset($book->img)}}" alt="" width="100">
                                        </div>
                                        <div class="book_info">
                                            <div class="order_title">
                                                <div class="order_book_name">
                                                    <a href="{{route('book', $book->id)}}">
                                                        {{$book->name}}
                                                    </a>
                                                </div>
                                                <div class="delete_order">
                                                    <a href="{{route('delete_order', $book->id)}}">
                                                        <img src="{{asset('img/close_icon.png')}}" alt="" width="20">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="order_book_author">
                                                {{$book->author}}
                                            </div>
                                            <div class="order_book_count">
                                                {{__('books.count'). ' ' . count($orders['uniqueOrders'])}}
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            @endisset
                        </div>
                    @else
                        <div class="empty_cart">
                            <img src="{{asset('img/empty_cart.png')}}" alt="Empty Cart" width="600">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/order.css')}}">
@endsection