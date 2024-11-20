@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tạo mới chức vụ</h5>
                <form action="{{ route('position.create') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="position_title" class="form-label">Tên chức vụ</label>
                        <input type="text" class="form-control" id="position_title" placeholder="Nhập tên chức vụ" name="position_title" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <input type="text" class="form-control" id="description" placeholder="Nhập mô tả" name="description" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="base_salary" class="form-label">Lương cơ bản</label>
                        <input type="number" class="form-control" id="base_salary" placeholder="Nhập lương cơ bản" name="base_salary" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Tạo chức vụ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
