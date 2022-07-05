var app = angular.module('myapp', []);

app.controller('mycontroller', function($scope, $http) {
    
     $scope.hoadon = JSON.parse(localStorage.getItem('items'));
     $scope.khach = JSON.parse(localStorage.getItem('khachs'));

     $scope.tkhoadon =()=>{
          var sum =0;
         for (var index = 0; index < $scope.hoadon.length; index++) {
             sum++;
         }
         return sum;
     }
     $scope.sum_salary =()=>{
        var sum =0;
       for (var index = 0; index < $scope.hoadon.length; index++) {
           sum+=$scope.hoadon[index].tong_tien;
       }
       return sum;
   }
   $scope.count_customer =()=>{
    var sum =0;
     for (var index = 0; index < $scope.khach.length; index++) {
       sum++;
      }
        return sum;
    }  
     $scope.bill_count = $scope.tkhoadon();
     $scope.sum_salarys = $scope.sum_salary();
     $scope.count_customers = $scope.count_customer();


});