@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>SUBCATEGORY</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active">SubCategory</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
            
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ADD SubCategory</h5>
                        <form action="{{ url('admin/sub_category/add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                             <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label">SubCategory Name <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                                    <span style="color:red;">{{ $errors->first('name') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label">Category Name <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="category_id" id="" class="form-control">
                                        <option value="">Select a Category</option>
                                        @foreach ($getCategory as $value)
                                        <option value="{{ $value->id }}">{{ $value->category_name }}</option>

                                        @endforeach
                                    </select>

                                </div>
                             </div>

                             <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
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
