@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Cập nhật phòng ban</h5>
                <form action="{{route('department.update', $department->id)}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="department_name" class="form-label">Tên phòng ban</label>
                        <input type="text" class="form-control" id="department_name" placeholder="Nhập tên phòng ban" name="department_name" required
                               value="{{$department->department_name}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật phòng ban</button>
                </form>
            </div>
        </div>
    </div>
@endsection
