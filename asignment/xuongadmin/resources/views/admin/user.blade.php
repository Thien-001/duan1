@extends('template.admin')
@section('bodyadmin')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Danh Sách Người Dùng</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Người Dùng</a>
                </li>
            </ul>
        </div>
        <a href="/admin/user/add" class="btn-download">
            <span class="text">Thêm Người Dùng</span>
        </a>
    </div>

    <main class="main-table container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listuser as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <button class="btn btn-info btn-sm" ><a href="{{ route('admin.user.edit', $user->id) }}"
                                class="btn btn-warning btn-sm">Sửa</a></button>
                            <button class="btn btn-danger btn-sm"><a href="{{ route('admin.user.delete', $user->id) }}"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                class="btn btn-danger btn-sm">Xóa</a></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch('/api/users')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const users = data.data;
                        const tbody = document.getElementById('user-table-body');

                        users.forEach((user, index) => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${index + 1}</td>
                                <td>${user.name}</td>
                                <td>${user.email}</td>
                                <td>${user.role}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" onclick="editUser(${user.id})">Sửa</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteUser(${user.id})">Xóa</button>
                                </td>
                            `;
                            tbody.appendChild(row);
                        });
                    }
                })
                .catch(error => {
                    console.error('Lỗi khi gọi API:', error);
                });
        });

        function deleteUser(id) {
            if (confirm("Bạn có chắc muốn xóa người dùng này?")) {
                fetch(`/api/user/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${localStorage.getItem('token')}`
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert("Xóa không thành công!");
                    }
                });
            }
        }

        function editUser(id) {
            alert(`Chỉnh sửa người dùng ID: ${id}`);
        }
    </script>
</main>
@endsection
