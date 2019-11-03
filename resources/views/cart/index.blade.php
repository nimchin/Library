@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    @if($orders)
                        <div class="cart_content">
                            @foreach($orders as $order)
                                @php $book = $order->book()->first(); @endphp
                                <div class="order">
                                    <div class="order_book_img">
                                        <img src="{{asset($book->img)}}" alt="" width="100">
                                    </div>
                                    <div class="order_book_name">
                                        <a href="{{route('book', $order->book_id)}}">
                                            {{$book->name}}
                                        </a>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    @else
                        <img src="{{asset('img/empty_cart.png')}}" alt="Empty Cart">
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/order.css')}}">
@endsection