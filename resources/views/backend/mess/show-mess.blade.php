@extends('backend.layouts.master')
@section('content')
<style>
  .chat_container {
    width: 100%;
    max-width: 100px;
    background-size: cover;
    min-height: 100px;
    background-position: center;
    position: relative;
    border-radius: 50%;
    margin-left: auto;
    margin-right: auto;
}
.author-box .author-box-center {
    text-align: center;
    padding-left: 5px;
}
</style>
	
<div id="layoutSidenav_content">
	<main>
        <div class="container-fluid">
            <h3 class="mt-4">Meal System</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-user fa-fw mr-1"></i>View Mess Pofile</span>
                    <small class="d-sm-block"><a id="approve" href="{{ route('mess.delete') }}" class="btn btn-danger btn-sm"><i class="fas fa-trash mr-1"></i> Delete Mess</a></small>
                </div>
                <div class="card-body">
                    <section class="section">
                        <div class="section-body">
                          <div class="row mt-sm-4">
                            <div class="col-12 col-md-12 col-lg-8">
                              <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4>Mess Details</h4>
                                    <small class="d-sm-block"><a href="{{ route('mess.edit') }}" class="btn btn-success btn-sm"><i class="fas fa-edit mr-1"></i> Edit Mess</a></small>
                                </div>
                                <div class="card-body">
                                    <div class="py-4">
                                    <p class="clearfix">
                                        <span class="float-left">
                                        Name : 
                                        </span>
                                        <span class="ml-3" style="font-weight:bold">
                                            {{$mess->name }}
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Address : 
                                        </span>
                                        <span class="ml-3" style="font-weight:bold">
                                            {{$mess->address }}
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Mess Type : 
                                        </span>
                                        <span class="ml-3" style="font-weight:bold">
                                            {{ (!empty($mess->mess_type))?$mess->mess_type : "Not Set Yet !" }}
                                        </span>
                                    </p>
                                    </div>
                                </div>
                              </div>
                           </div>
                       </div>
                     </div>
                   </section>
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