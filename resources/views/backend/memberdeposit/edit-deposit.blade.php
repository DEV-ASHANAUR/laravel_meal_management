@extends('backend.layouts.master')
@section('content')
	
<div id="layoutSidenav_content">
	<main>
        <div class="container-fluid">
          <h3 class="mt-4">Meal System</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Member Deposit</li>
            </ol>
            {{-- <div class="card mb-4">
                <div class="card-body">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>.</div>
            </div> --}}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-plus-circle mr-1"></i>Edit Member Deposit</span>
                    <small class="d-sm-block"><a href="{{ route('membermoney.view') }}" class="btn btn-success btn-sm"><i class="fas fa-list mr-1"></i>View Member's Deposit</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('membermoney.update',$deposit->id) }}" method="post" id="Myform">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 m-auto">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="date">Select Date</label>
                                        <input type="text" class="form-control-sm datepicker" name="date" id="date" value="{{ $deposit->date }}" placeholder="yyyy-mm-dd" readonly>
                                    </div>
                                </div>   
                                <div class="form-row"> 
                                    <div class="form-group col-md-6">
                                        <label for="category_id">Member Name</label>
                                        <select class="select2" name="name" id="user_id">
                                            <option value="">Select Name</option>
                                            @foreach ($user as $user)
                                                <option value="{{ $user->id }}" {{ ($user->id == $deposit->user_id)?'selected':'' }}>{{ $user->name }}</option>   
                                            @endforeach
                                        </select>
                                        <font class="text-danger">{{ ($errors->has('name'))?$errors->first('name'):'' }}</font>
                                    </div>
                                </div>  
                                <div class="form-row">  
                                    <div class="form-group col-md-6">
                                        <label for="name">Deposit Amount</label>
                                        <input type="number" class="form-control form-control-sm" value="{{ $deposit->money }}" name="amount" placeholder="Enter Amount">
                                        <font class="text-danger">{{ ($errors->has('amount'))?$errors->first('amount'):'' }}</font>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
          amount: {
            required: true,
          },
          user_id: {
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
<script>
    $('.datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format:'yyyy-mm-dd'
    });
</script>
@endsection