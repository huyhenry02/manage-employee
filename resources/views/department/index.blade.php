@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title">Danh sách phòng ban</h3>
                    <a href="{{ route('department.showCreate') }}" class="btn btn-primary">Thêm mới</a>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên phòng ban</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $departments as $key => $department )
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $department->department_name ?? '' }}</td>
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
