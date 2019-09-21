@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <div class="row">
                  	<div class="col-12 mb-3">
                  		<a href="javascript:void(0)" onclick="delete_row()" class="bg-danger text-white p-2 pr-3 pl-3 pull-right"><i class="fa fa-minus"></i></a>
                  		<a href="javascript:void(0)" onclick="add_row()" class="bg-primary text-white p-2 pr-3 pl-3 mr-2 pull-right"><i class="fa fa-plus"></i></a>
                  	</div>
                  </div>
									<div class="card">
										<div class="card-body row master_div">
											<div class="col-12 row child">
												<div class="col-4 form-group">
													<input type="text" class="form-control" name="name[]" placeholder="Enter Name">
												</div>
												<div class="col-4 form-group">
													<input type="email" class="form-control" name="email[]" placeholder="Enter Email">
												</div>
												<div class="col-4 form-group">
													<input type="text" class="form-control" name="number[]" placeholder="Enter Contact Number">
												</div>
											</div>
										</div>
										<div class="row m-2">
											<button onclick="submit_form()" class="col-2 offset-5 btn btn-success btn-pill">Submit</button>
										</div>
									</div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none hidden_parent">
    	<div class="col-12 row child">
				<div class="col-4 form-group">
					<input type="text" class="form-control" placeholder="Enter Name">
				</div>
				<div class="col-4 form-group">
					<input type="email" class="form-control" placeholder="Enter Email">
				</div>
				<div class="col-4 form-group">
					<input type="text" class="form-control" placeholder="Enter Contact Number">
				</div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function(){

});
function add_row(){
	let html = $('.hidden_parent').html();
	$('.master_div').append(html);
}
function submit_form(){

	$.post({url:'/form/submit',
		data:{
			"_token": "{{ csrf_token() }}",
		},
		success:function(data){
			console.log('data',data);
		}
	});
}
function delete_row(){
	if(	$('.master_div').children().length > 1){
			$('.master_div').children().last().remove();
	}else{
		alert('Can not delete last element.');
	}
}
</script>
@endpush