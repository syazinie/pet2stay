<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Testimonial;
use Cookie;
use File;
use Storage;
use Validator;


class AdminController extends Controller
{
    // Login
    function login(){
        return view('login');
    }
    // Check Login
    function check_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        $admin=Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->count();
        if($admin>0){
            $adminData=Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->first();
            $admin_id = $adminData->id;
          
            session(['adminData'=>$adminData, 'admin_id'=>$admin_id]);

            if($request->has('rememberme')){
                Cookie::queue('adminuser',$request->username,1440);
                Cookie::queue('adminpwd',$request->password,1440);
            }

            return redirect('admin');
        }else{
            return redirect('admin/login')->with('msg','Invalid username/Password!!');
        }
    }
    // Logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }

    function dashboard(){
        $bookings=Booking::selectRaw('count(id) as total_bookings,checkin_date')->groupBy('checkin_date')->get();
        $labels=[];
        $data=[];
        foreach($bookings as $booking){
            $labels[]=$booking['checkin_date'];
            $data[]=$booking['total_bookings'];
        }

        // For Pie Chart
        $rtbookings=DB::table('room_types as rt')
            ->join('rooms as r','r.room_type_id','=','rt.id')
            ->join('bookings as b','b.room_id','=','r.id')
            ->select('rt.*','r.*','b.*',DB::raw('count(b.id) as total_bookings'))
            ->groupBy('r.room_type_id')
            ->get();
        $plabels=[];
        $pdata=[];
        foreach($rtbookings as $rbooking){
            $plabels[]=$rbooking->detail;
            $pdata[]=$rbooking->total_bookings;
        }
        // End

        // echo '<pre>';
        // print_r($rtbookings);

        return view('dashboard',['labels'=>$labels,'data'=>$data,'plabels'=>$plabels,'pdata'=>$pdata]);
    }

    public function testimonials()
    {
        $data=Testimonial::all();
        return view('admin_testimonials',['data'=>$data]);
    }

    public function destroy_testimonial($id)
    {
       Testimonial::where('id',$id)->delete();
       return redirect('admin/testimonials')->with('success','Data has been deleted.');
    }


    public function admin_forgot_pass(){

        return view('admin_forgot_pass');

    }

    public function admin_find_username(Request $request){

        $find_admin = Admin::where('username', $request->username)->first();

        if(empty($find_admin)){
            
            return redirect()->back()->with('msg', "Username Not Registered !");

        }
        else{

            return view('admin_reset_pass')->with('admin', $find_admin);

        }

    }

    public function admin_submit_reset(Request $request){

        // dd($request);

        $find_admin = Admin::find($request->admin_id);

        // dd($find_admin);

        $find_admin->update([
            'password'=>sha1($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', "Admin Password successfully reset !");

    }

    public function admin_edit_profile($id){

        $find_admin = Admin::find($id);

        return view('admin_edit_profile')->with('admin', $find_admin);

    }

    public function admin_update_profile(Request $request){

        $admin = Admin::find($request->admin_id);

        if($admin->photo != null){
            // check file exist and remove
            $path = public_path() . '/archieve/admin/'.$admin->photo;
        
            if(file_exists($path)){
    
                unlink($path);
    
            }
            else{
                
            }
            
        }

        $request->validate([
            'profile_pic' => 'required|mimes:jpg,jpeg,png|max:30000',
        ]);

        $file_name = $request->admin_id.'.'.$request->profile_pic->extension();

        $file = $request->profile_pic;

        $file_folder = public_path('archieve/admin/');
        if(!File::isDirectory($file_folder)){
            File::makeDirectory($file_folder, 0777, true, true);
        }

        $file->move($file_folder, $file_name);

        $admin->update([
            'username' => $request->username,
            'photo' => $file_name,
        ]);

        return redirect()->back()->with('success', 'Admin Profile has been updated !');


    }

}
