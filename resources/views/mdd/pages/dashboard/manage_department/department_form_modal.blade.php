<div class="modal fade" tabindex="-1" id="depform" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Add Department</h5>
                    


<form action="{{ route('manage-department-submit') }}" method="post">
    @csrf
    <div class="form-group">
        <label class="form-label">Deparment Name</label>
        <div class="form-control-wrap">
            <input type="text" class="form-control" name="department" value="">
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Deparment Description</label>
        <div class="form-control-wrap">
            <input type="text" class="form-control" name="description" value="">
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Icon</label>
        <div class="form-control-wrap">
            <input type="text" class="form-control" name="icon" value="">
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Status</label>
        <div class="form-control-wrap">

<ul class="custom-control-group g-3 align-center flex-wrap">
    <li>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" checked="" name="status" value="1" id="reg-enable">
            <label class="custom-control-label" for="reg-enable">Enable</label>
        </div>
    </li>
    <li>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" name="status" value="2" id="reg-disable">
            <label class="custom-control-label" for="reg-disable">Disable</label>
        </div>
    </li>
</ul>
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