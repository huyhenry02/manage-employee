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
                    <h3 class="card-title">Danh sách chức vụ</h3>
                    <a href="{{route('position.showCreate')}}" class="btn btn-primary">Thêm mới</a>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên chức vụ</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Lương cơ bản</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $positions as $key => $position )
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $position->position_title ?? '' }}</td>
                            <td>{{ $position->description ?? '' }}</td>
                            <td><span class="price">{{ number_format($position->base_salary ?? '' ,0,',','.') }} VNĐ</span></td>

                            <td>
                                <a href="" class="btn btn-sm btn-info">Xem</a>
                                <a href="{{route('position.showUpdate', $position->id)}}" class="btn btn-sm btn-warning">Sửa</a>
                                <a href="{{route('position.delete', $position->id)}}" class="btn btn-sm btn-danger"
                                   onclick="return confirm('Bạn có chắc chắn muốn xoá chức vụ {{$position->position_title}} ?')" >Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
