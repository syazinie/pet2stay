@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Admin Edit Profile
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-auto d-flex align-items-center">
                                    @if($admin->photo == "")
                            	        <img src="{{asset('public/img/default_pic.png')}}" style="width: 200px; height:  auto; padding:10px;">
                                    @else
                            	        <img src="{{asset('public/archieve/admin/').'/'.$admin->photo}}" style="width: 200px; height:  auto; pading:10px;">
                                    @endif
                                </div>
                                <div class="col-auto">
                                    <form action="{{route('admin.update_profile')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row my-4">
                                            <div class="col-12">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" name="admin_id" value="{{$admin->id}}" hidden>
                                                <input type="text" name="username" id="username" value="{{$admin->username}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row my-4">
                                            <div class="col-12">
                                                <label for="profile_pic" class="form-label">New Profile Picture (Format:JPG/JPEG/PNG)</label>
                                                <input type="file" id="profile_pic" name="profile_pic" class="form-control form-control-user">
                                            </div>
                                        </div>
                                        <div class="row my-4">
                                            <div class="col-12" style="text-align:center;">
                                                <input type="submit" class="btn btn-success" value="Update">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@section('scripts')
<!-- Custom styles for this page -->
<link href="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="{{asset('public')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('public')}}/js/demo/datatables-demo.js"></script>

@endsection

@endsection