<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Datetime;

class UserController extends Controller
{
    //
    public function index()
    {
        return Users::all();
    }
    public function get()
    {
        return Users::all();
    }
    public function show($id)
    {
        return Users::find($id);
    }
    public function destroy($id)
    {
        Users::destroy($id);
    }
    public function store(Request $request)
    {
        $db = new Users();
        $db->users_name    = $request->users_name;
        $db->full_name    = $request->full_name;
        $db->email    = $request->email;
        $db->password    = $request->password;
        $db->phone    = $request->phone;
        $db->updated_at    = new Datetime();
        $db->created_at = new Datetime();
        $db->save();
    }
    public function update(Request $request, $id)
    {
        $db =  Users::findOrFail($id);
        $db->users_name    = $request->users_name;
        $db->full_name    = $request->full_name;
        $db->email    = $request->email;
        $db->password    = $request->password;
        $db->phone    = $request->phone;
        $db->updated_at    = new Datetime();
        $db->created_at = new Datetime();
        $db->save();
    }
}
