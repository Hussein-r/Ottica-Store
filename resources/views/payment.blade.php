@extends('layouts.userNavbar')
@section('content')
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ottica</title>

        <script src="https://js.stripe.com/v3/"></script>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style>
            .spacer {
                margin-bottom: 24px;
            }
            /**
             * The CSS shown here will not be introduced in the Quickstart guide, but shows
             * how you can use CSS to style your Element's container.
             */
            .StripeElement {
              background-color: white;
              padding: 10px 12px;
              border-radius: 4px;
              border: 1px solid #ccd0d2;
              box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
              -webkit-transition: box-shadow 150ms ease;
              transition: box-shadow 150ms ease;
            }
            .StripeElement--focus {
              box-shadow: 0 1px 3px 0 #cfd7df;
            }
            .StripeElement--invalid {
              border-color: #fa755a;
            }
            .StripeElement--webkit-autofill {
              background-color: #fefde5 !important;
            }
            #card-errors {
                color: #fa755a;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
            <div class='mt-5'>
            <h4>Payment Now</h4>
            <img src='/images/unnamed.png'>
            
                <div class="spacer"></div>
               
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               
                <form action="{{ url('/PaymentCheckout',$orderId) }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                   
                    <div class="form-group">
                        <label for="name_on_card">Name on Card</label>
                        <input type="text" class="form-control" id="name_on_card" name="name_on_card">
                    </div>

                   
                    <div class="form-group">
                        <label for="card-element">Credit Card</label>
                        <div id="card-element">

                          <!-- a Stripe Element will be inserted here. -->
                        </div>

                      <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div>
                        
                    </div>
                    

                    <div class="spacer"></div>

                    <button type="submit" class="btn btn-success">Submit Payment</button>
                </form>
               
                </div>
            </div>
        </div>
        <script>
           window.addEventListener('load', function() {
                // Create a Stripe client
                
            const stripe = Stripe('{{env('STRIPE_KEY')}}');
                var elements = stripe.elements();
                var card = elements.create('card');
                // Add an instance of the card Element into the `card-element` <div>
                card.mount('#card-element');
                // Handle real-time validation errors from the card Element.
                card.addEventListener('change', function(event) {
                  var displayError = document.getElementById('card-errors');
                  if (event.error) {
                    displayError.textContent = event.error.message;
                  } else {
                    displayError.textContent = '';
                  }
                });
                // Handle form submission
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event) {
                  event.preventDefault();
                  var options = {
                    name: document.getElementById('name_on_card').value,
                  }
                  stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                      // Inform the user if there was an error
                      var errorElement = document.getElementById('card-errors');
                      errorElement.textContent = result.error.message;
                    } else {
                      // Send the token to your server
                      stripeTokenHandler(result.token);
                    }
                  });
                });
                function stripeTokenHandler(token) {
                  // Insert the token ID into the form so it gets submitted to the server
                  var form = document.getElementById('payment-form');
                  var hiddenInput = document.createElement('input');
                  hiddenInput.setAttribute('type', 'hidden');
                  hiddenInput.setAttribute('name', 'stripeToken');
                  hiddenInput.setAttribute('value', token.id);
                  form.appendChild(hiddenInput);
                  // Submit the form
                  form.submit();
                }
        })
        </script>
  
    </body>
    
</html>
@endsection