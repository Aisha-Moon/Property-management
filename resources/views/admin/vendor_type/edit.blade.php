@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Edit Vendor Type</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active">Vendor Type</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Service Type</h5>
                        <form action="{{ url('admin/vendor_type/edit/'.$getRecord->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                             <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label">Vendor Type Name <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control"  value="{{ $getRecord->name }}">
                                    <span style="color:red;">{{ $errors->first('name') }}</span>
                                </div>
                             </div>

                             <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
