<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffDepartment;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;

use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'home']);
Route::get('/service/{id}',[HomeController::class,'service_detail']);
Route::get('page/about-us',[PageController::class,'about_us']);
Route::get('page/contact-us',[PageController::class,'contact_us']);

// Admin Login
Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('admin/login',[AdminController::class,'check_login']);
Route::get('admin/logout',[AdminController::class,'logout']);
Route::get('admin/forgot_password', [AdminController::class, 'admin_forgot_pass'])->name('admin.forgot_pass');
Route::post('admin/reset_pass', [AdminController::class, 'admin_find_username'])->name('admin.find_username');
Route::post('admin/submit_reset', [AdminController::class, 'admin_submit_reset'])->name('admin.submit_reset');

// Admin Dashboard
Route::get('admin',[AdminController::class,'dashboard']);
Route::get('admin/edit_profile/{id}', [AdminController::class, 'admin_edit_profile'])->name('admin.edit_profile');
Route::post('admin/update_profile', [AdminController::class, 'admin_update_profile'])->name('admin.update_profile');

// Banner Routes
Route::get('admin/banner/{id}/delete',[BannerController::class,'destroy']);
Route::resource('admin/banner',BannerController::class);

// RoomType Routes
Route::get('admin/roomtype/{id}/delete',[RoomtypeController::class,'destroy']);
Route::resource('admin/roomtype',RoomtypeController::class);

// Room
Route::get('admin/rooms/{id}/delete',[RoomController::class,'destroy']);
Route::resource('admin/rooms',RoomController::class);

// Customer
Route::get('admin/customer/{id}/delete',[CustomerController::class,'destroy']);
Route::resource('admin/customer',CustomerController::class);

// Delete Image
Route::get('admin/roomtypeimage/delete/{id}',[RoomtypeController::class,'destroy_image']);

// Department
Route::get('admin/department/{id}/delete',[StaffDepartment::class,'destroy']);
Route::resource('admin/department',StaffDepartment::class);

// Staff Payment
Route::get('admin/staff/payments/{id}',[StaffController::class,'all_payments']);
Route::get('admin/staff/payment/{id}/add',[StaffController::class,'add_payment']);
Route::post('admin/staff/payment/{id}',[StaffController::class,'save_payment']);
Route::get('admin/staff/payment/{id}/{staff_id}/delete',[StaffController::class,'delete_payment']);
// Staff CRUD
Route::get('admin/staff/{id}/delete',[StaffController::class,'destroy']);
Route::resource('admin/staff',StaffController::class);


// Booking
Route::get('admin/booking/{id}/delete',[BookingController::class,'destroy']);
Route::get('admin/booking/available-rooms/{checkin_date}',[BookingController::class,'available_rooms']);
Route::resource('admin/booking',BookingController::class);

Route::get('login',[CustomerController::class,'login']);
Route::post('customer/login',[CustomerController::class,'customer_login']);
Route::get('register',[CustomerController::class,'register']);
Route::get('logout',[CustomerController::class,'logout']);

Route::get('booking',[BookingController::class,'front_booking']);
Route::get('booking/success',[BookingController::class,'booking_payment_success']);
Route::get('booking/fail',[BookingController::class,'booking_payment_fail']);

// Service CRUD
Route::get('admin/service/{id}/delete',[ServiceController::class,'destroy']);
Route::resource('admin/service',ServiceController::class);

// Testimonial
Route::get('customer/add-testimonial',[HomeController::class,'add_testimonial']);
Route::get('customer/update_profile/{id}',[CustomerController::class, 'update_profile'])->name('update.profile');
Route::get('customer/view_booking/{id}',[CustomerController::class, 'cust_view_booking'])->name('cust.view_booking');
Route::get('customer/forgot_password', [CustomerController::class, 'cust_forgot_pass'])->name('cust.forgot_pass');
Route::post('customer/reset_password', [CustomerController::class, 'find_cust_email'])->name('cust.find_email');
Route::post('customer/submit_reset', [CustomerController::class, 'cust_submit_reset'])->name('cust.submit_reset');
Route::post('customer/submit_update', [CustomerController::class, 'submit_update']);
Route::post('customer/save-testimonial',[HomeController::class,'save_testimonial']);
Route::get('admin/testimonial/{id}/delete',[AdminController::class,'destroy_testimonial']);
Route::get('admin/testimonials',[AdminController::class,'testimonials']);
Route::post('save-contactus',[PageController::class,'save_contactus']);