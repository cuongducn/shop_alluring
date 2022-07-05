var app = angular.module("myapp", ["angularUtils.directives.dirPagination"]);
app.controller("mycontroller", function ($scope, $http) {
    var api = "http://127.0.0.1:8000/api/sanphams/";
    $http({
        Method: "GET",
        // url: "http://127.0.0.1:8000/api/sanphams",
        url: "https://localhost:7299/api/Products",
    }).success(function (response) {
        $scope.sanphams = response;
    });
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/Lsp",
    }).success(function (response) {
        $scope.lsp = response;
    });
    // $http({
    //     Method: "GET",
    //     url: "https://localhost:7299/api/Products",
    // }).success(function (response) {
    //     console.log(response);
    //     $scope.testPduct = response;
    // });
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/Nhaccs",
    }).success(function (response) {
        console.log(response);
        $scope.nhaccs = response;
    });

    $scope.logout = () => {
        if (confirm("Bạn có muốn đăng xuất?")) {
            window.location.href = "http://127.0.0.1:8000/login";
        } else return false;
    };

    $scope.load = () => {
        $http({
            Method: "GET",
            // url: "http://127.0.0.1:8000/api/sanphams",
            url: "https://localhost:7299/api/Products",
        }).success(function (response) {
            console.log(response);
            $scope.sanphams = response;
        });
    };
    $scope.currentPage = 1;
    $scope.pageChangeHandler = function (num) {
        $scope.currentPage = num;
    };
    $scope.pageSize = 3;

    $scope.editClick = function (id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Them moi ban tin";
            // $scope.sanpham._token = CSRF_TOKEN;
            if ($scope.sanpham) {
                delete $scope.sanpham;
            }
        } else {
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/sanphams/" + id,
            }).success(function (response) {
                $scope.sanpham = response;
                var t = response.mota_sp;
                // document.getElementById('fileImage').value = response.image;
                CKEDITOR.instances.ckeditor1.insertHtml(t);
            });
            $scope.modalTitle = "Sua ban tin";
        }
        $("#modelId").modal("show");
    };
    const fileUpload = document.querySelector("#fileImage");
    fileUpload.addEventListener("change", (e) => {
        const files = e.target.files;
        document.getElementById("Anh").innerHTML =
            `<img src="/images/products/product/` +
            files[0].name +
            `" alt="Ảnh" style="width:100%;height:100%">`;
        for (const file of files) {
            const { name, type, size, lastModified } = file;
            // Làm gì đó với các thông tin trên
            document.getElementById("Anh").innerHTML =
                `<img src="/images/products/product/` +
                file.name +
                `" alt="Ảnh" style="width:100%;height:100%">`;
        }
    });
    $scope.updateData = function () {
        const fileUpload = document.getElementById("fileImage");
        var editor_data = CKEDITOR.instances.ckeditor1.document
            .getBody()
            .getText();

        $scope.sanpham = {
            name: $scope.sanpham.name,
            id_loai_sp: $scope.sanpham.id_loai_sp,
            id_ncc: $scope.sanpham.id_ncc,
            unit_price: $scope.sanpham.unit_price,
            mota_sp: editor_data,
            don_vi_tinh: $scope.sanpham.don_vi_tinh,
            so_luong: $scope.sanpham.so_luong,
            image: fileUpload.files[0].name,
            created_at: $scope.sanpham.created_at,
            updated_at: $scope.sanpham.updated_at,
        };
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? api : api + $scope.id;
        $scope.txt = $scope.id == 0 ? "THÊM" : "SỬA";
        $http({
            method: m,
            url: url,
            data: $scope.sanpham,
            headers: { "Content-Type": "application/json" },
        }).success(function (response) {
            console.log(response);
            $("#ignismyModal").modal("show");
            $scope.load();
            $("#modelId").modal("hide");
        });
    };

    $scope.deleteClickk = function (id) {
        var xacnhan = confirm("Ban co muon xoa that khong?");
        if (xacnhan) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/sanphams/" + id,
                data: $scope.sanpham,
                headers: { "Content-Type": "application/json" },
            }).success(function (response) {
                console.log(response);
                $scope.load();
            });
            alert("Xóa thành công");
        } else {
            alert("Ban da huy lenh xoa");
        }
    };
    $scope.search = "";
    $scope.currentPage = 1;
    $scope.pageChangeHandler = function (num) {
        $scope.currentPage = num;
    };
    $scope.pageSize = 10;
});
