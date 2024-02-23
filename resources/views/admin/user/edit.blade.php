@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Edit User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit User</h5>
                        <form action="{{ url('admin/user/edit/'.$getRecord->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> First Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" required value="{{ $getRecord->name }}">
                                    <span style="color:red;">{{ $errors->first('name') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> Last Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="last_name" class="form-control" required value="{{ $getRecord->last_name }}">
                                    <span style="color:red;">{{ $errors->first('last_name') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> Email<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" required value="{{ $getRecord->email }}">
                                    <span style="color:red;">{{ $errors->first('email') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> Mobile No.<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="mobile" class="form-control" required value="{{ $getRecord->mobile  }}">
                                    <span style="color:red;">{{ $errors->first('mobile') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> Profile Photo<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" name="profile" class="form-control" required >
                                    <span style="color:red;">{{ $errors->first('profile') }}</span>
                                    @if(!empty($getRecord->profile))
                                    @if(file_exists('upload/profile/'.$getRecord->profile))
                                    <img src="{{ asset('upload/profile/'.$getRecord->profile) }}" style="height:50px;width:50px;">

                                   @endif
                                   @endif
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> Address<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control" required value="{{ $getRecord->address  }}">
                                    <span style="color:red;">{{ $errors->first('address') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"> AMC Name<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="amc_id" class="form-control" id="SelectAmcBusinessCategory" readonly>
                                        <option value="">Select AMC Name </option>
                                        @foreach ($getAmc as $value)
                                        <option {{ ($value->id==$getRecord->amc_id) ? 'selected' : '' }} data-val="{{ $value->business_category }}" value="{{ $value->id }}">{{ $value->name }}</option>

                                        @endforeach
                                    </select>
                                    <span style="color:red;">{{ $errors->first('amc_id') }}</span>
                                </div>
                             </div>
                             <div class="row mb-3"  id="showDiv" style="@if ($getRecord->amc_business_category_name=='')
                             display:none;

                             @endif">
                                <label for="" class="col-sm-2 col-form-label"> AMC Business Category Name<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="amc_business_category_name" class="form-control" readonly value="{{ $getRecord->amc_business_category_name}}">
                                    <span style="color:red;">{{ $errors->first('amc_business_category_name') }}</span>
                                </div>
                             </div>



                             <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
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

@section('script')
<script type="text/javascript">
    $('#SelectAmcBusinessCategory').on('change', function () {
        var HideAndShow = $('option:selected', this).attr('data-val');
        if (HideAndShow == 0) {
            $('#showDiv').show().find(':input').attr('required', true);
        } else {
            $('#showDiv').hide().find(':input').attr('required', false);
        }
    });
</script>




@endsection
