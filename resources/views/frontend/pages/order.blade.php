@extends('frontend.includes.app')
@section('main-content')


		<!-- Start Hero Section -->
        <div class="hero">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <div class="intro-excerpt">
                            <h1>Checkout</h1>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- End Hero Section -->

    <div class="untree_co-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-12">
              <div class="border p-4 rounded" role="alert">
                Returning customer? <a href="#">Click here</a> to login
              </div>
            </div>
          </div>
          <form action="{{route('place.order')}}" method="POST">
            @csrf

          <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
              <h2 class="h3 mb-3 text-black">Shipping Details</h2>
              <div class="p-3 p-lg-5 border bg-white">

                <input type="hidden" name="product_id" value="{{$data->id}}">

                <div class="form-group">
                  <label for="c_country" class="text-black">City <span class="text-danger">*</span></label>
                  <select id="c_country" name="city" class="form-control  @error('city') is-invalid @enderror">
                    <option value="" disabled>Select a city</option>    
                    <option value="Jhapa">Jhapa</option>    
                    <option value="Morang">Morang</option>    
                    <option value="Sunsari">Sunsari</option>    
                    <option value="Illam">Illam</option>    
             
                  </select>

                  @error('city')
                  <div class="alert">{{ $message }}</div>
              @enderror
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="c_fname" name="firstname">
                    @error('firstname')
                    <div class="alert">{{ $message }}</div>
                @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="c_lname" name="lastname">
                    @error('lastname')
                    <div class="alert">{{ $message }}</div>
                @enderror
                  </div>
                </div>

    
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="c_address" name="address" placeholder="Street address">
                    @error('address')
                    <div class="alert">{{ $message }}</div>
                @enderror
                  </div>
                </div>

            

                <div class="form-group row mb-5">
                  <div class="col-md-6">
                    <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="c_email_address" name="email">
                    @error('email')
                    <div class="alert">{{ $message }}</div>
                @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="c_phone" name="phone" placeholder="Phone Number">
                    @error('phone')
                    <div class="alert">{{ $message }}</div>
                @enderror
                  </div>
                </div>



        


              </div>
            </div>
            <div class="col-md-6">
              <div class="row mb-5">
                  <div class="col-md-12">
                      <h2 class="h3 mb-3 text-black">Your Order</h2>
                      <div class="p-3 p-lg-5 border bg-white">
                          <form id="order-form" action="{{ route('place.order') }}" method="POST">
                              @csrf
                              <table class="table site-block-order-table mb-5">
                                  <thead>
                                      <th>Product</th>
                                      <th>Price</th>
                                      <th>Quantity</th>
                                      <th>Total</th>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>{{$data->title}}</td>
                                          <td id="price">{{$data->price}}</td>
                                          <td>
                                              <button type="button" onclick="decreaseQuantity()">-</button>
                                              <input type="text" id="quantity" name="quantity" value="1">
                                              <button type="button" onclick="increaseQuantity()">+</button>
                                          </td>
                                          <td id="total">{{$data->price}}</td>
                                          <td><input type="hidden" id="totalInput" name="total" value="{{$data->price}}"></td>
                        

                                          
                                      </tr>
                                  </tbody>
                              </table>
          
                              <div class="form-group">
                                  <button type="submit" onclick="placeOrder()" class="btn btn-black btn-lg py-3 btn-block">Place Order</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          
        </div>
        </form>
          <!-- </form> -->
        </div>
      </div>
      <script>
        function increaseQuantity() {
            var quantityInput = document.getElementById("quantity");
            var quantity = parseInt(quantityInput.value);
            quantityInput.value = quantity + 1;
            updateTotal();
        }
    
        function decreaseQuantity() {
            var quantityInput = document.getElementById("quantity");
            var quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
                updateTotal();
            }
        }
    
        function updateTotal() {
            var price = parseFloat(document.getElementById("price").innerText);
            var quantity = parseInt(document.getElementById("quantity").value);
            var total = price * quantity;
            document.getElementById("total").innerText = total.toFixed(2);
            document.getElementById("totalInput").value = total.toFixed(2);

        }
    
        function placeOrder() {
            // You can add any additional validation here if needed
            document.getElementById("order-form").submit();
        }
    </script>
    
@endsection
