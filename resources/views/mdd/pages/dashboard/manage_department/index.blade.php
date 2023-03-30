@extends('mdd.admin_master')
@include('mdd.pages.dashboard.manage_department.department_form_modal')

@section('mdd')
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">


<div class="nk-block-head nk-block-head-sm">
<div class="nk-block-between g-3">
    <div class="nk-block-head-content">
        <h3 class="nk-block-title page-title">Manage Department</h3>
        <div class="nk-block-des text-soft">
            <p>Here is the procedure of payment.</p>
        </div>
    </div><!-- .nk-block-head-content -->
    <div class="nk-block-head-content">
        <ul class="nk-block-tools g-3">
            <li>
                <div class="drodown">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-plus"></em></a>
                    <div class="dropdown-menu dropdown-menu-end" style="">
                        <ul class="link-list-opt no-bdr">
                            <li><a data-bs-toggle="modal" href="#depform"><span>Add Payment Method</span></a></li>
                            <li><a href="#"><span>Import Payment Method</span></a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-icon">
    <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ $message }}
    </div>
@endif 

</div>







<div class="nk-block">
<div class="card card-bordered card-stretch">
    <div class="card-inner-group">
        <div class="card-inner position-relative card-tools-toggle">
            <div class="card-title-group">
                <div class="card-title">
                    <h5 class="title">Department List</h5>
                </div>

<div class="card-tools me-n1">
    <ul class="btn-toolbar gx-1">
        <li>
            <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
        </li><!-- li -->
        <li class="btn-toolbar-sep"></li><!-- li -->
        <li>
            <div class="toggle-wrap">
                <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                <div class="toggle-content" data-content="cardTools">
                    <ul class="btn-toolbar gx-1">
                        <li class="toggle-close">
                            <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a>
                        </li><!-- li -->
                        <li>
                            <div class="dropdown">
                                <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                    <div class="dot dot-primary"></div>
                                    <em class="icon ni ni-filter-alt"></em>
                                </a>
                                <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                    <div class="dropdown-head">
                                        <span class="sub-title dropdown-title">Filter Users</span>
                                    </div>
                                    <div class="dropdown-body dropdown-body-rg">
                                        <div class="row gx-6 gy-3">
                                            <div class="col-6">
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="hasBalance">
                                                    <label class="custom-control-label" for="hasBalance"> Have Balance</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="hasKYC">
                                                    <label class="custom-control-label" for="hasKYC"> KYC Verified</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="overline-title overline-title-alt">Method</label>
                                                    <select class="form-select js-select2 js-select2-sm select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                        <option value="any" data-select2-id="3">Any Type</option>
                                                        <option value="paypek">Paypal</option>
                                                        <option value="visa">Visa</option>
                                                        <option value="master">Master Card</option>
                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-n8pb-container"><span class="select2-selection__rendered" id="select2-n8pb-container" role="textbox" aria-readonly="true" title="Any Type">Any Type</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="overline-title overline-title-alt">Status</label>
                                                    <select class="form-select js-select2 js-select2-sm select2-hidden-accessible" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                                        <option value="any" data-select2-id="6">Any Status</option>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-gbqg-container"><span class="select2-selection__rendered" id="select2-gbqg-container" role="textbox" aria-readonly="true" title="Any Status">Any Status</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-secondary">Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-foot between">
                                        <a class="clickable" href="#">Reset Filter</a>
                                        <a href="#">Save Filter</a>
                                    </div>
                                </div><!-- .filter-wg -->
                            </div><!-- .dropdown -->
                        </li><!-- li -->
                        <li>
                            <div class="dropdown">
                                <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                    <em class="icon ni ni-setting"></em>
                                </a>
                                <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                    <ul class="link-check">
                                        <li><span>Show</span></li>
                                        <li class="active"><a href="#">10</a></li>
                                        <li><a href="#">20</a></li>
                                        <li><a href="#">50</a></li>
                                    </ul>
                                    <ul class="link-check">
                                        <li><span>Order</span></li>
                                        <li class="active"><a href="#">DESC</a></li>
                                        <li><a href="#">ASC</a></li>
                                    </ul>
                                </div>
                            </div><!-- .dropdown -->
                        </li><!-- li -->
                    </ul><!-- .btn-toolbar -->
                </div><!-- .toggle-content -->
            </div><!-- .toggle-wrap -->
        </li><!-- li -->
    </ul><!-- .btn-toolbar -->
</div><!-- .card-tools -->
            </div><!-- .card-title-group -->
<div class="card-search search-wrap" data-search="search">
    <div class="card-body">
        <div class="search-content">
            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
            <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or email">
            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
        </div>
    </div>
</div><!-- .card-search -->
        </div><!-- .card-inner -->

<div class="card-inner p-0">
<table class="table table-tranx">
    <thead>
        <tr class="tb-tnx-head">
            <th class="tb-tnx-id"><strong>No.</strong></th>
            <th class="tb-tnx-id"><strong>Department</strong></th>
            <th class="tb-tnx-id"><strong>Department Description</strong></th>
            <th class="tb-tnx-id"><strong>Icon</strong></th>
            <th class="tb-tnx-id"><strong>Status</strong></th>
            <th class="tb-tnx-id"><strong>Action</strong></th>
        </tr>
    </thead>


    <tbody>
    @foreach($data as $details)
        <tr class="tb-tnx-item">
            <td class="tb-tnx-id">
                <a href="#"><span>1</span></a>
            </td>

            <td class="tb-tnx-id">
                <a href="#"><span>{{ $details->department }}</span></a>
            </td>

            <td class="tb-tnx-id">
                <a href="#"><span>{{ $details->description }}</span></a>
            </td>

            <td class="tb-tnx-id">
                <a href="#"><span>{{ $details->icon }}</span></a>
            </td>

            <td class="tb-tnx-id">
                <a href="#"><span>{{ $details->status }}</span></a>
            </td>
            
            <td class="tb-tnx-action">
                <div class="dropdown">
                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                        <ul class="link-list-plain">
                            <li><a data-bs-toggle="modal" href="#edit-pay-method">Edit</a></li>
                            <li><a href="#">Remove</a></li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

<!-- .card-inner -->
        <div class="card-inner">
            <ul class="pagination justify-content-center justify-content-md-start">
                <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
            </ul><!-- .pagination -->
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- .card -->
</div>















</div><!-- .card -->
</div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
@endsection