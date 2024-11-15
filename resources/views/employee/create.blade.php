@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tạo mới nhân viên</h5>
                <form action="{{ route('employee.create') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="first_name" class="form-label">Họ và tên</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="first_name" placeholder="Họ" name="first_name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="last_name" placeholder="Tên" name="last_name" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="dob" class="form-label">Ngày sinh</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="gender" class="form-label">Giới tính</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                            <option value="other">Khác</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="contact_info" class="form-label">Thông tin liên hệ</label>
                        <input type="text" class="form-control" id="contact_info" placeholder="Nhập thông tin liên hệ" name="contact_info">
                    </div>

                    <div class="form-group mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address">
                    </div>

                    <div class="form-group mb-3">
                        <label for="date_joined" class="form-label">Ngày gia nhập</label>
                        <input type="date" class="form-control" id="date_joined" name="date_joined" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="department_id" class="form-label">Phòng ban</label>
                        <select class="form-select" id="department_id" name="department_id">
                            @foreach( $departments as $department )
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="position_id" class="form-label">Vị trí</label>
                        <select class="form-select" id="position_id" name="position_id">
                            @foreach( $positions as $position )
                                <option value="{{ $position->id }}">{{ $position->position_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tạo nhân viên</button>
                </form>
            </div>
        </div>
    </div>
@endsection
