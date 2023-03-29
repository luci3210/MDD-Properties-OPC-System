@extends('mdd.admin_master')
@section('mdd')
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">

                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Manage Department</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have total 0 Department.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            
                                        </div><!-- .nk-block-head-content -->
                                    </div>
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-icon">
    <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ $message }}
    </div>
@endif 
                                </div><!-- .nk-block-head -->
<div class="nk-block">
<div class="card card-bordered card-stretch">
<div class="card-inner-group">
<div class="card-inner position-relative card-tools-toggle">
<div class="card-title-group">
<div class="card-tools">

</div><!-- .card-tools -->
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
</div><!-- .card-tools -->
</div><!-- .card-title-group -->
<div class="card-search search-wrap" data-search="search">
<div class="card-body">
<div class="search-content">
    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
    <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by name">
    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
</div>
</div>
</div><!-- .card-search -->
</div><!-- .card-inner -->
<div class="card-inner p-0">
<div class="nk-tb-list nk-tb-ulist">
<div class="nk-tb-item nk-tb-head">
<div class="nk-tb-col nk-tb-col-check">
    <div class="custom-control custom-control-sm custom-checkbox notext">
        <input type="checkbox" class="custom-control-input" id="cid">
        <label class="custom-control-label" for="cid"></label>
    </div>
</div>

<div class="nk-tb-col"><span class="sub-text">No</span></div>
<div class="nk-tb-col tb-col-sm"><span class="sub-text"><strong>Department</strong></span></div>
<div class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></div>
<div class="nk-tb-col text-end"><span class="sub-text">Actions</span></div>
</div><!-- .nk-tb-item -->
<!-- .nk-tb-item -->


@foreach($data as $details)

<div class="nk-tb-item">
<div class="nk-tb-col nk-tb-col-check">
    <div class="custom-control custom-control-sm custom-checkbox notext">
        <input type="checkbox" class="custom-control-input" id="cid1">
        <label class="custom-control-label" for="cid1"></label>
    </div>
</div>
<div class="nk-tb-col">
    1
</div>
<div class="nk-tb-col tb-col-sm">
    <span class="sub-text">{{ $details->department }}</span>
</div>
<div class="nk-tb-col tb-col-md">
    <span class="sub-text">{{ $details->status }}</span>
</div>

<div class="nk-tb-col nk-tb-col-tools">
    <ul class="nk-tb-actions gx-1">
        <li>
            <a href="" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Send Email" data-bs-original-title="Update">
                <em class="icon ni ni-edit-fill"></em>
            </a>
        </li>
        <li>
            <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Suspend" data-bs-original-title="Delete">
                <em class="icon ni ni-cross-fill-c"></em>
            </a>
        </li>
    </ul>
</div>
</div>

@endforeach

<!-- .nk-tb-item -->
</div><!-- .nk-tb-list -->
</div><!-- .card-inner -->
<div class="card-inner">
<div class="nk-block-between-md g-3">
<div class="g">
<ul class="pagination justify-content-center justify-content-md-start">
    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
    <li class="page-item"><a class="page-link" href="#">6</a></li>
    <li class="page-item"><a class="page-link" href="#">7</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul><!-- .pagination -->
</div>
<div class="g">

</div><!-- .pagination-goto -->
</div><!-- .nk-block-between -->
</div><!-- .card-inner -->
</div><!-- .card-inner-group -->
</div><!-- .card -->
</div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
@endsection