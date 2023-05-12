@extends('mdd.admin_casher')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">


<div class="nk-content-body">
    <div class="content-page wide-sm m-auto">
     {{--    <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
            <div class="nk-block-head-content text-center">
                <h2 class="nk-block-title fw-normal">Casher <span class="lead">walk-in Client</span></h2> 
            </div>
        </div><!-- .nk-block-head --> --}}
  
        <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-inner">


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('success'))
    <script>
        swal("Success!", "{{ session('success') }}", "success");
    </script>
@endif


<form action="{{ route('cc-pay') }}" method="post">
    @csrf
<div class="row gy-4">

<span class="preview-title-lg overline-title" style="margin-bottom: -15px;">Cash Payment</span>        

    <div class="col-12">

        <div class="form-control-wrap">
            <div class="form-icon form-icon-right xl">
                <em class="icon ni ni-sign-php-alt"></em>
            </div>
            <input type="text" class="form-control form-control-xl form-control-outlined text-amount" name="amount" id="outlined-right-icon">
            <label class="form-label-outlined" for="outlined-right-icon">Amount</label>
        </div>
    </div>


<div class="invoice-head">
    <div class="invoice-contact">
        <div class="invoice-contact-info">
            <h4 class="title">{{ $client->lname}} {{ $client->mname}}, {{ $client->mname}}</h4>
            <ul class="list-plain">
                <li><em class="icon ni ni-map-pin-fill"></em><span>{{ $client->address }}</span></li>
                <li><em class="icon ni ni-mail-fill"></em><span>{{ $client->email }}</span></li>
                <li><em class="icon ni ni-call-fill"></em><span>{{ $client->phone_number }}</span></li>
            </ul>
        </div>
    </div>
    <div class="invoice-desc">
        <h4 class="title">Accnt#.123456</h4>
    </div>
</div><!-- .invoice-head -->
<div class="invoice-bills">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="w-40">Porject</th>
                    <th>Block</th>
                    <th>Lot</th>
                    <th>Lot Area</th>
                    <th>Price SQM</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $property->projectName }}</td>
                    <td>{{ $property->block }}</td>
                    <td>{{ $property->lot }}</td>
                    <td>{{ $property->lot_area }}</td>
                    <td>{{ $property->price }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">No. of Months to Pay</td>
                    <td>{{ $monthPay }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">Terms Interest</td>
                    <td>

                        @if($monthPay >= $property->months_term )
                            {{ $property->term }}%
                        @else
                            0%
                        @endif

                    </td>
                </tr>
                <tr style="font-weight:700">
                    <td colspan="2"></td>
                    <td colspan="2">Terms Amount</td>
                    <td>
                         @if($monthPay >= $property->months_term )
                            ₱{{ $termAmount = number_format(($property->lot_area * $property->price)  * $property->term, 2, '.', ',') }}
                        @else
                            0
                        @endif      
                    </td>
                </tr>

                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">Miscellaneous Interest</td>
                    <td>{{ $property->misc_interest }}%</td>
                </tr>

                <tr style="font-weight:700">
                    <td colspan="2"></td>
                    <td colspan="2">Miscellaneous Amount</td>
                    <td>₱

                        {{ $misc_amount = number_format(($property->lot_area * $property->price) * $property->misc_interest, 2, '.', ',') }}

                    </td>
                </tr>

                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">Miscellaneous Upon Turnover</td>
                    <td>{{ $property->misc_u_t_over }}%</td>
                </tr>

                 <tr style="font-weight:700">
                    <td colspan="2"></td>
                    <td colspan="2">Misc Upon Turnover Amount</td>
                    <td>₱{{ $misc_upon_amount = number_format(($property->lot_area * $property->price) * $property->misc_u_t_over, 2, '.', ',') }}</td>
                </tr>

                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">Discount for Full Paid</td>
                    <td>{{ $property->discount_f_paid }}%</td>
                </tr>

                <tr style="font-weight:700">
                    <td colspan="2"></td>
                    <td colspan="2">Discount Amount</td>
                    <td>₱{{ $discount_amount = number_format(($property->lot_area * $property->price) * $property->discount_f_paid, 2, '.', ',') }}</td>
                </tr>

                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">Expanded Hodin Tax</td>
                    <td>{{ $property->expanded_htax }}%</td>
                </tr>


                <tr style="font-weight:700">
                    <td colspan="2"></td>
                    <td colspan="2">Expanded Hodin Tax Amount</td>
                    <td>₱{{ $tax_amount = number_format(($property->lot_area * $property->price) * $property->expanded_htax, 2, '.', ',') }}</td>
                </tr>

                <tr style="font-weight:700">
                    <td colspan="2"></td>
                    <td colspan="2">Total Contract Price (TCP)</td>
                    <td>₱{{ $tcp =  number_format($property->lot_area * $property->price, 2, '.', ',') }}</td>
                </tr>

                <tr style="font-size: 18px;">
                    <td colspan="2"></td>
                    <td colspan="2">Net TCP with Interest & Misc.</td>
                    <td>

                @if($monthPay >= $property->months_term )
                    <?php

                        $tcp = (float) str_replace(',', '', $tcp);
                        $termAmount = (float) str_replace(',', '', $termAmount);
                        $vamisc_amountlue3 = (float) str_replace(',', '', $misc_amount);
                        $misc_upon_amount = (float) str_replace(',', '', $misc_upon_amount);
                        $discount_amount = (float) str_replace(',', '', $discount_amount);
                        $tax_amount = (float) str_replace(',', '', $tax_amount);

                        $sum = $tax_amount + $discount_amount + $misc_upon_amount + $vamisc_amountlue3 + $termAmount + $tcp;

                        echo '₱',$formattedSum = number_format($sum, 2, '.', ',');

                    ?>
                @else
                    {{ $tcp }}
                @endif  

                    </td>
                </tr>

            </tfoot>
        </table>
    </div>
</div><!-- .invoice-bills -->

</div>








<div class="row gy-4">
<div class="col-12" style="padding-top: 45px;">
    <div class="form-group">
        <input type="hidden" name="month" value="{{ $monthPay }}">
        <input type="hidden" name="client" value="{{ $client->id}}">
        <input type="hidden" name="property" value="{{ $property->id}}">
   
        <button type="submit" class="btn btn-lg btn-primary" onclick="submitForm()">Confirm Payment</button>
    </div>
</div>
</div>

</form>



                </div><!-- .card-inner -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div><!-- .content-page -->
</div>


        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
</script>


@endsection
