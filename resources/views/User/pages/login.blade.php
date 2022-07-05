<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/logincss/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body ng-app="myapp" ng-controller="mycontroller"> 
    <section class="ftco-section"> 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(upload/images/banner.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="" class="signin-form">
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" ng-model="username" required>
                                    <label class="form-control-placeholder"   for="username">Username</label>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" ng-model="password" class="form-control" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" ng-click="login()" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center"><a  href="" data-toggle="modal" data-target="#modelId">Sign Up</a></p>
                            <p class="text-center"><a href="" ng-click="admin()">Sign In with Adminitrastor</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
   
        
        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                    <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign Up</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="#" class="signin-form">
                            <div class="form-group">
                                    <input id="password-field" type="text" class="form-control" ng-model="user.full_name" required>
                                    <label class="form-control-placeholder" for="password">Full name</label>
                                    <span toggle="#password-field" class="field-icon toggle-password"></span>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" ng-model="user.users_name" required>
                                    <label class="form-control-placeholder" for="username">Username</label>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" ng-model="user.password" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="email" class="form-control" ng-model="user.email" required>
                                    <label class="form-control-placeholder" for="username">Email</label>
                                </div>
                               
                                <div class="form-group">
                                    <input id="password-field" type="text" class="form-control" ng-model="user.phone" required>
                                    <label class="form-control-placeholder" for="password">Phone</label>
                                    <span toggle="#password-field" class="field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" ng-click="updateData()" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
                                </div>
                            
                            </form>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="css/logincss/js/jquery.min.js"></script>
    <script src="css/logincss/js/popper.js"></script>
    <script src="css/logincss/js/bootstrap.min.js"></script>
    <script src="css/logincss/js/main.js"></script>
    <script src="/Adminjs/angular.min.js"></script>

<script src="/Homejs/user.js"></script>

</body>

</html>