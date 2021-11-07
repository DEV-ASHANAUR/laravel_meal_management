@extends('backend.layouts.master')
@section('content')
	
<div id="layoutSidenav_content">
	<main>
        <div class="container-fluid">
          <h3 class="mt-4">Meal System</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Other Cost</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-plus-circle mr-1"></i>Edit Other Cost</span>
                    <small class="d-sm-block"><a href="{{ route('other.view') }}" class="btn btn-success btn-sm"><i class="fas fa-list mr-1"></i>View Other Cost</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('other.update',$other->id) }}" method="post" id="Myform">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 m-auto">
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <h4 class="text-center">Edit Other Cost
                                            </h4>
                                        </div>    
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="date">Select Date</label>
                                                <input type="date" class="form-control mb-2" name="date" id="date" value="{{ $other->date }}" placeholder="yyyy-mm-dd" readonly>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="category_id">Member Name</label>
                                                <select class="form-control" name="name" id="user_id">
                                                    <option value="">Select Name</option>
                                                    @foreach ($user as $user)
                                                        <option value="{{ $user->id }}" {{ ($user->id == $other->user_id)?'selected':'' }}>{{ $user->name }}</option>   
                                                    @endforeach
                                                </select>
                                                <font class="text-danger">{{ ($errors->has('name'))?$errors->first('name'):'' }}</font>
                                            </div>

                                            <label for="amount">Other Amount</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">৳</span>
                                                </div>
                                                <input type="number" class="form-control" value="{{ $other->amount }}" name="amount" placeholder="Enter Amount" aria-label="Amount (to the nearest dollar)">
                                            </div>
                                            <font class="text-danger">{{ ($errors->has('amount'))?$errors->first('amount'):'' }}</font>

                                            <div class="mb-3">
                                                <label for="name">Other Description</label>
                                                <textarea name="description" class="form-control" id="" cols="3" rows="3" placeholder="Enter bazer description..">{{ $other->description }}</textarea>
                                                <font class="text-danger">{{ ($errors->has('description'))?$errors->first('description'):'' }}</font>
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
          amount: {
            required: true,
          },
          name: {
            required: true,
          },
          description: {
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