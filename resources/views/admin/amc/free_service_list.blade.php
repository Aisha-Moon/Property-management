
@extends('admin.layouts.app')
@section('content')

    <div class="pagetitle">
      <h1>AMC Free Service List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">AMC</li>
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
                            <a href="{{ url('admin/amc/add_free_service/'.$getRecord->id) }}" class="btn btn-primary">Add Free Service</a>
                        </h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Limits</th>
                                    <th>Price</th>
                                 
                                </tr>
                            </thead>
                          <tbody>
                            @forelse ($get_free_service as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->limits }}</td>
                                <td>{{ $value->price }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100%" style="color:red; text-align:center;">Record Not Found</td>
                            </tr>
                            @endforelse
                          </tbody>


                        </table>
                        {{ $get_free_service->links() }}
                    </div>

                </div>
            </div>
        </div>
    </section>

    @endsection
