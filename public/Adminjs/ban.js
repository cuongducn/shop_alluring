var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('mycontroller', function($scope, $http) {
    var api = 'http://127.0.0.1:8000/api/billbans/';
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/billbans"
    }).success(function(response) {
        console.log(response);
        $scope.bans = response;
      localStorage.setItem('items',JSON.stringify($scope.bans));

    });
  $scope.load=()=>{
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/billbans"
    }).success(function(response) {
        console.log(response);
        $scope.bans = response;
    });
  }
    $scope.editClick = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Them moi ban tin";
            // $scope.sanpham._token = CSRF_TOKEN;
            if ($scope.ban){
             delete $scope.ban;
            }
        } else {
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/billbans/" + id
            }).success(function(response) {
                $scope.ban = response;
                // $scope.sanpham._token = CSRF_TOKEN;
            });
            $scope.modalTitle = "Sua ban tin";
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var m = $scope.id==0?"POST":"PUT";
        var url = $scope.id==0?api:api+$scope.id;
        $scope.txt = $scope.id==0?"THÊM":"SỬA";
        $http({
            method: m,
            url: url,
            data: $scope.ban,
            headers: { 'Content-Type': 'application/json' }
        }).success(function(response) {
            $scope.load();
            $('#modelId').modal('hide');
            $('#ignismyModal').modal('show');
        });

    }
    $scope.deleteClick = function(id) {
        var xacnhan = confirm("Ban co muon xoa that khong?");
        if (xacnhan) {
            $scope.txt = "XÓA"
        $http({
            method: "DELETE",
            url: "http://127.0.0.1:8000/api/billbans/" +id,
            data: $scope.ban,
            headers: { 'Content-Type': 'application/json' }
        }).success(function(response) {
            $scope.load();
        }); 
        $('#ignismyModal').modal('show');

    } else {
        alert("Ban da huy lenh xoa");
    }
    }
    $scope.currentPage = 1;
    $scope.pageChangeHandler = function(num) {
            $scope.currentPage = num;
        };
    $scope.pageSize = 10;
    $scope.showbill=(id)=>{
          $('#modelhd').modal('show');
          $scope.id = id;
          $http({
              Method: "GET",
              url: "http://127.0.0.1:8000/api/billbans/" + id
          }).success(function(response) {
              $scope.detailban = response;
              localStorage.setItem('items',JSON.stringify($scope.detailban));
          });
      }
      $scope.arrproduct = [] ;
      $scope.arrproducts = [] ;
      $scope.arrproduct2 = JSON.parse(localStorage.getItem('items')) ;


    $scope.getinf= function(id){
        $('#modelhd').modal('show');
        $scope.arrproduct = JSON.parse(localStorage.getItem('items'));
        for(var i=0;i<$scope.arrproduct.length;i++){
              if($scope.arrproduct[i].id==id){
               return $scope.arrproducts = $scope.arrproduct[i];
             }
        }
    }
    $scope.getpro= function(id){
        $('#modelhd').modal('show');
        $scope.arrproduct = JSON.parse(localStorage.getItem('items'));
        for(var i=0;i<$scope.arrproduct.length;i++){
            if($scope.arrproduct[i].id==id){
                if($scope.arrproduct[i].status=='0'){
                    return $scope.statuss ="Chưa xác nhận";
                }
                else {
                    return $scope.statuss ="Đã xác nhận";
                }
           }
      }
        // for(var i=0;i<$scope.arrproduct.length;i++){
        //       if($scope.arrproduct[i].id==id){
        //        return $scope.arrproducts = $scope.arrproduct[i];
        //      }
        // }
       
    }
    $scope.modify = function(id) {
        $scope.id = id;
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/billbans/" + id
            }).success(function(response) {
                $scope.ban = response;
                // $scope.sanpham._token = CSRF_TOKEN;
            });
    }
    $scope.confirm= function(id){
        $scope.id = id;
        var urls = 'http://127.0.0.1:8000/api/billbans/'+$scope.id;
        $scope.ban={
              id_kh :$scope.ban.id_kh,
              tong_tien :$scope.ban.tong_tien,
              payment :$scope.ban.payment,
              status :'1',
              note :$scope.ban.note,
              kh_name:$scope.ban.kh_name,
              address:$scope.ban.address
        }
        $scope.ban.status ='1';
        $http({
            method: 'PUT',
            url: urls,
            data: $scope.ban,
            headers: { 'Content-Type': 'application/json' }
        }).success(function(response) {
            $('#modelhd').modal('hide');
            $scope.load();
             $('#img-message').attr('src','/upload/images/car.jpg');
             $('#img-message').css({ 'height': '100px', 'width': '300px' });
             $scope.txt ="XÁC NHẬN ĐƠN HÀNG";
             $('#ignismyModal').modal('show');
        });

    }
    $scope.loadpage=function()
    {
        history.go(0);
    }
    $scope. onFunctionClick =(getURL)=>{
        window.location=getURL;
      }
});

