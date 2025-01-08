@extends('layouts.setting')
@section('title', 'Confirm Phone Number')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

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
                      <a class="navbar-brand" href="#">Confirm Phone Number</a>
                    </div>
                  </nav>
                </div>
            </div>
            <div class="h-100">
                <div class="container" style="background-color: #fff;">
                    <div class="card">
                        <div class="card-header">
                            <h4>Mobile Number Verification via OTP</h4>
                        </div>
                        <div class="card-body">
                            <!-- Step 1: Enter Phone Number -->
                            <div id="step-1" class="mb-3">
                                <label for="phone" class="form-label">Enter your phone number</label>
                                <input type="text" id="phone" class="form-control" placeholder="e.g., 1234567890">
                                <button class="btn btn-primary mt-2" id="send-otp">Send OTP</button>
                            </div>

                            <!-- Step 2: Enter OTP -->
                            <div id="step-2" class="mb-3 d-none">
                                <label for="otp" class="form-label">Enter the OTP</label>
                                <input type="text" id="otp" class="form-control" placeholder="e.g., 123456">
                                <button class="btn btn-success mt-2" id="verify-otp">Verify OTP</button>
                            </div>

                            <!-- Status Message -->
                            <div id="status" class="mt-3"></div>
                        </div>
                    </div>
                    {{-- <div class="">
                      <form action="" method="" class="mt-auto me-auto ms-auto w-75">
                            <div class="form-group mt-5">
                              <input type="tel" name="" id=""  class="form-control form-control-lg border border-1 border-dark" value="{{ $user->phone }}" disabled>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('personal.info') }}" class="w-100">
                                    {{ __('change phone number') }}
                                </a>
                            </div>
                      </form>
                    </div> --}}
                </div>
            </div>

            <script>
                // CSRF Token for Laravel requests
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // DOM Elements
                const phoneInput = document.getElementById('phone');
                const otpInput = document.getElementById('otp');
                const sendOtpButton = document.getElementById('send-otp');
                const verifyOtpButton = document.getElementById('verify-otp');
                const step1 = document.getElementById('step-1');
                const step2 = document.getElementById('step-2');
                const statusDiv = document.getElementById('status');

                // Helper Function: Display Status Message
                const displayStatus = (message, type = 'success') => {
                    statusDiv.innerHTML = `<div class="alert alert-${type}" role="alert">${message}</div>`;
                };

                // Step 1: Send OTP
                sendOtpButton.addEventListener('click', async () => {
                    const phone = phoneInput.value.trim();
                    if (!/^\+?[1-9]\d{1,14}$/.test(phone)) {
                        displayStatus("Please enter a valid 10-digit phone number.", "danger");
                        return;
                    }

                    try {
                        const response = await axios.post('{{ route('send.otp') }}', { phone }, {
                            headers: { 'X-CSRF-TOKEN': csrfToken }
                        });
                        displayStatus(response.data.message, "success");
                        step1.classList.add('d-none');
                        step2.classList.remove('d-none');
                    } catch (error) {
                        displayStatus(error.response?.data?.message || "Failed to send OTP.", "danger");
                    }
                });

                // Step 2: Verify OTP
                verifyOtpButton.addEventListener('click', async () => {
                    const phone = phoneInput.value.trim();
                    const otp = otpInput.value.trim();

                    if (!/^\d{6}$/.test(otp)) {
                        displayStatus("Please enter a valid 6-digit OTP.", "danger");
                        return;
                    }

                    try {
                        const response = await axios.post('{{ route('verify.otp') }}', { phone, otp }, {
                            headers: { 'X-CSRF-TOKEN': csrfToken }
                        });
                        displayStatus(response.data.message, "success");
                        step2.classList.add('d-none');
                    } catch (error) {
                        displayStatus(error.response?.data?.message || "Failed to verify OTP.", "danger");
                    }
                });
            </script>

        </div>
      </div>
@endsection

