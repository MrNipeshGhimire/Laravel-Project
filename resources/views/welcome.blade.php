<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>

<h1>Welcome</h1>

@foreach($products as $product)
    <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product[id]" value="{{ $product->id }}">
        <input type="hidden" name="product[name]" value="{{ $product->name }}">
        <input type="number" name="product[quantity]" value="1">
        <button type="submit">Add {{ $product->name }} to Cart</button>
    </form>
@endforeach

</body>
</html>
