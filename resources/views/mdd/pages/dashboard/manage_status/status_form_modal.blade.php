<div class="modal fade" tabindex="-1" id="statusform" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Add Status</h5>
                    


<form action="{{ route('manage-status-submit') }}" method="post">
    @csrf
    <div class="form-group">
        <label class="form-label">Name</label>
        <div class="form-control-wrap">
            <input type="text" class="form-control" name="name" value="">
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Description</label>
        <div class="form-control-wrap">
            <input type="text" class="form-control" name="description" value="">
        </div>
    </div>
  

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
    </div>
</form>

                                             



                </div>
            </div>
        </div>
    </div>