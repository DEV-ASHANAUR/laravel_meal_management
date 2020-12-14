@extends('backend.layouts.master')
@section('content')
	
<div id="layoutSidenav_content">
	<main>
        <div class="container-fluid">
            <h3 class="mt-4">Meal System</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Meal</li>
            </ol>
            {{-- <div class="card mb-4">
                <div class="card-body">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>.</div>
            </div> --}}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-table mr-1"></i>View Meal</span>
                    <small class="d-sm-block"><a href="{{ route('meal.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle mr-1"></i> Add Meal</a></small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Date</th>
                                    <th>Total Meal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($meal as $key => $meal)
                                <tr id="">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $meal->date }}</td>
                                    <td>{{ $meal->total }}</td>
                                    <td>
                                        {{-- <a href="{{ route('meal.show',$meal->id) }}" title="Show" class="btn btn-success btn-sm"><i class="fas fa-eye mr-1"></i></a>

                                        <a href="{{ route('users.edit',$meal->id) }}" title="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit mr-1"></i></a> --}}

                                        <a href="{{ route('meal.delete',$meal->date) }}" id="deletemass" class="btn btn-danger btn-sm"><i class="fas fa-trash mr-1"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Date</th>
                                    <th>Total Meal</th>
                                    <th>Action</th>
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