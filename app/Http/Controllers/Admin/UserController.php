<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class UserController extends Controller
{
    public function index(){
        $data=[
            'title'=>'User'
        ];
        return view('admin.user.index',$data);
    }
}