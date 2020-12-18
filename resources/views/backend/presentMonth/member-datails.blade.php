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
                    <form action="{{ route('data.store') }}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Name</th>
                                        <th>Meal Rate</th>
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
                                        <td>
                                            {{ $item->user->name }}
                                            <input type="hidden" name="name[]" value="{{ $item->user->name }}">
                                        </td>
                                        <td>
                                            {{ number_format($mealRate,2)." Tk" }} 
                                        </td>
                                        <td>
                                            {{ $item->total }}
                                            <input type="hidden" name="total_meal[]" value="{{ $item->total }}" >
                                        </td>
                                        <td>
                                            {{ number_format($mealRate*$item->total,2) }} Tk
                                            <input type="hidden" name="total_cost[]" value="{{ round($mealRate*$item->total,2) }}">
                                        </td>
                                    
                                        <td>
                                            <span>
                                            <?php $bal = ''; ?>   
                                                @foreach ($memberDeposit as $deposit)
                                                    @if ($deposit->user_id == $item->user_id)
                                                        {{ (number_format($deposit->total,2))." Tk" }}
                                                        <input type="hidden" name="deposit_amount[]" value="{{ round($deposit->total,2) }}">
                                                        <?php $bal = 0; ?>
                                                    @endif
                                                @endforeach 
                                            </span>
                                            @if ($bal !== 0)
                                                0.00 Tk
                                                <input type="hidden" name="deposit_amount[]" value="0">
                                            @endif
                                        </td>
                                        <td>
                                            <span>
                                            <?php $bal = ''; ?>   
                                            @foreach ($memberDeposit as $deposit)
                                                @if ($deposit->user_id == $item->user_id)
                                                    {{  (number_format(($deposit->total - ($mealRate*$item->total)),2)). " Tk"}}
                                                    <input type="hidden" name="balance[]" value="{{ round($deposit->total - ($mealRate*$item->total),2) }}">
                                                    <?php $bal = 0; ?>
                                                @endif
                                            @endforeach
                                            </span>
                                            @if ($bal !== 0)
                                                {{ -number_format($mealRate*$item->total,2)." Tk" }}
                                                <input type="hidden" name="balance[]" value="{{ -(round($mealRate*$item->total,2)) }}">
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-right" colspan="7">
                                            <button class="btn btn-primary w-100 d-block">Save Present Data & Start New Month</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    <form>
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