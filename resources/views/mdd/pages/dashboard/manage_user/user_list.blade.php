@extends('mdd.admin_master')
@section('mdd')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">


<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
          
			<h4 class="ff-base fw-medium">
			  Manage User
			  <small class="text-soft" style="margin-left:10px;"> - User List</small>
			</h4>
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
    <div class="card card-bordered card-stretch">
        <div class="container-fluid">
            <div style="margin-top:10px; margin-left: 5px; margin-right: 5px;">


<table class="table table-tranx">
    <thead>
        <tr class="tb-tnx-head">
            <th class="tb-tnx-id"><span class="">#</span></th>
            <th class="tb-tnx-info">
                <span class="tb-tnx-desc d-none d-sm-inline-block">
                    <span>Full Name</span>
                </span>
            </th>
            <th class="tb-tnx-info">
                <span class="tb-tnx-desc d-none d-sm-inline-block">
                    <span>Department</span>
                </span>
            </th>

            <th class="tb-tnx-info">
                <span class="tb-tnx-desc d-none d-sm-inline-block">
                    Email
                </span>
            </th>

            <th class="tb-tnx-info">
                <span class="tb-tnx-desc d-none d-sm-inline-block">
                    Phone no.
                </span>
            </th>

            <th class="tb-tnx-info">
                <span class="tb-tnx-desc d-none d-sm-inline-block">
                    Status
                </span>
            </th>

            <th class="tb-tnx-info text-center" style="width:200px;">
                <span class="tb-tnx-desc">
                    Action
                </span>
            </th>
        </tr>
    </thead>

    <tbody>
        @foreach($user as $users)
        <tr class="tb-tnx-item">
            <td class="tb-tnx-id">
                {{ $loop->index + 1 }}
            </td>
            
            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $users->name }}</span>
                </div>
            </td>

            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $users->department_name }}</span>
                </div>
            </td>

             <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $users->email }}</span>
                </div>
            </td>

            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $users->phone_number }}</span>
                </div>
            </td>

            <td class="tb-tnx-info">
                <div class="tb-tnx-desc">
                    <span class="title">{{ $users->status_name }}</span>
                </div>
            </td>
            
            <td class="tb-tnx-info text-center">
                <button type="button"  value="{{ $users->id }}" class="btn btn-sm btn-outline-primary modReqEdit">Edit</button>
                <button type="button" value="{{ $users->id }}" class="btn btn-sm btn-outline-danger modReqDelete">Delete</button>
            </td>
        </tr>
        @endforeach()
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