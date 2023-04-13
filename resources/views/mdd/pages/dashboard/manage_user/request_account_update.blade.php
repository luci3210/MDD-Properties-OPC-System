@extends('mdd.admin_master')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
        	<div class="nk-block-head-sub"><a class="back-to" href="">
        		<em class="icon ni ni-arrow-left"></em><span>Back</span></a>
        	</div>

            <h4 class="title nk-block-title">Manage User / Request account</h4>
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

<div class="nk-block nk-block-lg">

<div class="card card-bordered card-preview">
    <div class="card-inner">
        <div class="preview-block">
            <span class="preview-title-lg overline-title">Update Form</span>

            <div class="row gy-4">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="form-label" for="default-01">Full Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="default-01" placeholder="Full Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="default-01">Department</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="default-01" placeholder="Department">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="default-01">E-mail</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="default-01" placeholder="E-mail">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="default-01">Status and Days</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="default-01" placeholder="Status and Days">
                        </div>
                    </div>

                    <hr class="preview-hr">

    <button type="submit" class="btn btn-primary" id="SaveInfo">Update Information</button>

                </div>

            </div>
           
        </div>
    </div>
</div>

</div>

            </div>
    	</div>
	</div>
</div>

@endsection()