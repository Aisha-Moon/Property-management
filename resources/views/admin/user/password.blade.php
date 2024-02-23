
@extends('layouts.app')
@section('content')
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Update Your Password</h5>
                    <p class="text-center small">Enter your password and confirm it</p>
                    @include('layouts._message')
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="POST" action="">
                    @csrf

                   
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <span style="color:red;">{{ $errors->first('password') }}</span>

                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <label for="confirm_password" class="form-label">Confirm Password</label>
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
                      <span style="color:red;">{{ $errors->first('confirm_password') }}</span>

                      <div class="invalid-feedback">Please enter password again to confirm!</div>
                    </div>

                   
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Reset</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="{{ url('register') }}">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

@endsection
