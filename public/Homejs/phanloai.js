var app = angular.module("myapp", ['angularUtils.directives.dirPagination']);

app.controller("mycontroller", function ($scope, $http, $location) {
    $scope.filterSelection = function (c) {
        $(".hidesp").hide();
        $scope.pageSize = "";

        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") c = "";
        // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    };
    $scope.filterSelection("all");

    $scope.addclass = function (name) {
        if (name.id_loai_sp == 1) {
            return "Đồ ăn nhanh";
        } else if (name.id_loai_sp == 2) {
            return "Trái cây";
        } else if (name.id_loai_sp == "3") {
            return "Nấm";
        } else if (name.id_loai_sp == "4") {
            return "heo";
        } else if (name.id_loai_sp == "5") {
            return "bò";
        } else if (name.id_loai_sp == "6") {
            return "Nước ngọt";
        } else if (name.id_loai_sp == "7") {
            return "Rau xanh";
        } else if (name.id_loai_sp == "8") {
            return "Món chính";
        }
    };

    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/Lsp",
    }).success(function (response) {
        $scope.lsp = response;
    });

    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/sanphams/",
    }).success(function (response) {
        console.log(response);
        $scope.sanphams = response;
    });

    $scope.addToCart = function (sp) {
        let item = {};
        item.id = sp.id;
        item.name = sp.name;
        item.mota_sp = sp.mota_sp;
        item.picture = sp.picture;
        item.unit_price = sp.unit_price;
        item.image = sp.image;
        item.quantity = 1;
        var list;
        if (localStorage.getItem("cart") == null) {
            list = [item];
        } else {
            list = JSON.parse(localStorage.getItem("cart")) || [];
            let ok = true;
            for (let x of list) {
                if (x.id == item.id) {
                    x.quantity += 1;
                    ok = false;
                    break;
                }
            }
            if (ok) {
                list.push(item);
            }
        }
        localStorage.setItem("cart", JSON.stringify(list));
        alert("Đã thêm giở hàng thành công");
        $scope.product_count();
    };

    $scope.product_count = function () {
        var dem = 0;
        $scope.listSP = JSON.parse(localStorage.getItem("cart"));
        if ($scope.listSP == null) {
            return (dem = 0);
        } else {
            for (var i = 0; i < $scope.listSP.length; i++) {
                dem++;
            }
        }
        return dem;
    };

    $scope.sum = $scope.product_count();

    $scope.get_product = function (categori_Id) {
        return categori_Id;
        console.log(categori_Id);
    };


    $scope.search ="";
    $scope.currentPage = 1;
    $scope.pageChangeHandler = function(num) {
            $scope.currentPage = num;
        };
    $scope.pageSize = 24;


});

// Show filtered elements
function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
        }
    }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += "active";
    });
}
