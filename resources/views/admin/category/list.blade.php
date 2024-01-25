
@extends('admin.layouts.app')
@section('content')

    <div class="pagetitle">
      <h1>Category List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Category</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('layouts._message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('admin/category/add') }}" class="btn btn-primary">Add Category</a>
                        </h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getRecord as $value)


                                <tr>
                                   <td>{{ $value->id }}</td>
                                   <td>{{ $value->category_name }}</td>
                                   <td>
                                    <a href="{{ url('admin/category/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                    <a onclick="return confirm('Are You Sure Want To Delete?')" href="{{ url('admin/category/delete/'.$value->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>

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
