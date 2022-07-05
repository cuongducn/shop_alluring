// var app = angular.module('myapp', []);

app.controller(
    "myDetailcontroller",
    function ($scope, $http, $location, $window) {
        var full_url = document.URL; // Get current url
        var url_array = full_url.split("/"); // Split the string into an array with / as separator
        var last_segment = url_array[url_array.length - 1]; // Get the last part of the array (-1)

        // $http({
        //     Method: "GET",
        //     url: "http://127.0.0.1:8000/api/news",
        // }).success(function (response) {
        //     console.log(response);
        //     $scope.news = response;
        // });
        // $http({
        //     Method: "GET",
        //     url: "http://127.0.0.1:8000/api/news/" + last_segment,
        // }).success(function (response) {
        //     $scope.new = response;
        // });

        $scope.filterSelection = function (c) {
            $(".hidesp").hide();
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
            } else if (name.id_loai_sp == "8") {
                return "Bánh ngọt";
            }
        };

        // $http({
        //     Method: "GET",
        //     url: "http://127.0.0.1:8000/api/Lsp",
        // }).success(function (response) {
        //     $scope.lsp = response;
        // });
        $scope.capnhat = () => {
            $window.location.reload();
        };

        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/sanphams/" + last_segment,
        }).success(function (response) {
            $scope.sanpham = response;
        });

        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/sanphams/",
        }).success(function (response) {
            $scope.sanphams = response;
        });

        $scope.quantity = 1;
        $scope.increase = () => {
            $scope.quantity++;
        };
        $scope.reduction = () => {
            $scope.quantity--;
        };
        $scope.addToCart = function (sp) {
            let item = {};
            item.id = sp.id;
            item.name = sp.name;
            item.mota_sp = sp.mota_sp;
            item.picture = sp.picture;
            item.unit_price = sp.unit_price;
            item.image = sp.image;
            item.quantity = $scope.quantity;

            var list;
            if (localStorage.getItem("cart") == null) {
                list = [item];
            } else {
                list = JSON.parse(localStorage.getItem("cart")) || [];
                let ok = true;
                for (let x of list) {
                    if (x.id == item.id) {
                        x.quantity += $scope.quantity;
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
        $scope.LoadCart = function () {
            $scope.listSP = JSON.parse(localStorage.getItem("cart"));
        };

        $scope.LoadCart();
        $scope.product_count = function () {
            var dem = 0;
            $scope.listSP = JSON.parse(localStorage.getItem("cart"));
            if ($scope.listSP == null) {
                return 0;
            } else {
                for (var i = 0; i < $scope.listSP.length; i++) {
                    dem++;
                }
            }
            return dem;
        };

        $scope.sum = $scope.product_count();

        $scope.totalprice = function () {
            $scope.total = 0;
            $scope.listSP = JSON.parse(localStorage.getItem("cart"));
            if ($scope.listSP == null) {
                return ($scope.total = 0);
            } else {
                for (var i = 0; i < $scope.listSP.length; i++) {
                    $scope.total +=
                        $scope.listSP[i].quantity * $scope.listSP[i].unit_price;
                }
            }
            return $scope.total;
        };

        $scope.totalprice();
        $scope.remove = function (item) {
            var index = $scope.listSP.indexOf(item);
            if (confirm("Bạn có muốn xóa sản phẩm này khỏi giỏ hàng ?")) {
                $scope.listSP.splice(index, 1);
                alert("Xóa thành công");
            } else {
                return false;
            }
            localStorage.setItem("cart", JSON.stringify($scope.listSP));
        };
        $scope.Tang = function (item) {
            var index = $scope.listSP.indexOf(item);
            if (index >= 0) {
                $scope.listSP[index].quantity += 1;
            }
            localStorage.setItem("cart", JSON.stringify($scope.listSP));
        };

        $scope.Giam = function (item) {
            var index = $scope.listSP.indexOf(item);
            if (index >= 0 && $scope.listSP[index].quantity >= 2) {
                $scope.listSP[index].quantity -= 1;
            }
            localStorage.setItem("cart", JSON.stringify($scope.listSP));
        };
        $scope.removeSP = function () {
            localStorage.removeItem("cart");
        };
        $scope.reloadcart = function () {
            location.reload();
        };

        $scope.getdate = function () {
            var d = new Date();
            d = new Date(d.getTime() - 3000000);
            var date_format_str =
                d.getFullYear().toString() +
                "-" +
                ((d.getMonth() + 1).toString().length == 2
                    ? (d.getMonth() + 1).toString()
                    : "0" + (d.getMonth() + 1).toString()) +
                "-" +
                (d.getDate().toString().length == 2
                    ? d.getDate().toString()
                    : "0" + d.getDate().toString()) +
                " " +
                (d.getHours().toString().length == 2
                    ? d.getHours().toString()
                    : "0" + d.getHours().toString()) +
                ":" +
                ((parseInt(d.getMinutes() / 5) * 5).toString().length == 2
                    ? (parseInt(d.getMinutes() / 5) * 5).toString()
                    : "0" + (parseInt(d.getMinutes() / 5) * 5).toString()) +
                ":00";
            console.log(date_format_str);
            return date_format_str;
        };

        $scope.infomation = function () {
            $scope.info = " ";
            $scope.listSP = JSON.parse(localStorage.getItem("cart"));
            if ($scope.listSP == null) {
                return ($scope.info = " ");
            } else {
                for (var i = 0; i < $scope.listSP.length; i++) {
                    $scope.info +=
                        $scope.listSP[i].name +
                        ":" +
                        $scope.listSP[i].quantity +
                        ";";
                }
            }
            return $scope.info;
        };
        //Xử lí đăng nhập
        $scope.updateData = function () {
            let r = Math.floor(Math.random() * 1001);
            $scope.ban = {
                id_kh: r,
                kh_name: $scope.ban.kh_name,
                tong_tien: $scope.totalprice(),
                date_order: $scope.getdate(),
                payment: "on",
                status: "0",
                address: $scope.ban.address,
                note: $scope.infomation(),
            };
            $http({
                method: "POST",
                url: "http://127.0.0.1:8000/api/billbans",
                data: $scope.ban,
                headers: { "Content-Type": "application/json" },
            }).success(function (response) {
                $scope.removeSP();
                alert("THANH TOÁN THÀNH CÔNG");
                $scope.LoadCart();
            });
        };
        $scope.addproduct = function () {
            $scope.listSP = JSON.parse(localStorage.getItem("cart"));
            if ($scope.listSP == null) {
                return ($scope.array_product = []);
            } else {
                for (var i = 0; i < $scope.listSP.length; i++) {
                    $scope.array_product.push(
                        $scope.listSP[i].name + ":" + $scope.listSP[i].quantity
                    );
                }
            }
            return $scope.array_product;
        };
        $scope.get_product = function (categori_Id) {
            return categori_Id;
            console.log(categori_Id);
        };

        $scope.account = [];
        $scope.checkbill = () => {
            $scope.account = JSON.parse(sessionStorage.getItem("users"));
            if ($scope.account == null) {
                alert("hay dang nhap truoc");
                $("#modelId").modal("show");
                return false;
            } else {
                $window.location.href = "http://127.0.0.1:8000/invoice";
            }
        };

        // $http({
        //     Method: "GET",
        //     url: "http://127.0.0.1:8000/api/Users",
        // }).success(function (response) {
        //     console.log(response);
        //     $scope.users = response;
        //     localStorage.setItem("user", JSON.stringify($scope.users));
        // });

        $scope.userarr = [];

        $scope.check = (user, pass) => {
            $scope.userarr = JSON.parse(localStorage.getItem("user"));
            for (var i = 0; i < $scope.userarr.length; i++) {
                if (
                    $scope.userarr[i].users_name == user &&
                    $scope.userarr[i].password == pass
                ) {
                    return $scope.userarr[i];
                }
            }
            return false;
        };
        $scope.login = () => {
            var check = $scope.check($scope.username, $scope.password);
            console.log(check);
            if (check) {
                sessionStorage.setItem("users", JSON.stringify(check));
                $window.location.href = "http://127.0.0.1:8000/invoice";
            } else {
                alert("Hãy nhập đủ thông tin");
                return false;
            }
        };
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
    }
);

// Show filtered elements
