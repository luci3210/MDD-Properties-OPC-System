@extends('mdd.admin_master')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">


<div class="nk-block-head nk-block-head-sm">
<div class="nk-block-between g-3">
    <div class="nk-block-head-content">
        <h3 class="nk-block-title page-title">Property Costing</h3>
    </div>


<div class="nk-block-head-content">
    <a href="{{ route('ms-property-calculation-index') }}"  type="button" class="btn btn-primary">New</a>
</div>

</div>

@if ($message = Session::get('success'))
<div class="alert alert-fill alert-success alert-icon">
    <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ $message }}
</div>
@endif 

@if ($errors->any())
    <div class="alert alert-fill alert-danger alert-icon">
    <em class="icon ni ni-check-circle"></em> <strong>Whoops!</strong>  There were some problems with your input.
</div>
@endif
</div>

<div class="nk-block">
    <div class="card card-table-bordered card-stretch">
        <div class="container-fluid">
            <div style="margin-top:15px; margin-left: 5px; margin-right: 5px; margin-bottom:15px ;">


<table class="table table-hover">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Costing ID</th>
      <th scope="col">Terms Interest</th>
      <th scope="col">Misc. Interest</th>
      <th scope="col">Misc. Upon Turnover</th>
      <th scope="col">Discount for F.P</th>
      <th scope="col">Brooker Comm.</th>
      <th scope="col">Comm. Month</th>
      <th scope="col">E.H.Tax </th>
      <th scope="col">Remarks</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($costing as $listing)
    <tr style="font-size:13px;">
      <th scope="row">{{ $loop->index + 1 }}</th>
      <td>{{ $listing->consting_title }}</td>
      <td>{{ $listing->term_interest }}%</td>
      <td>{{ $listing->miscellaneous_interest }}%</td>
      <td>{{ $listing->miscellaneou_u_t_over }}%</td>
      <td>{{ $listing->discount_f_paid }}%</td>
      <td>{{ $listing->agent_commission }}%</td>
      <td>{{ $listing->no_month_commission }}</td>
      <td>{{ $listing->expanded_htax }}%</td>
      <td>{{ $listing->remarks }}</td>
      <td style="width:150px;text-align: center;">
        <a href="" class="btn btn-sm btn-dim btn-dark">Update</a></td>
    </tr>
    @endforeach
  </tbody>

</table>




            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</div>
          

@endsection