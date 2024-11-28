@extends('layout.main')
@push('css')
<!-- summer.note-css -->
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>edit the product </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">edit new product</li>
            </ol>
          </div>
        </div>
      </div>    <!-- /.container-fluid -->
    </section>

        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
             <!-- add a new product elements -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">product create</h3>
              </div>
                  <!-- /.card-header -->
                  <!-- form start -->
              <form action="{{ route('updateproduct' ,$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")
                
                <div class="card-body">
                
                <div class="form-group">
                    <label for="title">title</label>
                    <input value="{{$product->title}}" name="title" type="text" class="form-control" id="title" placeholder="title">
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="description">description</label>
                    <textarea name="description " id="summernote"></textarea>
                    @error('description')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  
                  
                  
                  <div class="form-group">
                    <label for="price">price</label>
                    <input value="{{$product->price}}" name="price" type="number" class="form-control" id="price" placeholder="price">
                    @error('price')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="qty">qty</label>
                    <input value="{{$product->qty}}" step="0.1"name="qty" type="number" class="form-control" id="qty" placeholder="qty">
                  </div>
                  
                  <div class="form-group">
                    <label for="discount">discount</label>
                    <input value="{{$product->discount}}" step="0.1" name="discount" type="number" class="form-control" id="discount" placeholder="discount">
                  </div>
                  
                  <div class="from-group">
  <label for="category_id">category {{$product->category_id}}</label>
  <select class="form-control" name="category_id" id="">
    <option selected disabled>select category</option>
    @foreach ($categories as $category )
     <option @selected($product->category_id == $category->id) value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
  </select>
</div>

                  <img src={{$product->image}} width="50" alt="image-edit">
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
@endsection
<!-- summer-not-js-->
@push('js')
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()
  })
</script>
@endpush