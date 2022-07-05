// var app = angular.module("myapp", []);
app.controller("myCartcontroller", function ($scope, $http, $window) {
    $scope.listSP = [];
    $scope.account = [];
    $scope.array_product = [];

    /*=================== Thao tác dữ liệu ==================================== */
    $scope.LoadCart = function () {
        $scope.listSP = JSON.parse(localStorage.getItem("cart"));
    };
    // $scope.LoadCart();

    const formatMonneyVN = (m) => {
        return (m + "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

    const rerenderCart = () => {
        $scope.LoadCart();
        if ($scope.listSP) {
            const listProduct = document.querySelector(".list-product");
            listProduct.innerHTML = "";
            for (var i = 0; i < $scope.listSP.length; i++) {
                const newLi = document.createElement("li");
                newLi.classList.add("ng-scope");
                newLi.setAttribute("ng-repeat", "item in listSP");
                newLi.innerHTML = `
                <a class="product_thumbnail" href="" style="background-image: url('../../images/products/product/${
                    $scope.listSP[i].image
                }');"></a>
                <div>
                    <h6>${$scope.listSP[i].name}</h6>
                    <span class="product_variation">Trắng 0</span>
                    <div class="price">
                        <p>${formatMonneyVN($scope.listSP[i].unit_price)} ₫</p>
                        <p class="discount"></p>
                        <div class="add_product" ng-controller="myCartcontroller">
                            <div class="decrease" ng-click="Giam(${i})">-</div>
                            <input type="number" value="${
                                $scope.listSP[i].quantity
                            }">
                            <div class="increase" ng-click="Tang(${i})">+</div>
                        </div>
                    </div>
                </div>
                <div class="clear_product">
                    <svg ng-click=remove(item) id="close_nav" class="icon-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M23.707.293h0a1,1,0,0,0-1.414,0L12,10.586,1.707.293a1,1,0,0,0-1.414,0h0a1,1,0,0,0,0,1.414L10.586,12,.293,22.293a1,1,0,0,0,0,1.414h0a1,1,0,0,0,1.414,0L12,13.414,22.293,23.707a1,1,0,0,0,1.414,0h0a1,1,0,0,0,0-1.414L13.414,12,23.707,1.707A1,1,0,0,0,23.707.293Z">
                        </path>
                    </svg>
                </div> `;
                listProduct.appendChild(newLi);
            }
        }
    };

    $scope.product_count = function () {
        var dem = 0;
        $scope.listSP = JSON.parse(localStorage.getItem("cart"));
        if ($scope.listSP == null) {
            dem = 0;
        } else {
            for (var i = 0; i < $scope.listSP.length; i++) {
                dem++;
            }
        }
        $scope.sum = dem;
    };

    $scope.updateAmount = function () {
        $scope.product_count();
        const amountCart = document.querySelector(".amount-cart");
        amountCart.innerHTML = $scope.sum;
    };
    $scope.totalAndAmountCart = function () {
        $scope.updateAmount();
        $scope.totalprice();
        const totalCart = document.querySelectorAll(".total-cart");
        totalCart[0].querySelectorAll(".cart-purchase_main")[0].innerHTML =
            formatMonneyVN($scope.total) + " ₫";

        // rerenderCart();
    };
    // $scope.totalAndAmountCart();

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
        $scope.totalAndAmountCart();
    };

    $scope.Giam = function (item) {
        var index = $scope.listSP.indexOf(item);
        if (index >= 0 && $scope.listSP[index].quantity >= 2) {
            $scope.listSP[index].quantity -= 1;
        }
        localStorage.setItem("cart", JSON.stringify($scope.listSP));
        $scope.totalAndAmountCart();
    };
    $scope.removeSP = function () {
        localStorage.removeItem("cart");
    };
    // $scope.check = () => {
    //     $scope.account = JSON.parse(sessionStorage.getItem("user"));
    //     console.log($scope.account);
    // };
    // $scope.check();
    $scope.totalAndAmountCart();

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
        $scope.totalAndAmountCart();
    };
    $scope.addproduct = function () {
        $scope.listSP = JSON.parse(localStorage.getItem("cart"));
        if ($scope.listSP == null) {
            return $scope.array_product;
        } else {
            for (var i = 0; i < $scope.listSP.length; i++) {
                $scope.array_product.push[
                    $scope.listSP[i].name + ":" + $scope.listSP[i].quantity
                ];
            }
        }
        return $scope.array_product;
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
            note: $scope.addproduct(),
        };
        $http({
            method: "POST",
            url: "http://127.0.0.1:8000/api/billbans",
            data: $scope.ban,
            headers: { "Content-Type": "application/json" },
        }).success(function (response) {
            $scope.removeSP();
            $scope.LoadCart();
        });
    };
});
