<div class="container ">
  <h2 class="text-center mb-5">Thống Kê Đơn Hàng</h2>

  <div class="row">
    <!-- Tổng Doanh Thu -->
    <div class="col-md-4">
      <div class="card custom-card">
        <div class="card-body text-center">
          <h5 class="card-title">Tổng Doanh Thu</h5>
          <h3 class="text-primary">
            <?= number_format($totalRevenue, 0, ',', '.'); ?> VND</h3>
        </div>
      </div>
    </div>

    <!-- Tổng Số Đơn Hàng -->
    <div class="col-md-4">
      <div class="card custom-card">
        <div class="card-body text-center">
          <h5 class="card-title">Tổng Số Đơn Hàng</h5>
          <h3 class="text-success">
            <?= number_format($totalOrders, 0, ',', '.'); ?></h3>
        </div>
      </div>
    </div>

    <!-- Tổng Sản Phẩm Đã Bán -->
    <div class="col-md-4">
      <div class="card custom-card">
        <div class="card-body text-center">
          <h5 class="card-title">Tổng Sản Phẩm Đã Bán</h5>
          <h3 class="text-info">
            <?= number_format($totalProductsSold, 0, ',', '.'); ?> sản phẩm</h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Biểu đồ doanh thu theo thời gian -->
  <div class="row mt-5">
    <div class="col-md-12">
      <div class="card custom-card">
        <div class="card-body">
          <h5 class="card-title text-center">Doanh Thu Theo Thời Gian</h5>
          <canvas id="revenueChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Dữ liệu doanh thu theo thời gian (có thể là từ cơ sở dữ liệu)
const revenueData =
  <?= json_encode($revenueByDateRange); ?>; // mảng chứa dữ liệu doanh thu theo ngày
const labels = revenueData.map(item => item.date); // ngày
const data = revenueData.map(item => item.revenue); // doanh thu

const ctx = document.getElementById('revenueChart').getContext('2d');

const revenueChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: labels, // Mảng ngày
    datasets: [{
      label: 'Doanh Thu',
      data: data, // Mảng doanh thu
      borderColor: '#007bff',
      backgroundColor: 'rgba(0, 123, 255, 0.2)',
      fill: true,
      tension: 0.4,
      borderWidth: 2
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top'
      },
      tooltip: {
        mode: 'index',
        intersect: false
      }
    },
    scales: {
      x: {
        title: {
          display: true,
          text: 'Ngày'
        }
      },
      y: {
        title: {
          display: true,
          text: 'Doanh Thu (VND)'
        }
      }
    }
  }
});
</script>