@extends('user.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Book Service</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active">Book Service</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ADD Book Service</h5>
                    <form action="{{ url('admin/book_service/add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Service Type <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="service_type_id" required id="SelectServiceTypeHideshow" class="form-control">
                                    <option value="">Select Service Type</option>
                                    @foreach ($getServiceType as $value)
                                    <option {{ old('service_type_id')==$value->id ? 'selected' : '' }}  value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                <span style="color:red;">{{ $errors->first('service_type_id') }}</span>
                            </div>
                         </div>
                         <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Category <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="category_id" required id="category" class="form-control">
                                    <option value="">Select Category </option>
                                    @foreach ($getCategory as $value)
                                    <option {{ old('category_id')==$value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->category_name }}</option>
                                    @endforeach
                                </select>
                                <span style="color:red;">{{ $errors->first('category_id') }}</span>
                            </div>
                         </div>
                         <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">SubCategory <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="sub_category_id" required id="subcategory" class="form-control">
                                </select>
                                <span style="color:red;">{{ $errors->first('sub_category_id') }}</span>
                            </div>
                         </div>
                         <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">AMC Free Service <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="amc_free_service_id" required class="form-control">
                                    <option value="">Select AMC Free Service</option>
                                    @foreach ($getAmcFreeService->option as $value)
                                        @php
                                            $recordCount = App\Models\BookService::where('amc_free_service_id', $value->id)
                                                                                    ->where('user_id', Auth::user()->id)
                                                                                    ->count();
                                            $limitRecord = $value->limits - $recordCount;
                                        @endphp
                                        <option {{ (old('amc_free_service_id') == $value->id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                <span style="color:red;">{{ $errors->first('amc_free_service_id') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Description <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" >

                                </textarea>
                                <span style="color:red;">{{ $errors->first('description') }}</span>
                            </div>
                         </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Sppecial Instruction<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea name="special_instruction" class="form-control" >

                                </textarea>
                                <span style="color:red;">{{ $errors->first('special_instruction') }}</span>
                            </div>
                         </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Do uou have a Pet<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="pet" class="form-control">
                                    <option value=""></option>
                                    <option {{ old('pet') =='0' ? 'selected' : '' }} value="0">Yes</option>
                                    <option {{ old('pet') =='1' ? 'selected' : '' }} value="1">No</option>
                                </select>

                                <span style="color:red;">{{ $errors->first('pet') }}</span>
                            </div>
                         </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Available Date<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control" name="available_date" >

                                <span style="color:red;">{{ $errors->first('available_date') }}</span>
                            </div>
                         </div>

                         {{-- image starts --}}
                         <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Attachment Add<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <table class="table">
                                    <tr>
                                        <th>Select Image</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="file" name="option[100]attachment_image" class="form-control">
                                        </td>
                                        <td>
                                            <a href="" class="item_remove btn btn-danger">Remove</a>
                                        </td>
                                    </tr>
                                    <tr id="item_below_row100">
                                        <td colspan="100%">
                                            <button type="button" id="100" class="btn btn-primary add_row">Add</button>

                                        </td>

                                    </tr>
                                </table>

                                <span style="color:red;">{{ $errors->first('available_date') }}</span>
                            </div>
                         </div>

                         {{-- image ends --}}


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
    $(document).ready(function(){
        $('#category').on('change', function(e){
            var cat_id = $(this).val();

            $.ajax({
                url: "{{ url('user/book_service/sub_category') }}",
                type: "post",
                data: {
                    cat_id: cat_id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(result){
                    $('#subcategory').html('<option value="">Select Subcategory</option>');
                    $.each(result.get_sub_category, function(key, value){
                        $("#subcategory").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });

    // add image
    var item_row = 101;
$("body").delegate(".add_row", "click", function(e){
    var id = $(this).attr("id");
    e.preventDefault();

    html = `<tr>
                <td><input class="form-control" required name="option[${item_row}]attachment_image" type="file"></td>
                <td><a href="" class="item_remove btn btn-danger">Remove</a></td>
            </tr>`;

    $("#item_below_row" + id).before(html);
    item_row++;

    $("body").delegate(".item_remove", "click", function(e){
    e.preventDefault();
    $(this).parent().parent().remove();
});

});

    //end image
</script>
@endsection
