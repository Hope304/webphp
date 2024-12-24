<?php
// Hàm trả về lớp màu dựa trên trạng thái
function getBadgeClass($status) {
    switch (strtolower($status)) {
        case 'Chờ xác nhận':
            return 'secondary';
        case 'Đang chuẩn bị':
            return 'success';
        case 'Đang trên đường giao':
            return 'info';
        case 'Đã giao':
            return 'primary';
        case 'Trả lại hàng':
            return 'warning';
        default:
            return 'dark';
    }
}
?>

<div class="container mt-5">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>ORDER</th>
        <th>CUSTOMER</th>
        <th>STATUS</th>
        <th>QUANTITY</th>
        <th>LOCATION</th>
        <th>DATE</th>
        <th>TOTAL</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orders as $order): ?>
      <tr>
        <td>#<?= htmlspecialchars($order->order_id); ?></td>
        <td><img src="<?= htmlspecialchars($order->image_url); ?>"
            alt="Product Image" class="product-image"></td>
        <td><?= htmlspecialchars($order->customer_name); ?></td>
        <td class="status" data-order-id="<?= $order->order_id; ?>">
          <!-- Hiển thị trạng thái hiện tại -->
          <span
            class="badge bg-<?= getBadgeClass($order->status); ?>"><?= htmlspecialchars($order->status); ?></span>
          <!-- Form chọn trạng thái (ẩn ban đầu) -->
          <form
            action="index.php?controller=admin&action=updateOrderStatus&id=<?= $order->order_id; ?>"
            method="POST" class="status-form" style="display:none;">
            <select name="order_status" class="form-select">
              <option value="Chờ xác nhận"
                <?= $order->status === 'Chờ xác nhận' ? 'selected' : ''; ?>>Chờ
                xác nhận</option>
              <option value="Đang chuẩn bị"
                <?= $order->status === 'Đang chuẩn bị' ? 'selected' : ''; ?>>
                Đang chuần bị</option>
              <option value="Đang trên đường giao"
                <?= $order->status === 'Đang trên đường giao' ? 'selected' : ''; ?>>
                Đang trên đường giao</option>
              <option value="Đã giao"
                <?= $order->status === 'Đã giao' ? 'selected' : ''; ?>>Đã giao
              </option>
              <option value="Trả lại hàng"
                <?= $order->status === 'Trả lại hàng' ? 'selected' : ''; ?>>Trả
                lại hàng
              </option>
            </select>

          </form>
        </td>
        <td><?= htmlspecialchars($order->quantity); ?></td>
        <td><?= htmlspecialchars($order->shipping_address); ?></td>
        <td><?= htmlspecialchars($order->order_date); ?></td>
        <td><?= htmlspecialchars($order->total_amount); ?></td>
        <td>
          <!-- Nút Edit và Save, ẩn Save mặc định -->
          <button class="btn btn-sm btn-outline-primary action-btn edit-btn"
            onclick="toggleEditStatus(this)">Edit</button>
          <button class="btn btn-sm btn-outline-success action-btn save-btn"
            style="display:none;" onclick="toggleEditStatus(this)">Save</button>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>


<script>
function toggleEditStatus(button) {
  const row = button.closest("tr"); // Lấy dòng (tr) của đơn hàng
  const statusCell = row.querySelector("td.status"); // Lấy ô trạng thái
  const badge = statusCell.querySelector(
    ".badge"); // Lấy badge trạng thái hiện tại
  const form = statusCell.querySelector(
    ".status-form"); // Lấy form chọn trạng thái
  const editBtn = row.querySelector(".edit-btn"); // Lấy nút Edit
  const saveBtn = row.querySelector(".save-btn"); // Lấy nút Save

  // Kiểm tra nếu nút là "Edit"
  if (button === editBtn) {
    // Hiển thị form chọn trạng thái và ẩn badge
    badge.style.display = "none";
    form.style.display = "block";

    // Ẩn nút Edit và hiển thị nút Save
    editBtn.style.display = "none";
    saveBtn.style.display = "inline-block";
  } else if (button === saveBtn) {
    // Lấy trạng thái mới từ form
    const newStatus = form.querySelector("select").value;
    const statusText = form.querySelector("select").selectedOptions[0]
      .textContent;

    // Cập nhật badge trạng thái mới
    badge.textContent = statusText;
    badge.className =
      `badge bg-${getBadgeClass(newStatus)}`; // Cập nhật màu badge

    // Ẩn form chọn trạng thái và hiển thị lại badge
    badge.style.display = "inline-block";
    form.style.display = "none";

    // Ẩn nút Save và hiển thị lại nút Edit
    saveBtn.style.display = "none";
    editBtn.style.display = "inline-block";

    // Gửi form để lưu trạng thái mới
    form.submit();
  }
}

// Hàm giúp xác định màu sắc của badge dựa trên trạng thái
function getBadgeClass(status) {
  switch (status) {
    case "Chờ xác nhận":
      return "secondary";
    case "Đang chuẩn bị":
      return "success";
    case "Đang trên đường giao":
      return "info";
    case "Đã giao":
      return "primary";
    case "Trả lại hàng":
      return "warning";
    default:
      return "secondary";
  }
}
</script>