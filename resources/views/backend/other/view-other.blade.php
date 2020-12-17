@extends('backend.layouts.master')
@section('content')
	
<div id="layoutSidenav_content">
	<main>
        <div class="container-fluid">
            <h3 class="mt-4">Meal System</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Other Cost</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-table mr-1"></i>View Other Cost</span>
                    <small class="d-sm-block"><a href="{{ route('other.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle mr-1"></i> Add Other Cost</a></small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($other as $key => $item)
                                <tr id="{{ $item->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td class="text-capitalize">{{ $item->user->name }}</td>
                                    <td>{{ number_format($item->amount,2) }} tk</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ date("d - M - Y",strtotime($item->date)) }}</td>
                                    <td>

                                        <a href="{{ route('other.edit',$item->id) }}" title="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit mr-1"></i></a>

                                        <a href="{{ route('other.delete') }}" id="delete" title="Delete" data-id="{{ $item->id }}" data-token="{{ csrf_token() }}" class="btn btn-danger btn-sm "><i class="fas fa-trash mr-1"></i></a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Date</th>
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