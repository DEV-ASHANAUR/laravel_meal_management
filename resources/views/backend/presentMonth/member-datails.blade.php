@extends('backend.layouts.master')
@section('content')
	
<div id="layoutSidenav_content">
	<main>
        <div class="container-fluid">
            <h3 class="mt-4">Meal System</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Member Meal Details</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-table mr-1"></i>Member Meal Details</span>
                    {{-- <small class="d-sm-block"><a href="{{ route('meal.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle mr-1"></i> Add Meal</a></small> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Total Meal</th>
                                    <th>Total Cost</th>
                                    <th>Total Deposit</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($memberDetails as $key => $item)
                                <tr id="">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->total }}</td>
                                    <td>
                                        {{ number_format($mealRate*$item->total,2) }} Tk
                                    </td>
                                   
                                    <td>
                                        @foreach ($memberDeposit as $deposit)
                                            {{ ($deposit->user_id == $item->user_id)?(number_format($deposit->total,2))." Tk": '' }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($memberDeposit as $deposit)
                                            {{ ($deposit->user_id == $item->user_id)?(number_format(($deposit->total - ($mealRate*$item->total)),2)). ' Tk':'' }}
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Total Meal</th>
                                    <th>Total Cost</th>
                                    <th>Total Deposit</th>
                                    <th>Balance</th>
                                </tr>
                            </tfoot>
                        </table>
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
@endsection