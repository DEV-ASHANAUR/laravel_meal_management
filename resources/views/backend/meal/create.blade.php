@extends('backend.layouts.master')
@section('content')
	
<div id="layoutSidenav_content">
	<main>
        <div class="container-fluid">
          <h3 class="mt-4">Meal System</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Add Meal</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-plus-circle mr-1"></i>Add Meal</span>
                    <small class="d-sm-block"><a href="{{ route('meal.view') }}" class="btn btn-success btn-sm"><i class="fas fa-list mr-1"></i>Meal List</a></small>
                </div>
                <div class="card-body">
                  @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <form action="{{ route('meal.store') }}" method="post">
                                @csrf
                                <table class="table table-bordered">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th>Sl</th>
                                            <th>Member Name</th>
                                            <th class="text-center">Meal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($member as $key => $user)
                                        <tr>
                                            <th>{{ $key+1 }}</th>
                                            <th>{{ $user->name }}
                                                <input type="hidden" name="user_id[]" value="{{ $user->id }}">
                                            </th>
                                            <th class="text-center" style="width: 200px">
                                                <input class="spiner" name="meal[]" type="number" value="0" min="0" max="50" step="0.5" data-decimals="1">
                                            </th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <input type="date" name="date" value="{{ $date }}" />
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-success w-100 d-block">Submit</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </form>
                        </div>
                    </div>
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
{{-- <script>
    $(document).ready(function () {
      $('#Myform').validate({
        rules: {
        usertype: {
            required: true,
          },
          name: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 6
          },
          password2: {
            required: true,
            equalTo : '#password'
          }
          
        },
        messages: {
          usertype: {
            required: "Please Select User Role",
          },
          name: {
            required: "Please Enter Name",
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          password: {
            required: "Please Enter password",
            minlength: "Your password must be at least 6 characters long"
          },
          password2: {
            required: "Please Enter Confirm password",
            equalTo : "Confirm Password Does not Match"
          }
          
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
</script> --}}
@endsection
@section('style')
  
@endsection
@section('script')
    <script src="{{ asset('backend') }}/js/popper.js"></script>
    <script src="{{ asset('backend') }}/js/bootstrap-input-spinner.js"></script>
    <script>
        $(".spiner").inputSpinner();
    </script>
@endsection