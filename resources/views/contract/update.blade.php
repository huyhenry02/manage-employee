@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tạo mới hợp đồng</h5>
                <form action="{{ route('contract.postUpdate', $contract->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Nhân viên</label>
                        <select class="form-select" id="user_id" name="user_id" required>
                            <option value="{{ $contract->user_id }}" disabled
                                    selected>{{ $contract->user->first_name ?? '' }} {{ $contract->user->last_name ?? ''}}</option>
                            @foreach( $users as $user )
                                <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Tên hợp đồng</label>
                        <input type="text" class="form-control" id="name" name="name" maxlength="255" value="{{ $contract->name ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Ngày bắt đầu</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $contract->start_date ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">Ngày kết thúc</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $contract->end_date ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="terms" class="form-label">Điều khoản</label>
                        <textarea class="form-control" id="terms" name="terms" rows="5">{{ $contract->terms ?? '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="gross_salary" class="form-label">Lương cơ bản</label>
                        <input type="number" class="form-control" id="gross_salary" name="gross_salary" value="{{ $contract->gross_salary ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="attachment_file" class="form-label">Tệp đính kèm</label>
                        @if(!empty($contract->attachment_file))
                            <div class="mb-2">
                                <a href="{{ $contract->attachment_file }}" target="_blank" class="btn btn-link">
                                    Xem file hiện tại
                                </a>
                            </div>
                        @endif
                        <input type="file" class="form-control" id="attachment_file" name="attachment_file">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select class="form-select" id="status" name="status" >
                            <option value="{{ $contract->status }}" selected>
                                @if( $contract->status === 'inactive')
                                    Không hoạt động
                                @elseif( $contract->status === 'active')
                                    Hoạt động
                                @endif
                            </option>
                            <option value="inactive">Không hoạt động</option>
                            <option value="active">Hoạt động</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Lưu hợp đồng</button>
                </form>
            </div>
        </div>
    </div>
@endsection
