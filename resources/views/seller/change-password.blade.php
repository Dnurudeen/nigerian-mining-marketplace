{{-- @extends('layouts.app') --}}
@section('title', 'Change Password')

<!-- partial -->
<style>
    /* .main-panel{
      padding-left: 20px;
    } */

</style>

@section('content')
      <div class="container main-panel">
        <div class="content-wrapper" style="background-color: #fff;">
            <div class="row">
                <div class="col-12">
                  <nav class="navbar navbar-expand-lg navbar-light mb-4 border border-2 border-dark" style="background-color: #fff;">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="#">Change Password</a>
                    </div>
                  </nav>
                </div>
            </div>
            <div class="h-100">
                <div class="container" style="background-color: #fff;">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <div class="text-center">
                      <form action="{{ route('update.password') }}" method="POST" class="mt-auto me-auto ms-auto w-50">
                        @csrf
                            <div class="form-group mt-5">
                              <input type="password" name="current_password" id="current_password" required placeholder="Enter your current Password" class="form-control @error('current_password') is-invalid @enderror form-control-lg border border-1 border-dark" autocomplete="current-password">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                              <input type="password" name="new_password" id="new_password" required placeholder="Enter new Password" class="form-control @error('new_password') is-invalid @enderror form-control-lg border border-1 border-dark" autocomplete="new-password">
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                              <input type="password" id="new_password_confirmation" name="new_password_confirmation" required placeholder="Confirm new Password" class="form-control form-control-lg border border-1 border-dark" autocomplete="new-password">
                                @error('new_password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="pt-4">
                              <button type="submit" class="btn btn-dark w-100" id="next">Change Password</button>
                            </div>
                      </form>
                      <div class="mt-3 mt-auto me-auto ms-auto w-50">
                        <button class="btn btn-light border border-2 border-dark w-100" id="next">Forgot Password</button>
                      </div>
                    </div>
                </div>
            </div>

        </div>
      </div>
@endsection
