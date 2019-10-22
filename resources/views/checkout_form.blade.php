<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Checkout form</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
            Checkout form
        </div>

        <div class="form-wrapper">
            <?php
            echo 'Product name:<br/>';
            echo $item->name;
            ?>

            <form id="checkout_form" method="post" action="/checkout-success">
                @csrf
                <?php
                echo '<input type="hidden" name="price" value="' . $item->price . '">';
                ?>

                <label for="client_name">Name:</label><br/>
                <input id="client_name" name="client_name" type="text"><br/><br/>
                <label for="client_address">Address:</label><br/>
                <input id="client_address" name="client_address" type="text"><br/><br/>
                <label for="shipping_option">Shipping option:</label><br/>
                <select id="shipping_option" name="shipping_option" form="checkout_form">
                    <option value="0">Free standard</option>
                    <option value="10">Express (+10 EUR)</option>
                </select><br/><br/>
                <!-- Stripe Elements Placeholder -->
                <div id="card-element"></div>
                <br/><br/>
                <input type="submit" id="submit_button" value="Checkout"/>
            </form>
            <p id="errormessage" style="color: red; font-style: italic; text-align: center; display: none;">
                There's an error with your credit card details!
            </p>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('pk_test_rCYTXLNcbnVKIxCqj32sRMT900qTvCSH21');

    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('client_name');
    const cardButton = document.getElementById('submit_button');

    cardButton.addEventListener('click', async (e) => {
        e.preventDefault();
        const {paymentMethod, error} = await stripe.createPaymentMethod(
            'card', cardElement, {
                billing_details: {name: cardHolderName.value}
            }
        );

        if (error) {
            document.getElementById('errormessage').style.display = 'block';
            return false;
        } else {
            document.getElementById('checkout_form').submit();
            return true;
        }
    });
</script>
</body>
</html>
