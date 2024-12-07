@extends('admin.includes.app')
@section('main-content')
    <div class="content-wrapper">


        <!-- /.card-header -->
        <!-- form start -->
        <div class="card">
            <div class="card-header">

                <h1>Order Details</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Order.NO</th>
                            <th>User Name</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Status</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $key => $data)
                        @foreach ($data->products as $item)
                            
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->user->name }}</td>

                            
                         
                                <td>{{ $item->title }}
                                </td>
                                <td>{{ $data->quantity }}
                                </td>
                                <td>{{ $data->total_price }}
                                </td>

                                @if($data->status == true)
                                <td> <button class="btn btn-success">Dispatch</button></td>
                                @else
                                <td> <button class="btn btn-danger">Pending</button></td>
                                    
                                @endif
                               




                            </tr>
                            
                        @endforeach
                        @endforeach

                </table>
            </div>
            <div class="card-body">
                <div class="card-header">

                    <h1>Shipping Details</h1>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            {{-- <th>Order.NO</th> --}}
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Status</th>
                          



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shipping as $key => $data)
                     
                            
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                {{-- <td>{{ $data->order_id }}</td> --}}
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->firstname }}</td>

                            
                         
                                <td>{{ $data->lastname }}
                                </td>
                                <td>{{ $data->city }}
                                </td>
                                <td>{{ $data->address }}
                                </td>
                                <td>{{ $data->phone }}
                                </td>


                                
                               
                                @if($data->status == true)
                                <td> <button class="btn btn-success">Dispatch</button></td>
                                @else
                                <td> <button class="btn btn-danger">Pending</button></td>
                                    
                                @endif




                            </tr>
                            
           
                        @endforeach

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
