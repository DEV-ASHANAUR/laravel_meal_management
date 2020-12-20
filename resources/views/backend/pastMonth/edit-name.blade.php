@extends('backend.layouts.master')
@section('content')
	
<div id="layoutSidenav_content">
	<main>
        <div class="container-fluid">
          <h3 class="mt-4">Meal System</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Month Name</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-plus-circle mr-1"></i>Edit Month Name</span>
                    {{-- <small class="d-sm-block"><a href="{{ route('bazer.view') }}" class="btn btn-success btn-sm"><i class="fas fa-list mr-1"></i>View Bazer Cost</a></small> --}}
                </div>
                <div class="card-body">
                    <form action="{{ route('pastMonth.update',$month->id) }}" method="post" id="Myform">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 m-auto">
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <h4 class="text-center">Edit Month Name
                                            </h4>
                                        </div>    
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="name">Set Month Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $month->name }}" placeholder="Enter Month Name">
                                                <font class="text-danger">{{ ($errors->has('name'))?$errors->first('name'):'' }}</font>
                                            </div>
                                        </div>  
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
	<footer class="py-4 bg-light mt-auto">
		<div class="container-fluid">
			<div class="d-flex align-items-center justify-content-between small">
				<div class="text-muted">Copyright &copy; Your Website 2019</div>
				<div>
					<a href="#">Privacy Policy</a>
					&middot;
					<a href="#">Terms &amp; Conditions</a>
				</div>
			</div>
		</div>
	</footer>
</div>
<script>
    $(document).ready(function () {
      $('#Myform').validate({
        rules: {
          name: {
            required: true,
          }
        },
        // messages: {
        //   usertype: {
        //     required: "Please Select User Role",
        //   },
        //   name: {
        //     required: "Please Enter Name",
        //   },
        //   email: {
        //     required: "Please enter a email address",
        //     email: "Please enter a vaild email address"
        //   },
        //   password: {
        //     required: "Please Enter password",
        //     minlength: "Your password must be at least 6 characters long"
        //   },
        //   password2: {
        //     required: "Please Enter Confirm password",
        //     equalTo : "Confirm Password Does not Match"
        //   }
          
        // },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
</script>
@endsection