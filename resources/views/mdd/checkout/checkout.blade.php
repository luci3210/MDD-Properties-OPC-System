@extends('mdd/checkout/layout/checkout')

@section('media')
        <link 
            rel="stylesheet" 
            type="text/css" 
            href="{{ url('mdd/checkout/store.css') }}" 
        />
@endsection

@section('content')
        <main class="store">
            <!-- Header -->
            <div class="header">
                <div class="wrapper header__wrapper">
                    <div class="header__site">
                        <a class="header__link-site" href="/">Xendit Demo</a>
                    </div>
                    <div class="header__navigation">
                        <input
                            class="header__checkbox"
                            type="checkbox"
                            id="header__button-menu"
                        />
                        <label
                            for="header__button-menu"
                            class="header__button-menu"
                            ><span class="nav-icon"></span
                        ></label>
                        <ul class="header__links">
                            <li>
                                <a
                                    class="header__link-github"
                                    href="https://github.com/xendit/checkout-demo-laravel"
                                    target="_blank"
                                    >View Sample Code</a
                                >
                            </li>
                            <li>
                                <a
                                    class="header__link-docs"
                                    href="https://docs.xendit.co/xeninvoice/"
                                    target="_blank"
                                    >View Xendit Docs</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="checkout">
                <div class="wrapper checkout__wrapper">
                    <!-- Configuration -->
                    <div class="configure">
                        <div class="panel-configure">
                            <h2 class="panel-configure__title">
                                Welcome to<br />Xendit Demo Store
                            </h2>
                            <div class="panel-configure__message">
                                Xendit is the leading payment gateway for
                                Indonesia, Philipines and Southeast Asia.
                            </div>
                            <div class="panel-configure__tip">
                                Select country and integration to view how we
                                can help your business.
                            </div>
                        </div>
                        <form
                            id="form-configure"
                            class="form-configure"
                            autocomplete="off"
                        >
                     
                            <label class="form-configure__label"
                                >Invoice Integration</label
                            >
                            <select
                                id="select-integration"
                                class="form-configure__select"
                            >
                                <option>Dialog Pop-up</option>
                                <option>Redirect Checkout</option>
                            </select>
                            <label class="form-configure__label"
                                >Country of Operation</label
                            >
                            <select
                                id="select-country"
                                class="form-configure__select"
                            >
                                <option>Indonesia</option>
                                <option>Philippines</option>
                            </select>
                            <button
                                id="button-start-demo"
                                class="button form-configure__button-demo"
                                type="submit"
                            >
                                <span>Start Demo</span>
                            </button>
                            <div class="form-configure__note">
                                Payments are simulated, no real money will move!
                            </div>
                        </form>
                    </div>
                    <!-- Cart -->
                    <div class="cart">
                        <input
                            class="cart-summary__checkbox--mobile"
                            type="checkbox"
                            id="cart-summary--mobile"
                        />
                        <label
                            for="cart-summary--mobile"
                            class="cart-summary--mobile"
                        >
                            <div class="cart-summary__title-toggle">
                                <span>Show Orders</span>
                            </div>
                            <div class="cart-summary__icon-toggle"></div>
                            <div class="cart-summary__total"></div>
                        </label>
                        <div class="cart-summary">
                            <h2 class="cart-summary__title">Order Summary</h2>
                            <div id="order-items" class="order-items"></div>
                            <div id="subtotal" class="cart-subtotal"></div>
                            <div id="total" class="cart-total"></div>
                        </div>
                    </div>
                    @include('mdd/checkout/modal')
                </div>
            </div>
        </main>
@endsection()

@section('scripts')
        <!-- Javascripts -->
        <script src="{{ url('mdd/checkout/checkout.js') }}"></script>
        <script src="{{ url('mdd/checkout/dataChart.js') }}"></script>
@endsection
