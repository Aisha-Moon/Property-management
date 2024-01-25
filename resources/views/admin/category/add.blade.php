@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>CATEGORY</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active">AMC</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ADD Category</h5>
                        <form action="{{ url('admin/category/add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Category Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="category_name" class="form-control" required value="{{ old('category_name') }}">
                                    <span style="color:red;">{{ $errors->first('category_name') }}</span>
                                </div>
                             </div>
                            
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
