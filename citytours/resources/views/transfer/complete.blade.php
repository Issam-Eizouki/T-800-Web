@extends('layout.app')

@push('pagename')  @endpush

@push('content')
    @include('transfer.cart-banner')

    <main>
        <div class="container margin_60">
            <div class="row">
                <div class="col-lg-8 add_bottom_15">

                    <div class="form_title">
                        <h3><strong><i class="icon-ok"></i></strong>Thank you! </h3>
                        <p>
                            Mussum ipsum cacilds, vidis litro abertis.
                        </p>
                    </div>
                    <div class="step">
                        <p>
                            Lorem ipsum dolor sit amet, nostrud nominati vis ex, essent conceptam eam ad. Cu etiam comprehensam nec. Cibo delicata mei an, eum porro legere no. Te usu decore omnium, quem brute vis at, ius esse officiis legendos cu. Dicunt voluptatum at cum. Vel et facete equidem deterruisset, mei graeco cetero labores et. Accusamus inciderint eu mea.
                        </p>
                    </div>
                    <!--End step -->

                    <div class="form_title">
                        <h3><strong><i class="icon-tag-1"></i></strong>Booking summary</h3>
                        <p>
                            Mussum ipsum cacilds, vidis litro abertis.
                        </p>
                    </div>
                    <div class="step">
                        @foreach ($transactions as $key=>$trans)
                        <table class="table table-striped confirm">
                            <thead>
                                <tr style="padding-top: 20px">
                                    <th colspan="2">Booking {{ $key+1 }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>{{ $trans->pickup->name }}</strong>
                                    </td>
                                    <td>{{ $trans->adults.' adult(s)' }} {{ $trans->children.' children' }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Date</strong>
                                    </td>
                                    <td>{{ $trans->datetime }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Total</strong>
                                    </td>
                                    <td>{{ $trans->cost }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Payment type</strong>
                                    </td>
                                    <td>Paypal</td>
                                </tr>
                            </tbody>
                        </table>
                        @endforeach
                    </div>
                    <!--End step -->
                </div>
                <!--End col -->

                <aside class="col-lg-4">
                    @include('layout.help-box')
                </aside>

            </div>
            <!--End row -->
        </div>
        <!--End container -->
    </main>
    <!-- End main -->

@endpush
