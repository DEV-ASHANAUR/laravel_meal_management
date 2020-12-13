<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Meal-System</title>
        {{-- <link rel="stylesheet" href="{{ asset('public/login_asset/css/style.css') }}"> --}}
        <link href="{{ asset('backend') }}/css/styles.css" rel="stylesheet" />
        <link href="{{ asset('backend') }}/css/datatable.min.css" rel="stylesheet"/>
        <!-- Template CSS -->
        
        {{-- <link rel="stylesheet" href="{{ asset('css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> --}}
        <link href="{{ asset('backend') }}/css/toastr.css" rel="stylesheet">
        <link href="{{ asset('backend') }}/css/gijgo.min.css" rel="stylesheet">
        <script src="{{ asset('backend') }}/js/fontawesome.min.js"></script>
        <script src="{{ asset('backend') }}/js/jquery.js"></script>
        {{-- <script src="{{ asset('backend') }}/js/sweetalert.js"></script> --}}
        <script src="{{ asset('backend') }}/js/gijgo.min.js"></script>
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('backend') }}/css/select2.min.css">
        <link rel="stylesheet" href="{{ asset('backend') }}/css/select2-bootstrap4.min.css">
        <script src="{{ asset('backend') }}/js/sweetalert.js"></script>
        <link rel="stylesheet" href="{{ asset('backend') }}/css/sweetalert.css">
        @yield('style')
        {{-- //sweetalert --}}
        
       {{-- <style type="text/css">
            button.btn.btn-outline-secondary.border-left-0 {
                display: none!important;
                }
        </style> --}}
        {{-- <script src="{{ asset('public/backend') }}/js/notify.js"></script> --}}
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('mess.show') }}">
            @php
                $mess_id = Auth::user()->mess_id;
                $mess = App\Model\Mess::find($mess_id);  
            @endphp
            {{ $mess->name }}
            </a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <span class="text-white">{{ Auth::user()->name }}</span>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-plus"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                      <a class="dropdown-item" href="#"> <i class="fas fa-money-bill-alt"></i> New Invoice (Sale)</a>
                      <a class="dropdown-item" href="#"> <i class="fa fa-tag"></i> Add New Purchase</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"> <i class="fa fa-tags"></i> Add New Product Type</a>
                      <a class="dropdown-item" href="#"> <i class="fa fa-user"></i> Add New Supplier</a>
                      <a class="dropdown-item" href="#"> <i class="fa fa-industry"></i> New Product Category</a>
                      <div class="dropdown-divider"></div>
                      {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addExpenseAccountModal"> <i class="fa fa-dollar"></i> New Expense Account</a> --}}
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('profile.pass.view') }}">Settings</a><a class="dropdown-item" href="{{ route('profile.view') }}">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            @include('backend.layouts.sidebar')
            
            @yield('content')
        </div>
        {{-- <script src="{{ asset('backend') }}/js/jquery.js"></script> --}}
        <script src="{{ asset('backend') }}/js/scripts.js"></script>
        <script src="{{ asset('backend') }}/js/Chart.min.js"></script>
        <script src="{{ asset('backend') }}/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('backend') }}/assets/demo/chart-area-demo.js"></script>
        <script src="{{ asset('backend') }}/assets/demo/chart-bar-demo.js"></script>
        <script src="{{ asset('backend') }}/js/dataTables.min.js"></script>
        <script src="{{ asset('backend') }}/js/bootstrap4.min.js"></script>
        <script src="{{ asset('backend') }}/assets/demo/datatables-demo.js"></script>
        <script src="{{ asset('backend') }}/js/toastr.min.js"></script>
        <script src="{{ asset('backend') }}/js/jquery.validate.min.js"></script>
        <script src="{{ asset('backend') }}/js/additional-methods.min.js"></script>
        <script src="{{ asset('backend') }}/js/preview.js"></script>
        <script src="{{ asset('backend') }}/js/handlebars.min.js"></script>
        @yield('script')
        <!-- Select2 -->
        <script src="{{ asset('backend') }}/js/select2.full.min.js"></script>
        <script>
            @if(Session::has('message'))
              var type="{{Session::get('alert-type','info')}}"
              switch(type){
                case 'info':
                      toastr.info("{{ Session::get('message') }}");
                      break;
                case 'success':
                      toastr.success("{{ Session::get('message') }}");
                      break;
                case 'warning':
                      toastr.warning("{{ Session::get('message') }}");
                      break;
                case 'error':
                      toastr.error("{{ Session::get('message') }}");
                      break;
              }
            @endif  
          </script>
          {{-- //delete sweetalert --}}
          {{-- <script>
              $(document).ready(function(){
                $(document).on('click','#delete',function(e){
                    e.preventDefault();
                    var link = $(this).attr('href');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                        if (result.value) {
                            window.location.href = link;
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        }
                     });
                });
              });
          </script> --}}
          <script>
              $(document).ready(function(){
                $(document).on('click','#delete',function(){
                    var actionTo = $(this).attr('href');
                    var token = $(this).attr('data-token');
                    var id = $(this).attr('data-id');
                    //alert(token);
                    swal({
                        title: 'Are You Sure?',
                        type: "",
                        showCancelButton: true,
                        confirmButtonClass: 'btn-danger',
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Cancel',
                        closeOnConfirm: false,
                        closeOnCancel: false,
                    },
                    function (isConfirm){
                        if(isConfirm){
                            $.ajax({
                                url:actionTo,
                                type:'post',
                                data:{id:id,_token:token},
                                success:function(data){
                                    swal({
                                        title:"Deleted",
                                        type:"success"
                                    },
                                    function (isConfirm){
                                        if(isConfirm){
                                            $('#' + id).fadeOut();
                                        }
                                    });
                                }
                            });
                        }else{
                            swal("Canclled", "", "error");
                        }
                    });
                    return false;
                });
              });
          </script>
          
        {{-- //approve sweetalert --}}
        <script>
            $(document).ready(function(){
              $(document).on('click','#approve',function(e){
                  e.preventDefault();
                  var link = $(this).attr('href');
                    // alert(link);
                  var answer = confirm("Are You Sure , Delete Mess ?")
                  if (answer){
                    alert("Allah hafiz!");
                    window.location = link;
                  }else{
                    alert("Thanks for staying with us!")
                  }
              });
            });
        </script>
        <script>
            $(document).ready(function(){
                $('.select2').select2();
                //Initialize Select2 Elements
                $('.select2bs4').select2({
                theme: 'bootstrap4'
                });
            });
        </script>
    </body>
</html>
