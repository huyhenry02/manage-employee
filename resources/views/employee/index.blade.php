@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title">Danh sách nhân viên</h3>
                    <a href="{{ route('employee.showCreate') }}" class="btn btn-primary">Thêm mới</a>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã nhân viên</th>
                        <th scope="col">Tên nhân viên</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Phòng ban</th>
                        <th scope="col">Ngày tham gia</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $users as $key => $user )
                        <tr>

                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->code ?? '' }}</td>
                            <td>{{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}</td>
                            <td>{{ $user->position->position_title ?? '' }}</td>
                            <td>{{ $user->department->department_name ?? '' }}</td>
                            <td>{{ $user->created_at->format('d/m/Y') ?? '' }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-info">Xem</a>
                                <a href="" class="btn btn-sm btn-warning">Sửa</a>
                                <a href="" class="btn btn-sm btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
