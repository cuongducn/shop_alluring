var app = angular.module("myapp", []);

app.controller("mycontroller", function ($scope, $http, $window) {
    $scope.listSP = [];

    var api = "http://127.0.0.1:8000/api/sanphams/";

    //     $scope.slideIndex = 1;

    //     $scope.plusDivs=(n)=>{
    //       $scope.showDivs(slideIndex += n);
    //     }

    //    $scope.showDivs = function(n) {
    //       var i;
    //       var x = document.getElementsByClassName("slider-img");
    //       if (n > x.length) {slideIndex = 1}
    //       if (n < 1) {$scope.slideIndex = x.length} ;
    //       for (i = 0; i < x.length; i++) {
    //         x[i].style.display = "none";
    //       }
    //       x[$scope.slideIndex-1].style.display = "inline-block";

    //     }
    //     $scope.showDivs($scope.slideIndex);

    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/Lsp",
    }).success(function (response) {
        $scope.lsp = response;
    });
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/news",
    }).success(function (response) {
        $scope.news = response;
    });
    $http({
        Method: "GET",
        url: api,
    }).success(function (response) {
        $scope.sanphams = response;
    });
    /*=================== Thao tác dữ liệu ==================================== */

    $scope.currentPage = 1;
    $scope.pageChangeHandler = function (num) {
        $scope.currentPage = num;
    };
    $scope.pageSize = 10;

    $scope.nguoidung = "";
    $scope.getus = [];
    $scope.getuser = () => {
        $scope.getus = JSON.parse(sessionStorage.getItem("users"));
        if ($scope.getus == null) {
            $scope.nguoidung = "";
        } else {
            $scope.nguoidung = $scope.getus.full_name;
        }
    };
    $scope.getuser();

    $scope.logout = function () {
        if (confirm("bạn có chắc muốn đăng xuất không")) {
            sessionStorage.removeItem("users");
            $window.location.href = "http://127.0.0.1:8000/login";
        } else {
            return false;
        }
    };
})
    .directive("owlCarousel", function () {
        return {
            restrict: "E",
            transclude: false,
            link: function (scope) {
                scope.initCarousel = function (element) {
                    // provide any default options you want
                    var defaultOptions = {};
                    var customOptions = scope.$eval(
                        $(element).attr("data-options")
                    );
                    // combine the two options objects
                    for (var key in customOptions) {
                        defaultOptions[key] = customOptions[key];
                    }
                    // init carousel
                    $(element).owlCarousel(defaultOptions);
                };
            },
        };
    })
    .directive("owlCarouselItem", [
        function () {
            return {
                restrict: "A",
                transclude: false,
                link: function (scope, element) {
                    // wait for the last item in the ng-repeat then call init
                    if (scope.$last) {
                        scope.initCarousel(element.parent());
                    }
                },
            };
        },
    ]);
