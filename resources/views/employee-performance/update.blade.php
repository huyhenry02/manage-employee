@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Sửa báo cáo</h5>
                <form action="{{ route('employee-performance.postUpdate', $employeePerformance->id) }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Nhân viên</label>
                        <select class="form-select" id="employee_id" name="employee_id" required>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    {{ $employee->id === $employeePerformance->employee_id ? 'selected' : '' }}>
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="review_date" class="form-label">Ngày đánh giá</label>
                        <input type="date" class="form-control" id="review_date" name="review_date"
                               value="{{ $employeePerformance->review_date }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="performance_score" class="form-label">Điểm hiệu suất</label>
                        <input type="number" class="form-control" id="performance_score" name="performance_score"
                               value="{{ $employeePerformance->performance_score }}" min="0" max="100" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_salary" class="form-label">Tổng lương</label>
                        <input type="number" class="form-control" id="total_salary" name="total_salary"
                               value="{{ $employeePerformance->total_salary }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="work_hours" class="form-label">Số giờ làm việc</label>
                        <input type="number" class="form-control" id="work_hours" name="work_hours"
                               value="{{ $employeePerformance->work_hours }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="comment" class="form-label">Nhận xét</label>
                        <textarea class="form-control" id="comment" name="comment" rows="4">{{ $employeePerformance->comment }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Lưu báo cáo</button>
                </form>
            </div>
        </div>
    </div>
@endsection
