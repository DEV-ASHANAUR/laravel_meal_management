<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="{{ asset('backend') }}/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Mess</h3></div>
                                    <div class="card-body">
                                        <form action={{ route('mess.store') }} method="post">
                                            @csrf
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Mess Name</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="name" type="Text" placeholder="Enter Mess Name" />
                                                <font class="text-danger">{{ ($errors->has('name'))?($errors->first('name')):'' }}</font>
                                                
                                            </div>

                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Mess Address</label>
                                                <input class="form-control py-4" id="inputPassword" name="address" type="text" placeholder="Enter Address.." />
                                                <font class="text-danger">{{ ($errors->has('address'))?($errors->first('address')):'' }}</font>
                                            </div>

                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><button class="btn btn-primary" href="index.html">Create Now</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        {{-- <div class="small"><a href="register.html">Need an account? Sign up!</a></div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Meal System 
                                <script>
                                    var date = new Date().getFullYear();
                                    document.write(date);
                                </script>
                            </div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
