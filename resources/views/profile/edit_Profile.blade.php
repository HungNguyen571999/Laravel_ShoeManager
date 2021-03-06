@extends('admin_layout')
@section('js')
    <script>
        $('#avatar').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })

    </script>
@endsection
@section('admin_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật danh mục</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Product category</li>
            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
        </ol>
    </div>
    <div class="row">
        <!-- lấy thông tin thông báo đã thêm vào session để hiển thị -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                <li>{{ $message }} </li>
                @if ($message = Session::get('file'))
                    <li>{{ $message }} </li>
                @endif

            </div>
        @endif

        <!-- lấy thông tin lỗi khi validate hiển thị trên màn hình -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                <li>{{ $message }} </li>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-lg-12 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cập nhật user</h6>
                </div>

                {{-- @foreach ($edit_category_user as $key => $edit_value_user) --}}
                    <div class="card-body">
                        <form class="user" action="{{ route('profiles.update', ['profile' => $profile->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- khai báo này dùng để thiết lập phương thức PUT 
                                                    nếu không khai báo thì khi submit không thiết lập HttpPUT -->
                            <div class="row">
                                <div class="col-lg-4 mb-4"></div>
                                <div class="col-lg-8 mb-4"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">User id</label>
                                <input type="text" name="profile_user_id" class="form-control form-control-user"
                                    id="profile_full_name" placeholder="Full Name" value="{{ $profile->user_id }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full name</label>
                                <input type="text" name="profile_full_name" class="form-control form-control-user"
                                    id="profile_full_name" placeholder="Full Name" value="{{ $profile->full_name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="profile_address" class="form-control form-control-user"
                                    id="profile_address" placeholder="Address" value="{{ $profile->address }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="profile_phone" class="form-control form-control-user"
                                    id="profile_phone" placeholder="Phone" value="{{ $profile->phone }}">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="exampleInputEmail1">Birthday</label>
                                    <input type="date" class="form-control form-control-user" name="profile_birthday"
                                        id="profile_birthday" placeholder="Birthday" value="{{ $profile->birthday }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Avatar</label><br>
                                
                                <div class="card col-sm-4">
                                    <img class="card-img-top" src="{{ URL::to($profile->avatar) }}" alt="Card image cap">
                                </div><br>
                                <div class="col-sm-8 mb-4 mb-sm-0">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input " id="avatar" name="avatar">
                                        <label for="avatar" class="custom-file-label">{{ $profile->avatar }}</label>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary"> Update Profile</button>
                            
                        </form><br>
                        {{-- <button class="btn btn-primary" href="{{ URL::to('/users') }}">
                            Cập nhật user
                        </button> --}}
                        <form action="/ShoeManager/profiles/{{ $user->id }}">
                            
                            <button type="submit" class="btn btn-light">
                                <span class="icon">
                                    <i class="fas fa-chevron-left"></i>
                                </span> Back
                            </button>
                        </form>
                        {{-- <a href="" class="btn btn-light btn-icon btn" role="button">
                            <span class="icon">
                                <i class="fas fa-user-edit"></i>
                            </span>
                            Back
                        </a> --}}


                    </div>
                    {{--
                @endforeach --}}
            </div>
        </div>
    </div>
@endsection
