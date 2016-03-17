<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Gallery;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function is_admin()
    {
        $users = DB::table('users')->where('admin','=',Auth::user()->id)->get();
        
        
        if (!$users) {
             return view('errors.503');
        }
        else
        {
       
          return view('admin.admin_view',['users' => $users]);
        }
    }
    public function permission_user(Request $request)
    {
        DB::table('users')->where('id',$request->input('id_user'))
        ->update(['upload_permission' =>  $request->input('upload_permission') ]);

        DB::table('users')->where('id',$request->input('id_user'))
        ->update(['download_permission' =>  $request->input('download_permission') ]);
      /*  $upload =  $request->input('upload_permission');
       DB::update("update users set upload_permission =".'yes'. " where id=?",
        [$request->input('id_user')]);*/
       //DB::table('users')->update(['download_permission'=> "no"]);

       return redirect()->back();

    }
    
    public function admin_view($id)
    {
        $galleries = Gallery::where('created_by', $id)->get();
        $users = User::findorFail($id);

        $admin = User::where('id',$id);
        if ($users->admin != Auth::user()->id) {
             return view('errors.503');
        }
       

        return view("admin.admin_view_gallery")
        ->with('galleries',$galleries)->with('users',$users);
    }
    public function admin_image_view($id)
    {
        $gallery = Gallery::findorFail($id);
        
        $users = User::findorFail($gallery->created_by);
          if ($users->admin != Auth::user()->id) {
             return view('errors.503');
        }
       

        return view('admin.admin_view_pics')
        ->with('gallery',$gallery);
    }
}
