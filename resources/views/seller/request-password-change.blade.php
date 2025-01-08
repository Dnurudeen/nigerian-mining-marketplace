@extends('layouts.setting')
@section('title', 'Change Password')

<!-- partial -->
<style>
    .main-panel{
      padding-left: 20px;
    }
</style>

@section('content')
      <div class="main-panel">
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
                        <br><br>
                    <div class="text-center mt-5">
                      <form action="{{ route('request.update.password') }}" method="POST" class="mt-auto me-auto ms-auto w-75">
                        @csrf

                            <div class="pt-4">
                              <button type="submit" class="btn btn-dark w-100" id="next">Request Password Change</button>
                            </div>
                      </form>
                      <div class="mt-3 mt-auto me-auto ms-auto w-75">
                        <button class="btn btn-light border border-2 border-dark w-100" id="next">Forgot Password</button>
                      </div>
                    </div>
                </div>
            </div>

        </div>
      </div>
@endsection
