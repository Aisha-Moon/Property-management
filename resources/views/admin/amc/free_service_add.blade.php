@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Add Free Service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active">Free Service</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Free Service</h5>
                        <form action="{{ url('admin/amc/add_free_service/'.$getRecord->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="amc_id" value="{{ $getRecord->id }}">
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Limits<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="limits" class="form-control">

                                        @for ($i=1; $i<=50; $i++)
                                         <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor

                                    </select>
                                </div>
                             </div>

                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Price <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="price" class="form-control" required value="{{ old('price') }}"
                                    oninput="javascript: this.value=this.value.replace(/[^0-9]/g, '');
                                    if(this.value.length > this.maxlength) this.value=this.value.slice(0,this.maxLength); " maxlength="10">
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
