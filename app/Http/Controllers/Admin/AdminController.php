<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function Index(Request $request)
    {
        return view('Admin/index');
    }
    function  Category(Request $request)
    {
        return view('Admin/Categories');
    }
    function Product(Request $request)
    {
        return view('Admin/product');
    }

    function News(Request $request)
    {
        return view('Admin/new');
    }

    function Purchase(Request $request)
    {
        return view('Admin/Nhap');
    }

    function Sales(Request $request)
    {
        return view('Admin/ban');
    }

    function SaleDetail(Request $request)
    {
        return view('Admin/cban');
    }

    function PurchaseDetail(Request $request)
    {
        return view('Admin/cnhap');
    }
    function Feedback(Request $request)
    {
        return view('Admin/Phanhoi');
    }
    function Customers(Request $request)
    {
        return view('Admin/Khachhang');
    }
    function Suppliers(Request $request)
    {
        return view('Admin/NhaCC');
    }
    function Employees(Request $request)
    {
        return view('Admin/nhanvien');
    }
    function Slides(Request $request)
    {
        return view('Admin/slide');
    }
    function Users(Request $request)
    {
        return view('Admin/Users');
    }
    function Statistical(Request $request)
    {
        return view('Admin/Thongke');
    }
}
