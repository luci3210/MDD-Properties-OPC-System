<form action="{{ route('front-processPayment') }}" method="POST">
    @csrf
    <input type="text" name="card_number" placeholder="Card Number">
    <input type="text" name="exp_month" placeholder="Expiration Month">
    <input type="text" name="exp_year" placeholder="Expiration Year">
    <input type="text" name="cvc" placeholder="CVC">
    <input type="text" name="amount" placeholder="Amount">
    <button type="submit">Pay Now</button>
</form>