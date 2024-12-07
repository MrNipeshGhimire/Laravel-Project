@extends('frontend.includes.app')

@section('main-content')

<div class="untree_co-section product-section before-footer-section">
	<div class="container">
		  <div class="row">
			@if ($datas != null)
			@foreach ($datas as $data)
			@if (!$data->products->isEmpty())
            <h3 class="text-center">{{$data->name}}</h3>
        @endif
			@foreach($data->products as $item)
			<div class="col-12 col-md-4 col-lg-3 mb-5">
				<a class="product-item" href="{{route('detail',$item->id)}}">
					<img src="{{asset($item->image)}}" class="img-fluid product-thumbnail">
					<h3 class="product-title">{{$item->name}}</h3>
					<strong class="product-price">Rs {{$item->price}}</strong> 
	
					<span class="icon-cross">
						<img src="{{asset('frontend/images/cross.svg')}}" class="img-fluid">
						{{-- <form action="{{ route('cart.add') }}" method="POST">
							@csrf
							<input type="hidden" name="product[id]" value="{{ $item->id }}">
							<input type="hidden" name="product[name]" value="{{ $item->name }}">
							<input type="number" name="product[quantity]" value="1">
							<button type="submit">Add {{ $item->name }} to Cart</button>
						</form> --}}
					</span>
				</a>
			</div> 
	@endforeach
			@endforeach
	
			@else
			<div class="col-12 col-md-4 col-lg-3 mb-5">
				  <h1>No data found</h1>
			</div> 
			@endif
			  <!-- Start Column 1 -->
		   
			<!-- End Column 1 -->
		 
	
		  </div>
	</div>
	</div>


@endsection
