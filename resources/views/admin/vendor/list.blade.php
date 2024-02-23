
@extends('admin.layouts.app')
@section('content')

    <div class="pagetitle">
      <h1>Vendor List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Vendor</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                {{-- search vendor starts --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Search Vendor
                        </h3>
                    </div>
                    <form action="" method="get">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="">ID</label>
                                    <input type="text" name="id" class="form-control" placeholder="ID" value="{{ Request::get('id') }}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">First Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="First NAme" value="{{ Request::get('name') }}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ Request::get('last_name') }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ Request::get('email') }}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Mobile</label>
                                    <input type="tel" name="mobile" class="form-control" placeholder="Mobile No" value="{{ Request::get('mobile') }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                    <a href="{{ url('admin/vendor/list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                   {{-- search vendor ends --}}
                @include('layouts._message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('admin/vendor/add') }}" class="btn btn-primary">Add Vendor</a>
                        </h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Profile</th>
                                    <th>Vendor Type Name</th>
                                    <th>Company Name</th>
                                    <th>Employee ID</th>
                                    <th>Category Name</th>
                                    <th>Always Assign</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getRecord as $value)


                                <tr>
                                   <td>{{ $value->id }}</td>
                                   <td>{{ $value->name }} {{ $value->last_name}}</td>
                                   <td>{{ $value->email }}</td>
                                   <td>{{ $value->mobile }}</td>
                                   <td>
                                    @if(!empty($value->profile))
                                     @if(file_exists('upload/profile/'.$value->profile))
                                     <img src="{{ asset('upload/profile/'.$value->profile) }}" style="height:50px;width:50px;">

                                    @endif
                                    @endif

                                   </td>
                                   <td>{{ !empty( $value->vendor_type_name) ?  $value->vendor_type_name : '' }}</td>
                                   <td>{{ !empty($value->company_name) ? $value->company_name : '' }}</td>
                                   <td>{{ $value->employee_id }}</td>
                                   <td>{{ $value->category_name }}</td>
                                   <td>
                                    @if($value->always_assign==1)
                                    Yes
                                    @else
                                    No
                                    @endif
                                   </td>
                                   <td>
                                    @if($value->status==0)
                                    Active
                                    @else
                                    Inactive
                                    @endif
                                   </td>
                                   <td>
                                    <a href="{{ url('admin/vendor/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                    <a onclick="return confirm('Are You Sure Want To Delete?')" href="{{ url('admin/vendor/delete/'.$value->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>

                                   </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%" style="text-align: center;color:red;">Record Not Found</td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
                        {{ $getRecord->links() }}

                    </div>

                </div>
            </div>
        </div>
    </section>

    @endsection
