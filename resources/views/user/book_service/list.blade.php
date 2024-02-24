@extends('user.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Book Service</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active">Book Service List</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('layouts._message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ url('user/book_service/add') }}" class="btn btn-primary">Add New Book Service </a>
                    </h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vendor Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                    {{-- {{ $getRecord->links() }} --}}

                </div>

            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">

</script>
@endsection
