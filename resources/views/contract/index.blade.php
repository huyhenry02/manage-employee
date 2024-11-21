@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="card-title">Danh sách Hợp đồng</h3>
                    <a href="{{ route('contract.showCreate') }}" class="btn btn-primary">Thêm mới</a>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Nhân viên</th>
                        <th scope="col">Tên hợp đồng</th>
                        <th scope="col">Ngày bắt đầu</th>
                        <th scope="col">Ngày kết thúc</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach( $contracts as $key => $contract)
                       <tr>
                           <td>{{ $key+1 }}</td>
                           <td> {{ $contract->user?->first_name ?? ''}} {{ $contract->user?->last_name ?? ''}} </td>
                           <td> {{ $contract->name ?? ''}}</td>
                           <td>{{ $contract->start_date ?? ''}}</td>
                           <td>{{ $contract->end_date ?? ''}}</td>
                           <td>
                                 @if( $contract->status === 'inactive')
                                      <span class="badge bg-warning">Không hoạt động</span>
                                 @elseif( $contract->status === 'active')
                                      <span class="badge bg-success">Hoạt động</span>
                                 @endif
                           </td>
                           <td>
                               <a href="{{ route('contract.showUpdate', $contract->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                               <a href="{{ route('contract.delete', $contract->id) }}" class="btn btn-sm btn-danger">Xóa</a>
                           </td>
                       </tr>
                   @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
