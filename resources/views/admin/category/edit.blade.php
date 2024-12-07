@extends('admin.includes.app')

<style>
    .alert {
        color: red;
    }

    .thumb-image {
        float: left;
        width: 100px;
        position: relative;
        padding: 5px;
        height: 100px;
    }
</style>
@section('main-content')
    <div class="content-wrapper">
        <div class="card card-primary">
            <div class="card-title ml-4 mt-4">
                <h3 class="card-title">Category Edit Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Cateogry Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Enter Cateogry Name" value="{{ $category->name }}">
                        @error('name')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Cateogry Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                            id="slug" placeholder="Enter Cateogry Slug" value="{{ $category->slug }}">
                        @error('slug')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection