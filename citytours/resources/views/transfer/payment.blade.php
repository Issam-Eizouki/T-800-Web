@extends('layout.app')
@push('pagename') @endpush

@push('content')
    @include('transfer.cart-banner')

    <main>
        <div class="container margin_60">
            <div class="row">
                <div class="col-lg-8 add_bottom_15">
                    <div class="form_title">
                        <h3>
                            <strong>1</strong>{{ __('text.cart.step_info') }}
                        </h3>
                        <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                    </div>
                    <div class="step">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Your name</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" value="{{ Session::get('email') }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input type="text" class="form-control" id="phone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End step -->

                    <div class="form_title">
                        <h3>
                            <strong>2</strong>{{ __('text.cart.step_payment') }}
                        </h3>
                        <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                    </div>
                    <div class="step">
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box_style_1">
                        <h3 class="inner">- {{ __('text.cart.summary') }} -</h3>
                        <table class="table table_summary">
                            <tbody>
                                <tr>
                                    <td>Date</td>
                                    <td class="text-end">
                                        {{ $cart['date'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td class="text-end">
                                        {{ $cart['time'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Adults</td>
                                    <td class="text-end">
                                        {{ $cart['adults'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Children</td>
                                    <td class="text-end">
                                        {{ $cart['children'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pick up</td>
                                    <td class="text-end">
                                        {{ $cart['pickup_name'] }}
                                    </td>
                                </tr>
                                <tr class="total">
                                    <td>Total cost</td>
                                    <td class="text-end">
                                        €{{ $cart['total'] }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a class="btn_full_outline" href="{{ route('transfers.cart') }}"><i class="icon-right"></i>{{ __('text.back') }}</a>
                    </div>
                    @include('layout.help-box')
                </div>
            </div>
            <!--End row -->
        </div>
        <!--End container -->

        <!-- Save transaction info -->
        <form id="frmSubmitTransaction" method="post" action="{{ route('transfers.booking.payment.make') }}">
            @csrf
            <input type="hidden" id="trsPayment" name="payment" value="">
            <input type="hidden" id="trsOrder" name="order" value="">
            <input type="hidden" id="trsValue" name="value" value="">
            <input type="hidden" id="trsCurr" name="currency" value="">
        </form>
    </main>
    <!-- End main -->
@endpush

@push('js')
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('paypal.client_id') }}&locale=fr_FR&currency=EUR"></script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({ purchase_units: [{amount: {value: {{ $cart['total'] }} }}]});
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    $('#trsPayment').val(orderData.id);
                    $('#trsOrder').val(transaction.id);
                    $('#trsValue').val(transaction.amount.value);
                    $('#trsCurr').val(transaction.amount.currency_code);
                    $('#frmSubmitTransaction').submit();
                });
            }
        }).render('#paypal-button-container');
    </script>
@endpush
