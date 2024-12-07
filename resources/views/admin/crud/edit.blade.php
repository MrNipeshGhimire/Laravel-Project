@extends('admin.includes.app')
@section('main-content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">crud</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('crud.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name" value="{{$data->name}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Adress</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="address" placeholder="Address" value="{{$data->address}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea type="password" rows="5" name="description" class="form-control" id="exampleInputPassword1" placeholder="Enter desription">{{$data->description}}</textarea>
                      </div>
                  </div>
                  <!-- /.card-body -->
    
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
    
        
              <!-- /.card -->
    
            </div>
            <!--/.col (left) -->
            <!-- right column -->
       
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
</div>
{{-- <div class="form-group">
  <label for="title">Title</label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
      name="title" placeholder="title" value="{{ old('title') }}">
  @error('title')
      <div class="alert">{{ $message }}</div>
  @enderror
</div> --}}

@endsection