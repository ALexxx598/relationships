@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<form action="/api/order" method="POST">
    @csrf
    <div>
        <input type="number" name="productId">
        <input type="submit" value="Add">
    </div>
</form>
<form action="/api/showAllOrders" method="GET">
    @csrf
    <div>
        <input type="submit" value="ShowAllOrders">
    </div>
</form>
<form action="/api/order/1" method="GET">
    @csrf
    <div>
        <input type="submit" value="ShowWithProduct">
    </div>
</form>
<form action="/api/showProductWithOrders/1" method="GET">
    @csrf
    <div>
        <input type="submit" value="ShowProductWithOrders">
    </div>
</form>
<form action="/api/order/3" method="POST">
    @csrf
    <div>
        <input type="submit" value="DELETE">
    </div>
    @method('DELETE')
</form>
<form action="/api/product/2" method="POST">
    @csrf
    <div>
        <input type="submit" value="DELETE">
    </div>
    @method('DELETE')
</form>
@endsection
