@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <!-- Thông tin nhân viên -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Thông tin chi tiết nhân viên</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Mã nhân viên:</strong> {{ $user->code }}</p>
                        <p><strong>Họ và tên:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Ngày sinh:</strong> {{ $user->dob }}</p>
                        <p><strong>Giới tính:</strong> {{ ucfirst($user->gender) }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Thông tin liên hệ:</strong> {{ $user->contact_info }}</p>
                        <p><strong>Địa chỉ:</strong> {{ $user->address }}</p>
                        <p><strong>Ngày gia nhập:</strong> {{ $user->date_joined }}</p>
                        <p><strong>Vị trí:</strong> {{ $user->position->position_title }}</p>
                        <p><strong>Phòng ban:</strong> {{ $user->department->department_name }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danh sách hợp đồng -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Danh sách hợp đồng</h5>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên hợp đồng</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Lương gross</th>
                        <th>Trạng thái</th>
                        <th>Tệp đính kèm</th>
                        <td>Thao tác</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($contracts))
                        @foreach( $contracts as $contract)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contract->name }}</td>
                                <td>{{ $contract->start_date }}</td>
                                <td>{{ $contract->end_date }}</td>
                                <td>{{ number_format($contract->gross_salary, 0, ',', '.') }} VND</td>
                                <td>
                            <span class="badge {{ $contract->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($contract->status) }}
                            </span>
                                </td>
                                <td>
                                    @if( $contract->attachment_file)
                                        <a href="{{$contract->attachment_file }}" target="_blank">Xem tệp</a>
                                    @else
                                        Không có
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('contract.showUpdate', $contract->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Danh sách báo cáo -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Danh sách báo cáo</h5>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ngày đánh giá</th>
                        <th>Điểm hiệu suất</th>
                        <th>Tổng lương</th>
                        <th>Số giờ làm</th>
                        <th>Người đánh giá</th>
                        <th>Ghi chú</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                     @if(!empty($reports))
                         @foreach( $reports as $report)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $report->review_date }}</td>
                                 <td>{{ $report->performance_score }}/100</td>
                                 <td>{{ number_format($report->total_salary, 0, ',', '.') }} VND</td>
                                 <td>{{ $report->work_hours }}</td>
                                 <td>{{ $report->reviewer->first_name }} {{ $report->reviewer->last_name }}</td>
                                 <td>{{ $report->comment }}</td>
                                 <td>
                                        <a href="{{ route('employee-performance.showUpdate', $report->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                 </td>
                             </tr>
                         @endforeach
                     @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
