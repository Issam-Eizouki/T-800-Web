@extends('layout.app')

@push('pagename')  @endpush

@push('content')
    @include('transfer.cart-banner')

    <main>
        <div class="container margin_60">
            <div class="row">
                <div class="col-lg-8">
                    <table class="table table-striped cart-list add_bottom_30">
                        <thead>
                            <tr>
                                <th>{{ __('text.cart.item') }}</th>
                                <th>{{ __('text.cart.total') }}</th>
                                <th class="text-end">{{ __('text.cart.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span>Luxury Car Transfer</span>
                                </td>
                                <td>
                                    <strong>€{{ $cart['total'] }}</strong>
                                </td>
                                <td class="options text-end">
                                    <a href="{{ route('transfers.cart.delete') }}"><i class=" icon-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End col-lg -->

                <aside class="col-lg-4">
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
                        <a class="btn_full" href="{{ route('transfers.booking.payment') }}">{{ __('text.check_out') }}</a>
                        <a class="btn_full_outline" href="{{ route('transfers') }}"><i class="icon-right"></i>{{ __('text.back') }}</a>
                    </div>

                    @include('layout.help-box')
                </aside>
                <!-- End aside -->
            </div>
            <!--End row -->
        </div>
        <!--End container -->
    </main>
    <!-- End main -->
@endpush
