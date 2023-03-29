@extends('mdd.admin_master')
@section('mdd')
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Request Account</h4>
                                                <div class="nk-block-des">
                                                    <p><strong>Manage User </strong> Update request account</p>
                                                </div>
                                            </div>
                                        </div>
<div class="row g-gs">
    <div class="col-lg-6">
        <div class="card card-bordered h-100">
            <div class="card-inner">
        
                <form action="{{ route('mu.request-account-move',$data->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="full-name">Full Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="fullname" value="{{ $data->name }}" id="full-name">
                        </div>
                    </div>

                    <div class="form-group">
<label class="form-label" for="fva-topics">Department
     @error('department')                
        <span id="fv-sex-error" class="validate_input">{{ $message }}</span>
    @enderror
</label>
                    <div class="form-control-wrap ">
                        <select class="form-select form-select-lg js-select2 select2-hidden-accessible valid @error('department') is-invalid @enderror" id="fva-topics" name="department" data-placeholder="Select department" data-select2-id="fva-topics" tabindex="-1" aria-hidden="true" aria-invalid="false">
                            <option label="empty" value="" data-select2-id=""></option>
                            <option value="1" data-select2-id="8">Finance</option>
                            <option value="2" data-select2-id="9">Casher</option>
                            <option value="3" data-select2-id="10">Broker</option>
                            <option value="4" data-select2-id="11">Agent</option>
                        </select>
                    </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="phone-no">E-mail</label>
                        <div class="form-control-wrap">
                            <input type="text" name="email" value="{{ $data->email }}" class="form-control" id="phone-no">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="pay-amount">Status</label>
                        <div class="form-control-wrap">
                            <input type="text" name="status" class="form-control" id="pay-amount">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Update Informations</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
                                    </div><!-- .nk-block -->
                            <!-- .nk-block -->
                      <!-- .nk-block -->
                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>
@endsection