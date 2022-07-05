var app = angular.module('myapp', []);

app.controller("mycontroller", function ($scope, $http,$location,$window) {
    var full_url = document.URL; // Get current url
    var url_array = full_url.split('/') // Split the string into an array with / as separator
    var last_segment = url_array[url_array.length-1];  // Get the last part of the array (-1)

    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/news"
    }).success(function(response) {
        console.log(response);
        $scope.news = response;
    })

    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/news"+last_segment,
    }).success(function(response) {
        console.log(response);
        $scope.new = response;
    })
  
    
});


// Show filtered elements
