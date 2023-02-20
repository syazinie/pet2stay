<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Booking;
use File;
use Storage;
use Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Customer::all();
        return view('customer.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile'=>'required',
        ]);

        if($request->hasFile('photo')){
            $imgPath=$request->file('photo')->store('public/imgs');
        }else{
            $imgPath=null;
        }
        
        $data=new Customer;
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password=sha1($request->password);
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->photo=$imgPath;
        $data->save();

        $ref=$request->ref;
        if($ref=='front'){
            return redirect('register')->with('success','Data has been saved.');
        }

        return redirect('admin/customer/create')->with('success','Data has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Customer::find($id);
        return view('customer.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data=Customer::find($id);
        return view('customer.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
        ]);

        if($request->hasFile('photo')){
            $imgPath=$request->file('photo')->store('public/imgs');
        }else{
            $imgPath=$request->prev_photo;
        }
        
        $data=Customer::find($id);
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->photo=$imgPath;
        $data->save();

        return redirect('admin/customer/'.$id.'/edit')->with('success','Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Customer::where('id',$id)->delete();
       return redirect('admin/customer')->with('success','Data has been deleted.');
    }

    // Login
    function login(){
        return view('frontlogin');
    }

    // Check Login
    function customer_login(Request $request){
        $email=$request->email;
        $pwd=sha1($request->password);
        $detail=Customer::where(['email'=>$email,'password'=>$pwd])->count();
        if($detail>0){
            $detail=Customer::where(['email'=>$email,'password'=>$pwd])->first();
            $cust_name = $detail->full_name;
            $cust_id = $detail->id;
            // dd($cust_id);
            session(['customerlogin'=>true,'data'=>$detail, 'cust_name'=>$cust_name, 'cust_id'=>$cust_id]);
            return redirect('/');
        }else{
            return redirect('login')->with('error','Invalid email/password!!');
        }
    }

    // register
    function register(){
        return view('register');
    }

    // Logout
    function logout(){
        session()->forget(['customerlogin','data']);
        return redirect('login');
    }


    function update_profile($id){
        $customer = Customer::where('id', $id)->first();

        return view('update_profile')->with('cust', $customer);
    }

    function submit_update(Request $request){

        $cust = Customer::find($request->cust_id);

        if($cust->photo != null){

            // check file exist and remove
            $path = public_path() . '/archieve/customer/'.$cust->photo;
        
            if(file_exists($path)){
    
                unlink($path);
    
            }
            else{
                
            }

        }

        $request->validate([
            'profile_pic' => 'required|mimes:jpg,jpeg,png|max:30000',
        ]);

        $file_name = $request->cust_id.'.'.$request->profile_pic->extension();

        $file = $request->profile_pic;

        $file_folder = public_path('archieve/customer/');
        if(!File::isDirectory($file_folder)){
            File::makeDirectory($file_folder, 0777, true, true);
        }

        $file->move($file_folder, $file_name);

        $cust->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'photo' => $file_name,
        ]);

        return redirect()->back()->with('success', 'Profile has been updated !');

    }

    function cust_view_booking($id){

        $book = Booking::where('customer_id', $id)->get();

        $countB = count($book);

        if($countB > 0){

            return view('cust_view_booking')->with('books', $book);

        }
        else{

            $book = "0";

            return view('cust_view_booking')->with('books', $book);

        }

    }

    function cust_forgot_pass(){

        return view('cust_forgot_pass');

    }

    function find_cust_email(Request $request){

        $find_cust = Customer::where('email', $request->email)->first();

        if(empty($find_cust)){

            return redirect()->back()->with('failed', 'Email Not Registered');

        }
        else{

            return view('cust_reset_pass')->with('cust', $find_cust)
                                        ->with('success', 'Email Found !');

        }

    }


    function cust_submit_reset(Request $request){

        $find_cust = Customer::find($request->cust_id);

        $find_cust->update([

            'password' => sha1($request->password),

        ]);

        return redirect()->route('cust.forgot_pass')->with('success', "Password successfully reset !");

    }


}
