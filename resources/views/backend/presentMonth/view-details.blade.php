@extends('backend.layouts.master')
@section('content')
	
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h3 class="mt-4">Meal System</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Present Month Details</li>
            </ol>
			<div class="row">
				<div class="col-xl-3 col-md-6">
					<div class="card bg-primary text-white mb-4">
						<div class="card-body">Balance</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<h5>{{ number_format($totalBalance,2) }} Tk</h5>
							<a class="small text-white stretched-link" href="{{ route('bazer.view') }}">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-info text-white mb-4">
						<div class="card-body">Bazer Cost</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<h5>{{ number_format($bazerCost,2) }} Tk</h5>
							<a class="small text-white stretched-link" href="{{ route('bazer.view') }}">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-success text-white mb-4">
						<div class="card-body">Other Cost</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<h5>{{ number_format($OtherCost,2) }} Tk</h5>
							<a class="small text-white stretched-link" href="{{ route('other.view') }}">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-danger text-white mb-4">
						<div class="card-body">Total Deposit</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<h5>{{ number_format($totalDeposit,2) }} Tk</h5>
							<a class="small text-white stretched-link" href="{{ route('membermoney.view') }}">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
                </div>
                <div class="col-xl-3 col-md-6">
					<div class="card bg-primary text-white mb-4">
						<div class="card-body">Total Meal</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<h5>{{ number_format($totalMeal,1) }}</h5>
							<a class="small text-white stretched-link" href="{{ route('membermoney.view') }}">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
                </div>
                <div class="col-xl-3 col-md-6">
					<div class="card bg-info text-white mb-4">
						<div class="card-body">Total Cost</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<h5>{{ number_format($totalCost,2) }} Tk</h5>
							<a class="small text-white stretched-link" href="{{ route('bazer.view') }}">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
                </div>
                <div class="col-xl-3 col-md-6">
					<div class="card bg-success text-white mb-4">
						<div class="card-body">Meal Rate</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<h5>{{ number_format($mealRate,2) }} Tk</h5>
							<a class="small text-white stretched-link" href="">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
                </div>
                <div class="col-xl-3 col-md-6">
					<div class="card bg-danger text-white mb-4">
						<div class="card-body">Total Member</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<h5>{{ number_format($totalMember) }}</h5>
							<a class="small text-white stretched-link" href="{{ route('users.view') }}">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
                </div>
			</div>
			{{-- <div class="row">
				<div class="col-xl-6">
					<div class="card mb-4">
						<div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
						<div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="card mb-4">
						<div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
						<div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
					</div>
				</div>
			</div> --}}
			
		</div>
	</main>
	<footer class="py-4 bg-light mt-auto">
		<div class="container-fluid">
			<div class="d-flex align-items-center justify-content-between small">
				<div class="text-muted">Copyright &copy; website 2020</div>
				<div>
				<span>Development with <i class="fas fa-heart text-danger"></i> by <a href="https://www.facebook.com/ashanaur.rahman.16" class="text-dark" target="_blank">Ashanur</a></span>
				</div>
			</div>
		</div>
	</footer>
</div>
@endsection