@extends('Admin/_layout')
@section('content')

    <p>
        <button class="btn btn-primary" ng-click="editClick(0)">THÊM MỚI</button>
    </p>
    <table class="table table-bordered" id="myTable">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <!-- <th>Id Loai sp</th>
                <th>Id nha cung cap</th> -->
                <!-- <th>Mota</th> -->
                <th>Đơn giá</th>
                <th>SL</th>
                <th>Ảnh</th>
                <th>Giới tính</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody >
            <tr dir-paginate="sp in sanphams |filter: search|orderBy:'-created_at'| itemsPerPage: pageSize" current-page="currentPage">
                <td>@{{ sp.productName }}</td>
                <!-- <td>@{{ sp.id_loai_sp }}</td>
                <td>@{{ sp.id_ncc }}</td> -->
                <!-- <td>@{{ sp.mota_sp }}</td> -->
                <td>@{{ sp.price|number }}</td>
                <td>@{{ sp.quantity }}</td>
                <td><img src="/images/products/product/@{{ sp.image }}" class="img-fluid" style="width:120px;height:150px"></td>
                <td>@{{ sp.gender == true ? "Male" : "Female" }}</td>
                <td><button class="btn btn-info " ng-click="editClick(sp.id)"><i class="fa fa-edit"></button></td>
                <td><button class="btn btn-danger" ng-click="deleteClickk(sp.id)"><i class="fa fa-trash"></button></td>
            </tr>
        </tbody>
       
    </table>
    <dir-pagination-controls max-size='5'id="abuttonv" class="admin-pagination_product" on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
    <!-- Button trigger modal -->

</dir-pagination-controls>
  

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">@{{modalTitle}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                  
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Tên Sản Phẩm</label>
                            <div class="col-sm-9">

                              <input type="text" class="form-control" id="name" ng-model="sanpham.name">
                            </div>
                          </div>
                       
                         <div class="form-group">
                           <label for="lsp">Loại SP</label>
                           <select class="form-control" name="" id="lsp" ng-model="sanpham.id_loai_sp">
                             <option ng-repeat="lsp in lsp" value="@{{lsp.id}}">@{{lsp.tenloai}}</option>
                           </select>
                         </div>
                         <div class="form-group">
                           <label for="lsp">Nhà Cung cấp</label>
                           <select class="form-control" name="" id="lsp" ng-model="sanpham.id_ncc">
                             <option ng-repeat="lsp in nhaccs" value="@{{lsp.id}}">@{{lsp.ten_ncc}}</option>
                           </select>
                         </div>
                        <!-- <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Id Nhà cung cấp</label>
                            <div class="col-sm-9">

                                <input type="text" class="form-control"ng-model="sanpham.id_ncc">
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Mô tả</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="ckeditor1" ng-model="sanpham.mota_sp">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Gía</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="sanpham.unit_price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Số lượng</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="sanpham.so_luong">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Ảnh</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="fileImage" ng-model="sanpham.image" value="">
                                <div style="width:100px;height:100px" id="Anh">
                                <img src="/images/products/product/@{{sanpham.image}}" alt="Ảnh" style="width:100%;height:100%" ng-model="sanpham.image">
                            </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Đơn vị tính</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="sanpham.don_vi_tinh">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Ngày sản xuất</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="name" ng-model="sanpham.created_at">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Hạn sử dụng</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="name" ng-model="sanpham.updated_at">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="updateData()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
        });
        
     CKEDITOR.replace('ckeditor1');
        
    </script>
   
    <script src="/Adminjs/sanphamcontroller.js"></script>


@stop