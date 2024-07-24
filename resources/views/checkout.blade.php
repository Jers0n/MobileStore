@extends('layouts.template')
@section('content')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Checkout</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section Start -->
<section class="section-b-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <form class="needs-validation" method="POST" action="place-order">
                    <input type="hidden" name="_token" value="CVH6XgdFhoUV6OBdiTIlT2bviIidpb0qD6U1Vf68">
                    <div id="billingAddress" class="row g-4">
                        <h3 class="mb-3 theme-color">Billing address</h3>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Full Name">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter Phone Number">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter Email Address">
                        </div>

                        <div class="col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address"></textarea>

                        </div>

                        <div class="col-md-3">
                            <label for="suburb" class="form-label">Suburb</label>
                            <input type="text" class="form-control" id="suburb" name="suburb" placeholder="Suburb">
                        </div>
                        <div class="col-md-3">
                            <label for="state" class="form-label">State</label>
                            <select class="form-select custome-form-select" id="state" name="state">
                                <option selected="" disabled="" value="">Choose...</option>
                                <option value="Queensland">Queensland</option>
                                <option value="Tasmania">Tasmania</option>
                                <option value="New South Wales">New South Wales</option>
                                <option value="Victoria">Victoria</option>
                                <option value="Western Australia">Western Australia</option>
                                <option value="South Australia">South Australia</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select custome-form-select" id="country" name="country">
                                <option>Australia</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="zip" class="form-label">Postcode</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="1234">
                        </div>

                        <div class="col-md-12 form-check ps-0 mt-3 custome-form-check"
                            style="padding-left:15px !important;">
                            <input class="checkbox_animated check-it" type="checkbox" name="sameAsBilling"
                                id="sameAsBilling">
                            <label class="form-check-label checkout-label" for="sameAsBilling">Shipping address is
                                same as Billing Address</label>
                        </div>
                    </div>

                    <div id="shippingAddress" class="row g-4 mt-5">
                        <h3 class="mb-3 theme-color">Shipping address</h3>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="s_name" name="s_name"
                                placeholder="Enter Full Name">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="s_phone" name="s_phone"
                                placeholder="Enter Phone Number">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="s_email" name="s_email"
                                placeholder="Email">
                        </div>

                        <div class="col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="s_address" name="s_address"></textarea>

                        </div>

                        <div class="col-md-3">
                            <label for="suburb" class="form-label">Suburb</label>
                            <input type="text" class="form-control" id="s_suburb" name="s_suburb" placeholder="Suburb">
                        </div>
                        <div class="col-md-3">
                            <label for="state" class="form-label">State</label>
                            <select class="form-select custome-form-select" id="s_state" name="s_state">
                                <option selected="" disabled="" value="">Choose...</option>
                                <option value="Queensland">Queensland</option>
                                <option value="Tasmania">Tasmania</option>
                                <option value="New South Wales">New South Wales</option>
                                <option value="Victoria">Victoria</option>
                                <option value="Western Australia">Western Australia</option>
                                <option value="South Australia">South Australia</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select custome-form-select" id="s_country" name="s_country">
                                <option>Australia</option>
                            </select>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="zip" class="form-label">Postcode</label>
                            <input type="text" class="form-control" id="s_zip" name="s_zip" placeholder="1234">
                        </div>
                    </div>

                    <div class="form-check ps-0 mt-3 custome-form-check">
                        <input class="checkbox_animated check-it" type="checkbox" name="saveAddress"
                            id="saveAddress">
                        <label class="form-check-label checkout-label" for="saveAddress">Save this information for
                            next time</label>
                    </div>

                    <hr class="my-lg-5 my-4">

                    <h3 class="mb-3">Payment</h3>

                    <div class="d-block my-3">
                        <div class="form-check custome-radio-box">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" checked="" id="debit">
                            <label class="form-check-label" for="debit">Debit card</label>
                        </div>

                        <div class="form-check custome-radio-box">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="paypal">
                            <label class="form-check-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                    <div class="row g-4" style="display: none;">
                        <div class="col-md-6">
                            <label for="cc-name" class="form-label">Name on card</label>
                            <input type="text" class="form-control" id="cc-name">
                            <div id="emailHelp" class="form-text">Full name as displayed on card</div>
                        </div>
                        <div class="col-md-6">
                            <label for="cc-number" class="form-label">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number">
                            <div class="invalid-feedback">Credit card number is required</div>
                        </div>
                        <div class="col-md-3">
                            <label for="expiration" class="form-label">Expiration</label>
                            <input type="text" class="form-control" id="expiration">
                        </div>
                        <div class="col-md-3">
                            <label for="cc-cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv">
                        </div>
                    </div>
                    <button class="btn btn-solid-default mt-4" type="submit">Place Order</button>
                </form>
            </div>

            <div class="col-lg-4">
                <div class="your-cart-box">
                    <div class="container">
                        <h3 class="mb-3 d-flex text-capitalize">Your cart<span class="badge bg-theme new-badge rounded-pill ms-auto bg-dark">{{ count($cartItems) }}</span></h3>
                        <ul class="list-group mb-3">
                            @foreach ($cartItems as $item)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div class="text-dark">
                                        <h6 class="my-0">
                                            <a href="{{ route('shop.product.details',['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a>
                                        </h6>
                                        <small>Quantity: {{ $item->qty }}</small>
                                    </div>
                                    <span>${{ $item->price }}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between lh-condensed active">
                                <div class="text-dark">
                                    <h6 class="my-0">Tax</h6>
                                    <small></small>
                                </div>
                                <span>${{ $taxAmount }}</span>
                            </li>
                            <li class="list-group-item d-flex lh-condensed justify-content-between">
                                <span class="fw-bold">Total (AUD)</span>
                                <strong>${{ $totalPrice }}</strong> <!-- Display total price here -->
                            </li>
                        </ul>
                    </div>
                    

                    <form class="card border-0">
                        <div class="input-group custome-imput-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-solid-default rounded-0">Redeem</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section End -->
@endsection