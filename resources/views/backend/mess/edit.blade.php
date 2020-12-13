@extends('backend.layouts.master')
@section('content')
	
<div id="layoutSidenav_content">
	<main>
        <div class="container-fluid">
          <h3 class="mt-4">Meal System</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Mess</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-edit mr-1"></i>Edit Mess</span>
                    <small class="d-sm-block"><a href="{{ route('mess.show') }}" class="btn btn-success btn-sm"><i class="fas fa-user mr-1"></i>View Mess</a></small>
                </div>
                <div class="card-body">

                    <form action="{{ route('mess.update') }}" method="post" id="Myform">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="name">Mess Name</label>
                              <input type="text" class="form-control" value="{{ $editdata->name }}" name="name" id="name">
                            </div>
                            <div class="form-group col-md-12">
                              <label for="address">Enter Address</label>
                              <input type="text" class="form-control" value="{{ $editdata->address }}" name="address" id="address">
                            </div>
                            <div class="form-group col-md-12">
                              <label for="address">Mess Type</label>
                              <input type="text" class="form-control" value="{{ $editdata->mess_type }}" name="mess_type" id="mess_type">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
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
          },
          address: {
            required: true,
          }
        //   password: {
        //     required: true,
        //     minlength: 6
        //   },
        //   password2: {
        //     required: true,
        //     equalTo : '#password'
        //   }
          
        },
        messages: {
          name: {
            required: "Please Enter Mess Name",
          },
          address: {
            required: "Please enter address",
          }
        //   password: {
        //     required: "Please Enter password",
        //     minlength: "Your password must be at least 6 characters long"
        //   },
        //   password2: {
        //     required: "Please Enter Confirm password",
        //     equalTo : "Confirm Password Does not Match"
        //   }
          
        },
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