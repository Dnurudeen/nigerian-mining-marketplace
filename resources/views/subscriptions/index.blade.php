@extends('layouts.seller')
@section('title', 'Seller Subscription')


@section('content')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #fff;">
        <div class="container">
            <h2>Subscribe to List Item</h2>
            <hr><br>
            <h6 class="mb-4">Choose a Subscription Plan</h6>
            @if(session()->has('success'))
                <p class="bg-success text-light p-3 w-100">
                    {{ session()->get('success') }}
                </p>
            @endif

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger w-100"><b>{{ $error }}</b></li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ route('subscribe.store') }}" method="POST" id="myform" name="myform">
                @csrf
                <div class="form-group">
                    <label for="plan_type">Plan Type</label>
                    <select name="plan_type" id="plan_type" class="form-control" onchange="priceValue()">
                        <option value="">Select Plan</option>
                        <option value="weekly">Weekly - ₦15,000</option>
                        <option value="monthly">Monthly - ₦50,000</option>
                        <option value="three_days">3 Days - ₦7,500</option>
                    </select>
                </div>
                <input type="email" id="email" value="{{ Auth::user()->email }}" style="display: none;">

                {{-- <div class="form-group" style="height: 5vh;">
                    <div class="my-auto px-3">
                        <h4>Amount: <span id="figure" class=""></span></h4>
                    </div>
                </div> --}}

                <input type="number" style="display: none;" id="price" value="">

                {{-- <script src="https://js.paystack.co/v1/inline.js"></script> --}}

                <button type="button" id="payment-form" onclick="payWithPaystack()" class="btn btn-danger">Subscribe Now</button>
            </form>

            <h3>Subscription History</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Plan type</th>
                        <th>Status</th>
                        <th>Subscribed date</th>
                        <th>Expire date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscriptions as $subscription)
                    <tr>
                        <td>{{ ucfirst(str_replace('_', ' ', $subscription->plan_type)) }}</td>
                        <td>{{ $subscription->status }}</td>
                        <td>{{ $subscription->updated_at->format('F d, Y') }}</td>
                        <td>{{ $subscription->expires_at->format('F d, Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<script src="https://js.paystack.co/v1/inline.js"></script>

        {{-- //key: 'pk_live_adffe66fdded92a15d5ce301dab5b726b7d69d6a', // Replace with your public key
        key: 'pk_test_3cab450e303c3c48a8799b0b2c684cb3440a0d85', // Replace with your public key
        // key: 'pk_test_f929791ee9d7cb83061fc2d5c68797dd6ccf143e', // Replace with your public key --}}
<script>
    // Map string values to numeric amounts in kobo
    const planAmounts = {
        weekly: 15000,
        monthly: 50000,
        three_days: 7500
    };

    function payWithPaystack() {
        const email = document.getElementById('email').value;
        const selectedPlan = document.getElementById('plan_type').value; // Get the selected plan (string)
        const amountPay = planAmounts[selectedPlan]; // Map the string to a numeric value

        let handler = PaystackPop.setup({
        key: 'pk_test_3cab450e303c3c48a8799b0b2c684cb3440a0d85',
        email: document.getElementById("email").value,
        amount: amountPay * 100,
        currency: 'NGN',
        ref: ''+Math.floor((Math.random() * 1000000000) + 1),

        callback: function(response){
            var routeUrl = "/seller/post-ad-success";
            window.location.href = routeUrl;
            document.myform.submit();
        },
        onClose: function(){
            alert('You are about to leave the payment popup');
            },
        });

        function payWithPaystack(event){
            event.preventDefault();
        }

        handler.openIframe();
    }

    $(document).ready(function() {
        $('input[name="amount"]').change(function() {
            var selectedAmount = $('input[name="amount"]:checked').val();
            $('#amount').val(selectedAmount);
        });
    });
</script>

<script>
    function priceValue(){
        let plan = document.getElementById('plan_type').value;
        let amount = document.getElementById('price').value;

        if (plan == 'weekly'){
            amount = 15000;
            document.getElementById('figure').innerHTML = amount;
        }else if (plan == 'monthly'){
            amount = 50000;
            document.getElementById('figure').innerHTML = amount;
        }else if (plan == 'three_days'){
            amount = 7500;
            document.getElementById('figure').innerHTML = amount;
        }else{
            document.getElementById('figure').innerHTML = 'No selection yet';
        }
    }
</script>
