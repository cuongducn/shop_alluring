
 <!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mannat Themes">
        <meta name="keyword" content="">

        <title>ALLURING - MAKE LIFE EASER</title>
        <style>
    .img-categories{
        width:5rem;
        height: 5rem;
    }
    #abuttonv{
      float:right;
    }
    #abuttonv a {
      background-color: #fff;
      border: 1px solid #ddd;
      box-sizing: border-box;
      color: blue;
      cursor: pointer;
      display: inline-block;
      font-family: din-round,sans-serif;
      font-size: 15px;
      font-weight: 700;
      padding: 10px 12px;
      text-align: center;
      width: 100%;
    }
      #abuttonv li.active > a:not(.page-link),
      #abuttonv li.active > a:not(.page-link):hover,
      #abuttonv li.active > a:not(.page-link):focus {
      border-color: #696cff;
      background-color: #696cff;
      color: #fff;
      box-shadow: 0 0.125rem 0.25rem rgba(105, 108, 255, 0.4);
    }
    .text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}

    /* #abuttonv a:first-child{
      border-top-left-radius: 25px;
      border-bottom-left-radius: 25px;
    }
    #abuttonv a:last-child{
      border-top-right-radius: 25px;
      border-bottom-right-radius: 25px;
    } */
    </style>

        <!-- Theme icon -->
        <link rel="shortcut icon" href="/Admin/assets/images/favicon.ico">

        <link href="/Admin/assets/plugins/morris-chart/morris.css" rel="stylesheet">
        <!-- Theme Css -->
        <link href="/Admin/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/Admin/assets/css/slidebars.min.css" rel="stylesheet">
        <link href="/Admin/assets/css/icons.css" rel="stylesheet">
        <link href="/Admin/assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="/Admin/assets/css/style.css" rel="stylesheet">
        <link href="/choncss/Admin/style.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


        <script src="/Adminjs/angular.min.js"></script>
        
    </head>

    <body class="sticky-header"  ng-app="myapp" ng-controller="mycontroller">
        <section>
            <!-- sidebar left start-->
            @include('includes.sidebar')
           <!-- sidebar left end-->

            <!-- body content start-->
            <div class="body-content">
            <div class="container">
        <div class="row">
        <div class="modal fade" id="ignismyModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                     </div>
                    <div class="modal-body">
						<div class="thank-you-pop">
							<img src="/upload/images/tick.png" alt="" id="img-message">
							<h1>@{{txt}} THÀNH CÔNG</h1>
 						</div>
                    </div>
                    <button type="button" ng-click ="loadpage()" class="btn-primary" data-dismiss="modal" aria-label=""><span>Đồng ý</span></button>
                    
                </div>
            </div>
        </div>
    </div>
                <!-- header section start-->
             @include('includes.header')
                <!-- header section end-->

                <div class="container-fluid">
                   
              <!--end row-->
                                          
                    @yield('content')
                </div><!--end container-->

                <!--footer section start-->
                <footer class="footer">
                    2018 &copy; Syntra.
                </footer>
                <!--footer section end-->
                <!-- Right Slidebar start -->
           
                <!--end Right Slidebar-->
            </div>
            <!--end body content-->
        </section>

        <!-- jQuery -->
        <script src="/Admin/assets/js/jquery-3.2.1.min.js"></script>
        <script src="/Admin/assets/js/popper.min.js"></script>
        <script src="/Admin/assets/js/bootstrap.min.js"></script>
        <script src="/Admin/assets/js/jquery-migrate.js"></script>
        <script src="/Admin/assets/js/modernizr.min.js"></script>
        <script src="/Admin/assets/js/jquery.slimscroll.min.js"></script>
        <script src="/Admin/assets/js/slidebars.min.js"></script>
        <!--plugins js-->
        <script src="/Admin/assets/plugins/counter/jquery.counterup.min.js"></script>
        <script src="/Admin/assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="/Admin/assets/plugins/sparkline-chart/jquery.sparkline.min.js"></script>
        <script src="/Admin/assets/pages/jquery.sparkline.init.js"></script>

        <script src="/Admin/assets/plugins/chart-js/Chart.bundle.js"></script>
        <script src="/Admin/assets/plugins/morris-chart/raphael-min.js"></script>
        <script src="/Admin/assets/plugins/morris-chart/morris.js"></script>
        <script src="/Admin/assets/pages/dashboard-init.js"></script>
        <script src="/Admin/assets/js/jquery.app.js"></script>
        <script src="/Adminjs/fontawesome.min.js"></script>

        <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
       
<script >

    if (window.location.hash) {
    var hash = window.location.hash;
    var element = document.querySelector(hash);
    
    if (element)
        element.scrollIntoView({
        behavior: "smooth",
        block: "nearest",
        inline: "start",
        });
        var app = angular.module('myapp', []);

        app.controller('mycontroller', function($scope, $http,$window) {
            $scope.logout=()=>{
                if(confirm('Bạn có muốn đăng xuất?')){
                    $window.location.href ="http://127.0.0.1:8000/login";
                }
                else
                {
                    return false;
                }
            }
        });
    }

</script>

</html>