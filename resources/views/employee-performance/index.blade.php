@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title">Danh sách Báo cáo hiệu suất</h3>
                    <a href="{{ route('employee-performance.showCreate') }}" class="btn btn-primary">Thêm mới</a>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Nhân viên</th>
                        <th scope="col">Ngày báo cáo</th>
                        <th scope="col">Điểm đánh giá</th>
                        <th scope="col">Người đánh giá</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $employeePerformances as $key => $employeePerformance)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $employeePerformance->employee?->first_name ?? '' }} {{ $employeePerformance->employee?->last_name ?? '' }}</td>
                            <td>{{ $employeePerformance->review_date ?? '' }}</td>
                            <td>{{ $employeePerformance->performance_score ?? '' }} / 10</td>
                            <td>{{ $employeePerformance->reviewer?->first_name ?? '' }} {{ $employeePerformance->reviewer?->last_name ?? '' }}</td>
                            <td>
                                <a href="{{ route('employee-performance.showUpdate', $employeePerformance->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                <a href="{{ route('employee-performance.delete', $employeePerformance->id) }}" class="btn btn-sm btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
