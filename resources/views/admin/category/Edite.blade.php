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
      </div><!-- /.container-fluid -->
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
              <form action="{{ route('category.update '  ,$category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")
                
                <div class="card-body">

                <div class="form-group">
                    <label for="title">name</label>
                    <input value="{{$category->name}}" name="name" type="text" class="form-control" id="title" placeholder="name">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
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