@extends('mdd.admin_casher')
@section('mdd')


<div class="nk-content ">

    <div class="nk-block nk-block-middle nk-auth-body  wide-lg">
        
<div class="nk-content-body">
    <div class="content-page wide-sm m-auto">
        
       {{--  <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
            <div class="nk-block-head-content text-center">
                <h2 class="nk-block-title fw-normal">Casher <span class="lead">walk-in Client</span></h2> 
            </div>
        </div> --}}

        <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-inner">

                   
                        <div class="nk-block-content">
                            <div class="nk-block-content-head px-lg-4">

                                <h3>Casher ID : 151112</h3><br>

                            <form action="{{ route('c-search-client-name') }}" method="GET" id="TheClientForm">
                                <div class="form-group">
                                    <label class="form-label">Search Client</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2 select2-hidden-accessible" data-ui="xl" data-search="on"  name="clientID" id="clientID" > 
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-xl btn-primary text-center" style="float:right;">
                                        <em class="icon ni ni-search" style="margin-right
                                        : 5px;"></em> Search</button>
                                </div>



                            </form>
                               
                            </div>


                        </div>
                        


                </div><!-- .card-inner -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div><!-- .content-page -->
</div>
        
    </div>
   
</div>

















<script type="text/javascript">

function populateProvinces() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://127.0.0.1:8000/mdd-properties/dashboard/jsx/client/client-name', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var names = JSON.parse(xhr.responseText);
            var output = '<option value="">-- Search Name --</option>';

            for (var i = 0; i < names.length; i++) {
                output += '<option value="' + names[i].id + '">' + names[i].lname + ' ' + names[i].fname +' .'+ names[i].mname +'</option>';
            }

            document.getElementById('clientID').innerHTML = output;
        }
    };
xhr.send();
}

window.onload = function() {
    populateProvinces();
}

</script>

@endsection