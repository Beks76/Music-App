@extends('layouts.head')

@section('title', 'Payment')

@section('content')

    <div class="container mt-xl-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><p class="text-muted">{{ __('Checkout page') }}</p></div>

                    <div class="card-body">
                        <form id="payment-form" action="{{ route('payments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan" id="plan" value="{{ request('plan') }}">
                            <div class="form-group">
                                <label for=""><p class="text-muted">Name</p></label>
                                <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="Name on the card">
                            </div>
                            <div class="form-group mb-3">
                                <label for=""><p class="text-muted">Card details</p></label>
                                <div id="card-element"></div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary w-100" id="card-button" data-secret="{{ $intent->client_secret }}">Pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-xl-5"></div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ config('cashier.key') }}')

        const elements = stripe.elements()
        const cardElement = elements.create('card')

        cardElement.mount('#card-element')

        const form = document.getElementById('payment-form')
        const cardBtn = document.getElementById('card-button')
        const cardHolderName = document.getElementById('card-holder-name')

        form.addEventListener('submit', async (e) => {
            e.preventDefault()

            cardBtn.disabled = true
            const { setupIntent, error } = await stripe.confirmCardSetup(
                cardBtn.dataset.secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            )

            if(error) {
                cardBtn.disable = false
            } else {
                let token = document.createElement('input')

                token.setAttribute('type', 'hidden')
                token.setAttribute('name', 'token')
                token.setAttribute('value', setupIntent.payment_method)

                form.appendChild(token)

                form.submit();
            }
        })
    </script>
@endsection
