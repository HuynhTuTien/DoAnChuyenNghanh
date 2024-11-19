@extends('layouts.admin')
@section('title', 'List User')

@section('content')
    <div class="content-body">
        @if (session('success'))
            <script>
                toastr.success("{{ session('success') }}");
            </script>
        @endif
        <div class="container">
            <div class="d-flex justify-content-between mb-4 flex-wrap">
                <ul class="revnue-tab nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="status-tab" data-bs-toggle="tab" data-bs-target="#status-tab-pane"
                            type="button" role="tab" aria-controls="status-tab-pane" aria-selected="true">Danh sách người
                            dùng</button>
                    </li>
                </ul>
                <div class="d-flex align-items-center mb-4">
                    <div class="input-group search-area me-2">
                        <form action="{{ route('user.list') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..."
                                value="{{ request('search') }}">
                            <button type="submit" class="input-group-text">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1_450)">
                                        <path opacity="0.3"
                                            d="M14.2929 16.7071C13.9024 16.3166 13.9024 15.6834 14.2929 15.2929C14.6834 14.9024 15.3166 14.9024 15.7071 15.2929L19.7071 19.2929C20.0976 19.6834 20.0976 20.3166 19.7071 20.7071C19.3166 21.0976 18.6834 21.0976 18.2929 20.7071L14.2929 16.7071Z"
                                            fill="#452B90" />
                                        <path
                                            d="M11 16C13.7614 16 16 13.7614 16 11C16 8.23859 13.7614 6.00002 11 6.00002C8.23858 6.00002 6 8.23859 6 11C6 13.7614 8.23858 16 11 16ZM11 18C7.13401 18 4 14.866 4 11C4 7.13402 7.13401 4.00002 11 4.00002C14.866 4.00002 18 7.13402 18 11C18 14.866 14.866 18 11 18Z"
                                            fill="#452B90" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1_450">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-4 flex-wrap">
                <ul class="revnue-tab nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users-tab-pane"
                            type="button" role="tab" aria-controls="users-tab-pane" aria-selected="true">Người
                            dùng</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="staff-tab" data-bs-toggle="tab" data-bs-target="#staff-tab-pane"
                            type="button" role="tab" aria-controls="staff-tab-pane" aria-selected="false">Nhân
                            viên</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin-tab-pane"
                            type="button" role="tab" aria-controls="admin-tab-pane" aria-selected="false">Quản trị
                        </button>
                    </li>
                </ul>
                <div>
                    <a href="{{ route('user.create') }}" class="btn btn-primary me-1">Thêm Người Dùng</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tab-content" id="myTabContent">
                        <!-- Users Tab -->
                        <div class="tab-pane fade show active" id="users-tab-pane" role="tabpanel"
                            aria-labelledby="users-tab" tabindex="0">
                            <div class="card mt-2">
                                <div class="card-body p-0">
                                    <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                                        <table id="users-tbl" class="table">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên</th>
                                                    <th>Email</th>
                                                    <th>Điện Thoại</th>
                                                    <th>Địa Chỉ</th>
                                                    <th>Quyền</th>
                                                    <th>Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $index => $item)
                                                    <tr>
                                                        <td><span>{{ $users->firstItem() + $index }}</span></td>
                                                        <td><span>{{ $item->name }}</span></td>
                                                        <td><span>{{ $item->email }}</span></td>
                                                        <td><span>{{ $item->phone }}</span></td>
                                                        <td><span>{{ $item->address }}</span></td>
                                                        <td><span>{{ $item->role }}</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                                            stroke="#737B8B" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                        </path>
                                                                        <path
                                                                            d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                                            stroke="#737B8B" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                        </path>
                                                                        <path
                                                                            d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                                            stroke="#737B8B" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                        </path>
                                                                    </svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                    style="">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('user.edit', $item->id) }}">Chỉnh
                                                                        sửa</a>
                                                                    <form action="{{ route('user.destroy', $item->id) }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Are you sure you want to delete this user?')">Xóa</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $users->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Staff Tab -->
                        <div class="tab-pane fade" id="staff-tab-pane" role="tabpanel" aria-labelledby="staff-tab"
                            tabindex="0">
                            <div class="card mt-2">
                                <div class="card-body p-0">
                                    <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                                        <table id="staff-tbl" class="table">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên</th>
                                                    <th>Email</th>
                                                    <th>Điện Thoại</th>
                                                    <th>Địa Chỉ</th>
                                                    <th>Quyền</th>
                                                    <th>Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($staff as $index => $item)
                                                    <tr>
                                                        <td><span>{{ $staff->firstItem() + $index }}</span></td>
                                                        <td><span>{{ $item->name }}</span></td>
                                                        <td><span>{{ $item->email }}</span></td>
                                                        <td><span>{{ $item->phone }}</span></td>
                                                        <td><span>{{ $item->address }}</span></td>
                                                        <td><span>{{ $item->role }}</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                                            stroke="#737B8B" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                        </path>
                                                                        <path
                                                                            d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.447"
                                                                            stroke="#737B8B" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                        </path>
                                                                        <path
                                                                            d=" M4 12C4 12.5523 4.44772 13 5
                                                                                                        13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228
                                                                                                        11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                                            stroke="#737B8B" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                        </path>
                                                                    </svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('user.edit', $item->id) }}">Chỉnh
                                                                        sửa</a>
                                                                    <form action="{{ route('user.destroy', $item->id) }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">Xóa</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $staff->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Admin Tab -->
                        <div class="tab-pane fade" id="admin-tab-pane" role="tabpanel" aria-labelledby="admin-tab"
                            tabindex="0">
                            <div class="card mt-2">
                                <div class="card-body p-0">
                                    <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                                        <table id="admin-tbl" class="table">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên</th>
                                                    <th>Email</th>
                                                    <th>Điện Thoại</th>
                                                    <th>Địa Chỉ</th>
                                                    <th>Quyền</th>
                                                    <th>Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($admin as $index => $item)
                                                    <tr>
                                                        <td><span>{{ $admin->firstItem() + $index }}</span></td>
                                                        <td><span>{{ $item->name }}</span></td>
                                                        <td><span>{{ $item->email }}</span></td>
                                                        <td><span>{{ $item->phone }}</span></td>
                                                        <td><span>{{ $item->address }}</span></td>
                                                        <td><span>{{ $item->role }}</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                                            stroke="#737B8B" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                        </path>
                                                                        <path
                                                                            d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.447"
                                                                            stroke="#737B8B" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                        </path>
                                                                        <path
                                                                            d=" M4 12C4 12.5523 4.44772 13 5 13C5.55228
                                                                                                                13 6 12.5523 6 12C6 11.4477 5.55228 11 5
                                                                                                                11C4.44772 11 4 11.4477 4 12Z"
                                                                            stroke="#737B8B" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                        </path>
                                                                    </svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('user.edit', $item->id) }}">Chỉnh
                                                                        sửa</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $staff->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
