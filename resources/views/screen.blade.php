<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>لوحة المهام</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .sidebar {
      height: 100vh;
      background-color: #343a40;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
    }
    .task-tag {
      font-size: 0.75rem;
    }
  </style>
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar p-3">
    <h4 class="text-white">مهامي</h4>
    <ul class="nav flex-column mt-4">
      <li class="nav-item mb-2"><a href="#" class="nav-link">📋 كل المهام</a></li>
      <li class="nav-item mb-2"><a href="#" class="nav-link">✅ مكتملة</a></li>
      <li class="nav-item mb-2"><a href="#" class="nav-link">🕒 غير مكتملة</a></li>
    </ul>
  </div>

  <!-- Content -->
  <div class="flex-grow-1 p-4">
    <!-- Navbar -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>لوحة المهام</h2>
      <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">➕ إضافة مهمة</button>
        <span class="badge bg-info mx-2">👤 مستخدم</span>
      </div>
    </div>

    <!-- Tasks Table -->
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title mb-3">📌 قائمة المهام</h5>
        <table class="table table-hover">
          <thead class="table-light">
            <tr>
              <th>العنوان</th>
              <th>الحالة</th>
              <th>الأولوية</th>
              <th>الموعد النهائي</th>
              <th>خيارات</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>تعلم Laravel</td>
              <td><span class="badge bg-success">مكتملة</span></td>
              <td><span class="badge bg-warning text-dark">متوسطة</span></td>
              <td>2025-04-25</td>
              <td><button class="btn btn-sm btn-danger">🗑 حذف</button></td>
            </tr>
            <tr>
              <td>بناء API</td>
              <td><span class="badge bg-secondary">غير مكتملة</span></td>
              <td><span class="badge bg-danger">عالية</span></td>
              <td>2025-04-30</td>
              <td><button class="btn btn-sm btn-danger">🗑 حذف</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5">
      <small class="text-muted">© 2025 | تطبيق مهامي بإبداعك 💙</small>
    </footer>
  </div>
</div>

<!-- Add Task Modal -->
<div class="modal fade" id="addTaskModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">إضافة مهمة جديدة</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">العنوان</label>
            <input type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">الأولوية</label>
            <select class="form-select">
              <option>عالية</option>
              <option>متوسطة</option>
              <option>منخفضة</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">الموعد النهائي</label>
            <input type="date" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary">حفظ</button>
        <button class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
