@extends('layouts.setting')
@section('title', 'Confirm Email')

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
                      <a class="navbar-brand" href="#">Confirm Email</a>
                    </div>
                  </nav>
                </div>
            </div>
            <div class="h-100">
                <div class="container" style="background-color: #fff;">
                    <div class="">
                      <form action="" method="" class="mt-auto me-auto ms-auto w-75">
                            <div class="form-group mt-5">
                              <input type="email" name="" id=""  class="form-control form-control-lg border border-1 border-dark" value="{{ $user->email }}" disabled>
                            </div>
                            {{-- <div class="float-right">
                                <a href="{{ route('personal.info') }}" class="w-100">
                                    {{ __('change phone number') }}
                                </a>
                            </div> --}}
                      </form>
                    </div>
                </div>
            </div>

        </div>
      </div>
@endsection
