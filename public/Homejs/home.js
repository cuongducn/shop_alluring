var app = angular.module('myapp', []);
app.controller('mycontroller', function($scope, $http) {
    var api ='http://127.0.0.1:8000/api/Lsp/';
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/Lsp"
    }).success(function(response) {
        $scope.lsp = response;
    });
   
    $scope.currentPage = 1;
    $scope.pageChangeHandler = function(num) {
            $scope.currentPage = num;
        };
    $scope.pageSize = 3;
    $scope.listSP = [];
    /*=================== Thao tác dữ liệu ==================================== */
    $scope.LoadCart = function () {
        $scope.listSP = JSON.parse(localStorage.getItem('cart'));
        console.log($scope.listSP);
    };
    $scope.nguoidung='';

    $scope.getus = [];
    $scope.getuser =()=>{
     $scope.getus = JSON.parse(sessionStorage.getItem('users'));
     if($scope.getus==null){
         $scope.nguoidung='';
     }
     else{
         $scope.nguoidung=$scope.getus.full_name;
     }
 }

 $scope.logout=function(){
     if(confirm('bạn có chắc muốn đăng xuất không')){
        sessionStorage.removeItem('users');
        $window.location.href = 'http://127.0.0.1:8000/login';
     }
     else{
       return false;
     }
 }
 $scope.getuser();

 $scope.data = {};
 $scope.data.bgColors = [];

 for (var i = 0; i < 10; i++) {
   $scope.data.bgColors.push("bgColor_" + i);
 }

 var setupSlider = function() {
   //some options to pass to our slider
   $scope.data.sliderOptions = {
     initialSlide: 0,
     direction: 'horizontal', //or vertical
     speed: 300, //0.3s transition
     loop: true
   };
 };

 setupSlider();
});