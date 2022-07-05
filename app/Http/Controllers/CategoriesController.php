<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use \Datetime;
class CategoriesController extends Controller
{
    //
   public function index(){
    $data = Categories::all();
    return json_encode($data);
   }
   public function getall(){
       return Categories::all();
   }
   public function show($id){
    return Categories::find($id);
   }
   public function update(Request $request,$id){
     $db  = Categories::findOrFail($id);
    //  $db->id = $request->id;
     $db->tenloai = $request->tenloai;
     $db->tenloai = $request->tenloai;
     $db->anh = $request->anh;
     $db->created_at = $request->created_at;
     $db->updated_at = $request->updated_at;
     $db->save();
     return $db;
   }
   public function destroy($id){
       Categories::destroy($id);
   }
   public function store(Request $request){
       $db = new Categories();
       $db->tenloai = $request->tenloai;
       $db->anh = $request->anh;
       $db->created_at = new Datetime();
       $db->updated_at = new Datetime();
       $db->save();
       return $db;
   }
}
