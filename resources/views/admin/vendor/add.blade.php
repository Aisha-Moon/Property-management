@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Vendor</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active">Vendor</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ADD Vendor</h5>
                        <form action="{{ url('admin/vendor/add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> First Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                                    <span style="color:red;">{{ $errors->first('name') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> Last Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="last_name" class="form-control" required value="{{ old('last_name') }}">
                                    <span style="color:red;">{{ $errors->first('last_name') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> Email<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" required value="{{ old('email') }}">
                                    <span style="color:red;">{{ $errors->first('email') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> Mobile No.<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="mobile" class="form-control" required value="{{ old('mobile') }}">
                                    <span style="color:red;">{{ $errors->first('mobile') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> Profile Photo<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" name="profile" class="form-control" required value="{{ old('profile') }}">
                                    <span style="color:red;">{{ $errors->first('profile') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> Vendor Type<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select id="selectCompanyHideShow" name="vendor_type_id" class="form-control">
                                        <option value="">Select Vendor Type</option>
                                        @foreach ($getVendorType as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>

                                        @endforeach
                                    </select>
                                    <span style="color:red;">{{ $errors->first('vendor_type_id') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3" id="showDiv" style="display: none;" >
                                <label for="" class="col-sm-2 col-form-label">Company Name<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="company_name" class="form-control"  value="{{ old('company_name') }}">
                                    <span style="color:red;">{{ $errors->first('company_name') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3" id="showDivEmployee" style="display: none;">
                                <label for="" class="col-sm-2 col-form-label"> Employee ID<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="employee_id" class="form-control" required value="{{ old('employee_id') }}">
                                    <span style="color:red;">{{ $errors->first('employee_id') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> Category<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category </option>
                                        @foreach ($getCategoryType as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                                        @endforeach
                                    </select>
                                    <span style="color:red;">{{ $errors->first('category_id') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> Status<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="">Select Status </option>
                                        <option {{ old('status') == '0' ? 'selected' : '' }} value="0">Active</option>
                                        <option {{ old('status') == '1' ? 'selected' : '' }} value="1">Inactive</option>
                                    </select>
                                    <span style="color:red;">{{ $errors->first('status') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> Always Assign<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="always_assign" class="form-control">
                                        <option value="">Select Always Assign </option>
                                        <option {{ old('always_assign') == '0' ? 'selected' : '' }} value="0">NO</option>
                                        <option {{ old('always_assign') == '1' ? 'selected' : '' }} value="1">yes</option>
                                    </select>
                                    <span style="color:red;">{{ $errors->first('always_assign') }}</span>
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

@section('script')
 <script type="text/javascript">
$('#selectCompanyHideShow').on('change',function(){
    if(this.value==3){
        $('#showDiv').show().find(':input').attr('required',true);
        $('#showDivEmployee').hide().find(':input').attr('required',true);
    }else if(this.value==4){
        $('#showDivEmployee').show().find(':input').attr('required',true);
        $('#showDiv').show().hide(':input').attr('required',true);
    }else{
        $('#showDiv').show().hide(':input').attr('required',true);
        $('#showDivEmployee').hide().find(':input').attr('required',true);

    }

})

</script>



@endsection
