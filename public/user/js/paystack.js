// const paymentForm = document.getElementById('paymentForm');
// paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {

  let handler = PaystackPop.setup({
    //key: 'pk_live_adffe66fdded92a15d5ce301dab5b726b7d69d6a', // Replace with your public key
    key: 'pk_test_3cab450e303c3c48a8799b0b2c684cb3440a0d85', // Replace with your public key

    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    currency: 'NGN',
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"

    callback: function(response){
      var routeUrl = "/post-ad-success";
      window.location.href = routeUrl;
    },
    onClose: function(){
        alert('You are about to leave the payment popup');
      },
  });

  e.preventDefault();


  document.myform.submit();
  handler.openIframe();
}
