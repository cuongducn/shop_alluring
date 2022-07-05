@extends('Admin/_layout')
@section('content')
<div class="container-fluid">
    <div class="page-head">
        <h4 class="mt-2 mb-2">Bảng tin</h4>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-sm-3">
                        <div class="widget-box bg-white m-b-30">
                            <div class="row d-flex align-items-center text-center">
                                <div class="col-4">
                                    <div class="text-center"><i class="ti ti-user"></i></div>
                                </div>
                                {{-- <div class="col-4">
                                    <div class="inlinesparkline">Đang tải..</div>
                                </div> --}}
                                <div class="col-4">
                                    <h2 class="m-0 counter">@{{count_customers}}</h2>
                                    <p>Khách hàng</p> 
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <div class="widget-box bg-white m-b-30">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <div class="text-center"><i class="ti ti-money"></i></div>
                                </div>
                                {{-- <div class="col-4">
                                    <div class="dynamicbar">Đang tải..</div>
                                </div> --}}
                                <div class="col-4">
                                    <h2 class="m-0 counter">@{{sum_salarys|number}}</h2>
                                    <p>Tổng doanh thu</p> 
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <div class="widget-box bg-white m-b-30">
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <div class="text-center"><i class="ti ti-wallet"></i></div>
                                </div>
                                {{-- <div class="col-4">
                                    <div class="inlinesparkline">Đang tải..</div>
                                </div> --}}
                                <div class="col-4">
                                    <h2 class="m-0 counter">@{{bill_count}}</h2>
                                    <p>Tổng số hóa đơn</p> 
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!--end row-->
        <div class="row">
            <div class="col-lg-9 col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h5 class="header-title pb-3">Tổng quan</h5>           
                        <div id="morris-line-chart" style="height: 360px;"></div>             
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">                                    
                        <div class="border-b pb-3 pt-1">
                            <div class="row d-flex align-items-center">
                                <div class="col-8">
                                    <h6 class="text-muted">Sheres</h6>
                                    <h3>1,503</h3>
                                </div>
                                <div class="col-4">
                                    <span class="pull-right linechart-2"></span>
                                </div>                                            
                            </div>
                        </div> 
                        <div class="border-b pb-3 pt-4">
                            <div class="row d-flex align-items-center">
                                <div class="col-8">
                                    <h6 class="text-muted">Clicks</h6>
                                    <h3>11,503</h3>
                                </div>
                                <div class="col-4">
                                    <span class="pull-right linechart"></span>
                                </div>                                            
                            </div>
                        </div>
                        <div class="border-b pb-3 pt-4">
                            <div class="row d-flex align-items-center">
                                <div class="col-8">
                                    <h6 class="text-muted">Virality</h6>
                                    <h3>3.55%</h3>
                                </div>
                                <div class="col-4">
                                    <span class="pull-right linechart-3"></span>
                                </div>                                            
                            </div>
                        </div>
                        <div class="pt-4">
                            <div class="row d-flex align-items-center">
                                <div class="col-8">
                                    <h6 class="text-muted">Counteries</h6>
                                    <h3>36</h3>
                                </div>
                                <div class="col-4">
                                    <span class="pull-right linechart-2"></span>
                                </div>                                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h5 class="header-title pb-3">Tổng quan</h5>           
                        <div id="morris-donut-chart"></div>              
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h5 class="header-title pb-3">Lợi nhuận</h5>           
                        <div id="morris-bar-chart"></div>              
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h5 class="header-title pb-3">Email đã gửi</h5>           
                        <div id="extra-area-chart"></div>              
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h5 class="header-title pb-3">Đơn gần đây</h5>           
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0">
                                        <thead>
                                            <tr>
                                                <th>Tên KH</th>
                                                <th>Mã đơn</th>
                                                <th>sđt</th>
                                                <th>Địa chỉ</th>
                                                <th>Ngày tạo</th>
                                                <th>Tổng thu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009/01/12</td>
                                                <td>$86,000</td>
                                            </tr>
                                            <tr>
                                                <td>Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012/03/29</td>
                                                <td>$433,060</td>
                                            </tr>
                                            <tr>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008/11/28</td>
                                                <td>$162,700</td>
                                            </tr>
                                            <tr>
                                                <td>Brielle Williamson</td>
                                                <td>Integration Specialist</td>
                                                <td>New York</td>
                                                <td>61</td>
                                                <td>2012/12/02</td>
                                                <td>$372,000</td>
                                            </tr>
                                            <tr>
                                                <td>Herrod Chandler</td>
                                                <td>Sales Assistant</td>
                                                <td>San Francisco</td>
                                                <td>59</td>
                                                <td>2012/08/06</td>
                                                <td>$137,500</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>
            </div>

            
        </div>                            
        
    </div><!--end container-->


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

<script src="/Adminjs/thongke.js"></script>
@stop
