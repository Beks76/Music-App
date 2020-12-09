@extends('layouts.head')

@section('title', 'Payment')

@section('content')

    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card" style="background-color: #2c2c2c" >
                    <div class="card-header">{{ __('Payment') }}</div>

                    <div class="card-body" style="background-color: #2c2c2c">
                        <style>
                            .StripeElement {
                                background-color: white;
                                padding: 8px 12px;
                                border-radius: 4px;
                                border: 1px solid transparent;
                                box-shadow: 0 1px 3px 0 #e6ebf1;
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
                                background-color: #2c2c2c !important;
                            }


                        </style>
                        <form id="subscribe-form" action="{{ route('payments.store') }}" method="POST">
                            <div class="form-group">
                                <div class="row">
                                    @foreach($plans as $plan)
                                        <div class="col-md-4">
                                            <div class="subscription-option ">
                                                <label for="plan-silver">
                                                    <span class="plan-name">{{$plan->title}}</span>
                                                </label><br>
                                                <label for="plan-silver">
                                                    <span class="plan-price"><small>{{$plan->price}}</small></span>
                                                </label>
                                                <input class="form-check" type="radio" id="plan-silver" name="plan" value='{{$plan->id}}'>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <label for="card-holder-name">Card Holder Name</label>
                            <input type="name" class="form-control" id="card-holder-name" type="text"><br>

                            @csrf
                            <div class="form-row md-5">
                                <label for="card-element">Credit or debit card</label>
                                <div id="card-element" class="form-control md-3">
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <div class="stripe-errors"></div>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-group text-center mt-5">
                                <br>
                                <button  id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-lg btn-success btn-block">SUBMIT</button>
                            </div>
                        </form>
                        <script src="https://js.stripe.com/v3/"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#2c2c2c'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        var card = elements.create('card', {hidePostalCode: true,
            style: style});
        card.mount('#card-element');
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        cardButton.addEventListener('click', async (e) => {
            console.log("attempting");
            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: card,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );
            if (error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
            } else {
                paymentMethodHandler(setupIntent.payment_method);
            }
        });
        function paymentMethodHandler(payment_method) {
            var form = document.getElementById('subscribe-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', payment_method);
            form.appendChild(hiddenInput);
            form.submit();
        }
    </script>
@endsection
