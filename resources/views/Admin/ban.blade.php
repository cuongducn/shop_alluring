@extends('Admin/_layout')
@section('content')





<p>
    <button class="btn btn-primary" ng-click="editClick(0)">Thêm mới</button>
</p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <!-- <th>id</th>
                <th>id Khách hàng</th> -->
            <th>tên Khách hàng</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <!-- <th>Payment</th> -->
            <th>Thông tin </th>
            <th>ghi chú</th>
            <th>Ngày tạo</th>
            <th>Cập nhật mới nhất</th>
            <th>Sua</th>
            <th>Xoa</th>
        </tr>
    </thead>
    <tbody>
        <tr dir-paginate="sp in bans |filter: search| itemsPerPage: pageSize" current-page="currentPage">
            <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
            <!-- <td>@{{ sp.id	}}</td>
                <td>@{{ sp.id_kh	 }}</td>  -->
            <td>@{{ sp.kh_name	 }}</td>
            <td>@{{ sp.date_order	 }}</td>
            <td>@{{ sp.tong_tien|number}}</td>
            <!-- <td>@{{ sp.payment}}</td> -->
            <td>@{{ sp.status	}}</td>
            <td>@{{ sp.note	}}</td>
            <td>@{{ sp.created_at| date:'yyyy-MM-dd' }}</td>
            <td>@{{ sp.updated_at| date:'yyyy-MM-dd' }}</td>


            <td><button class="btn btn-info" ng-click="editClick(sp.id)"><i class="fa fa-edit"></button></td>
            <td><button class="btn btn-danger" ng-click="deleteClick(sp.id)"><i class="fa fa-trash"></button></td>
            <td><button class="btn btn-danger" ng-click="getpro(sp.id);getinf(sp.id);modify(sp.id)"><i class="fa fa-eye"></button></td>

        </tr>
    </tbody>
</table>
<dir-pagination-controls max-size='5' on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>

<!-- Button trigger modal -->


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
                    <!-- <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">ID</label>
                            <div class="col-sm-9">

                                <input type="text" class="form-control" id="name" ng-model="ban.id">
                            </div>
                        </div> -->
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">ID Khách hàng</label>
                        <div class="col-sm-9">

                            <input type="text" class="form-control" id="name" ng-model="ban.id_kh">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Tên Khách hàng</label>
                        <div class="col-sm-9">

                            <input type="text" class="form-control" id="name" ng-model="ban.kh_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Ngày đặt hàng</label>
                        <div class="col-sm-9">

                            <input type="date" class="form-control" id="name" ng-model="ban.date_order">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Tổng Tiền</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" ng-model="ban.tong_tien">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Thanh toán</label>
                        <div class="col-sm-9">

                            <label for=""></label>
                            <select class="form-control" id="name" ng-model="ban.thanh_toan">
                                <option>On</option>
                                <option>OFF</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Trạng thái</label>
                        <div class="col-sm-9">

                            <label for=""></label>
                            <select class="form-control" id="name" ng-model="ban.status">
                                <option value="1">XÁC NHẬN</option>
                                <option value="0">HỦY XÁC NHẬN</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Note</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" ng-model="ban.note">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Created at</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="name" ng-model="ban.created_at" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Update at</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="name" ng-model="ban.updated_at">
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


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modelhd" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CHI TIẾT ĐƠN HÀNG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

                <div class="page-content container">
                    <div class="page-header text-blue-d2">
                        <h1 class="page-title text-secondary-d1">
                            Invoice
                            <small class="page-info">
                                <i class="fa fa-angle-double-right text-80"></i>
                                ID: #@{{ arrproducts.id }}
                            </small>
                        </h1>

                        <div class="page-tools">
                            <div class="action-buttons">
                                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                                    Print
                                </a>
                                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                                    Export
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="container px-0">
                        <div class="row mt-4">
                            <div class="col-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center text-150">
                                            <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                                            <span class="text-default-d3">FRESHFOOD.com</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- .row -->

                                <hr class="row brc-default-l1 mx-n1 mb-4" />

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                                            <span class="text-600 text-110 text-blue align-middle">@{{ arrproducts.kh_name}}</span>
                                        </div>
                                        <div class="text-grey-m2">
                                            <div class="my-1">
                                                @{{ arrproducts.name}}
                                            </div>
                                            <div class="my-1">
                                                State, Country
                                            </div>
                                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">111-111-111</b></div>
                                        </div>
                                    </div>
                                    <!-- /.col -->

                                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                        <hr class="d-sm-none" />
                                        <div class="text-grey-m2">
                                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                                Invoice
                                            </div>

                                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #@{{ arrproducts.id }}</div>

                                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span>@{{ arrproducts.date_order|date:'yyyy-MM-dd' }}</div>

                                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">@{{statuss}}</span></div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>

                                <div class="mt-4">
                                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                                        <div class="d-none d-sm-block col-1">STT</div>
                                        <div class="col-9 col-sm-5">Ghi chú</div>
                                        <div class="d-none d-sm-block col-6 col-sm-6">sản phẩm,số lượng</div>
                                    </div>

                                    <div class="text-95 text-secondary-d3">
                                        <div class="row mb-2 mb-sm-0 py-25">
                                            <div class="d-none d-sm-block col-1">@{{$index+1}}</div>
                                            <div class="col-9 col-sm-5"></div>
                                            <div  class="d-none d-sm-block col-6 text-95">@{{arrproducts.note}}</div>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-7 text-right">
                                                Tổng tiền

                                            </div>

                                        </div>
                                        <div class="col-7 text-right">
                                            <span class="text-120 text-secondary-d1">@{{arrproducts.tong_tien|number}}</span>
                                        </div>

                                    </div>
                                    <div class="row border-b-2 brc-default-l2"></div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                                <div class="col-7 text-right">
                                                </div>
                                                <div class="col-5">
                                                    <span class="text-150 text-success-d3 opacity-2"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <div>
                                        <span class="text-secondary-d1 text-105">Xác nhận đơn hàng</span>
                                        <a href="" ng-click="confirm(arrproducts.id)" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Xác nhận</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </tr>
                </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="remove()">Close</button>
                <button type="button" class="btn btn-primary" ng-click="splitstring()">Save</button>
            </div>
        </div>
    </div>
</div>



<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="/Adminjs/ban.js">

</script>
@stop
