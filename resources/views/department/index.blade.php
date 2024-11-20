@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">

                @if(Session::has('created'))
                    <div class="alert alert-success">
                        {{Session::get('created')}}
                    </div>
                @endif

                @if(Session::has('updated'))
                    <div class="alert alert-success">
                        {{Session::get('updated')}}
                    </div>
                @endif

                @if(Session::has('deleted'))
                    <div class="alert alert-success">
                        {{Session::get('deleted')}}
                    </div>
                @endif

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
                                <a href="{{route('department.showUpdate', $department->id)}}" class="btn btn-sm btn-warning">Sửa</a>
                                <a href="{{route('department.delete', $department->id)}}" class="btn btn-sm btn-danger"
                                   onclick="return confirm('Bạn có chắc chắn muốn xoá phòng {{$department->department_name}} ?')" >Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
