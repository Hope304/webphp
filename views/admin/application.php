<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../../assets/images/favicon.svg"
    type="image/x-icon" />
  <title>PlainAdmin Demo | Bootstrap 5 Admin Template</title>

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

  <link rel="stylesheet" href="assets/css/lineicons.css" rel="stylesheet"
    type="text/css" />
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css"
    rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="assets/css/fullcalendar.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/styleadmin.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <!-- ======== Preloader =========== -->
  <div id="preloader">
    <div class="spinner"></div>
  </div>
  <!-- ======== Preloader =========== -->

  <!-- ======== sidebar-nav start =========== -->
  <aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
      <a href="index.html">
        <img src="assets/images/main-logo.png" alt="logo" />
      </a>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li class="nav-item">
          <a href="index.php?controller=admin&action=dashboard">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                <path
                  d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
              </svg>
            </span>
            <span class="text">Thống kê</span>
          </a>
        </li>
        <li class="nav-item nav-item-has-children">
          <a href="#0" class="collapsed" data-bs-toggle="collapse"
            data-bs-target="#ddmenu_2" aria-controls="ddmenu_2"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M11.8097 1.66667C11.8315 1.66667 11.8533 1.6671 11.875 1.66796V4.16667C11.875 5.43232 12.901 6.45834 14.1667 6.45834H16.6654C16.6663 6.48007 16.6667 6.50186 16.6667 6.5237V16.6667C16.6667 17.5872 15.9205 18.3333 15 18.3333H5.00001C4.07954 18.3333 3.33334 17.5872 3.33334 16.6667V3.33334C3.33334 2.41286 4.07954 1.66667 5.00001 1.66667H11.8097ZM6.66668 7.70834C6.3215 7.70834 6.04168 7.98816 6.04168 8.33334C6.04168 8.67851 6.3215 8.95834 6.66668 8.95834H10C10.3452 8.95834 10.625 8.67851 10.625 8.33334C10.625 7.98816 10.3452 7.70834 10 7.70834H6.66668ZM6.04168 11.6667C6.04168 12.0118 6.3215 12.2917 6.66668 12.2917H13.3333C13.6785 12.2917 13.9583 12.0118 13.9583 11.6667C13.9583 11.3215 13.6785 11.0417 13.3333 11.0417H6.66668C6.3215 11.0417 6.04168 11.3215 6.04168 11.6667ZM6.66668 14.375C6.3215 14.375 6.04168 14.6548 6.04168 15C6.04168 15.3452 6.3215 15.625 6.66668 15.625H13.3333C13.6785 15.625 13.9583 15.3452 13.9583 15C13.9583 14.6548 13.6785 14.375 13.3333 14.375H6.66668Z" />
                <path
                  d="M13.125 2.29167L16.0417 5.20834H14.1667C13.5913 5.20834 13.125 4.74197 13.125 4.16667V2.29167Z" />
              </svg>
            </span>
            <span class="text">Sản phẩm</span>
          </a>
          <ul id="ddmenu_2" class="collapse dropdown-nav">
            <li>
              <a href="index.php?controller=admin&action=listProduct">
                Danh sách sản phẩm
              </a>
            </li>
            <li>
              <a href="index.php?controller=admin&action=addProduct"> Thêm sản
                phẩm </a>
            </li>
            <li>
              <a href="index.php?controller=admin&action=listOrder">
                Order </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="index.php?controller=auth&action=logout">
            <span class="icon">
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M14.9211 10.1294C15.1652 9.88534 15.1652 9.48967 14.9211 9.24559L10.7544 5.0789C10.5103 4.83482 10.1147 4.83482 9.87057 5.0789C9.62649 5.32297 9.62649 5.71871 9.87057 5.96278L12.9702 9.06251H1.97916C1.63398 9.06251 1.35416 9.34234 1.35416 9.68751C1.35416 10.0327 1.63398 10.3125 1.97916 10.3125H12.9702L9.87057 13.4123C9.62649 13.6563 9.62649 14.052 9.87057 14.2961C10.1147 14.5402 10.5103 14.5402 10.7544 14.2961L14.9211 10.1294Z" />
                  <path
                    d="M11.6383 15.18L15.805 11.0133C16.5373 10.2811 16.5373 9.09391 15.805 8.36166L11.6383 4.195C11.2722 3.82888 10.7923 3.64582 10.3125 3.64582V3.02082C10.3125 2.10035 11.0587 1.35416 11.9792 1.35416H16.9792C17.8997 1.35416 18.6458 2.10035 18.6458 3.02082V16.3542C18.6458 17.2747 17.8997 18.0208 16.9792 18.0208H11.9792C11.0587 18.0208 10.3125 17.2747 10.3125 16.3542V15.7292C10.7923 15.7292 11.2722 15.5461 11.6383 15.18Z" />
                </svg>
              </span>
            </span>
            <span class="text">Đăng xuất</span>
          </a>
        </li>
      </ul>
    </nav>
  </aside>
  <div class="overlay"></div>
  <!-- ======== sidebar-nav end =========== -->

  <!-- ======== main-wrapper start =========== -->
  <main class="main-wrapper">
    <!-- ========== header start ========== -->
    <header class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-6">
            <div class="header-left d-flex align-items-center">
              <div class="menu-toggle-btn mr-15">
                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                  <i class="lni lni-chevron-left me-2"></i> Menu
                </button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- ========== header end ========== -->

    <!-- ========== section start ========== -->

    <?= @$content ?>
    <!-- ========== section end ========== -->

    <!-- ========== footer start =========== -->
    <footer class="footer">
      <div class="container-fluid">
        <!-- end row -->
      </div>
      <!-- end container -->
    </footer>
    <!-- ========== footer end =========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->

  <!-- ========= All Javascript files linkup ======== -->
  <script src="../../assets/js/jquery-1.11.0.min.js"></script>
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/js/Chart.min.js"></script>
  <script src="../../assets/js/dynamic-pie-chart.js"></script>
  <script src="../../assets/js/moment.min.js"></script>
  <script src="../../assets/js/fullcalendar.js"></script>
  <script src="../../assets/js/jvectormap.min.js"></script>
  <script src="../../assets/js/world-merc.js"></script>
  <script src="../../assets/js/polyfill.js"></script>
  <script src="../../assets/js/main.js"></script>
  <script src="../../assets/js/script.js"></script>

  <script>
  // ======== jvectormap activation
  var markers = [{
      name: "Egypt",
      coords: [26.8206, 30.8025]
    },
    {
      name: "Russia",
      coords: [61.524, 105.3188]
    },
    {
      name: "Canada",
      coords: [56.1304, -106.3468]
    },
    {
      name: "Greenland",
      coords: [71.7069, -42.6043]
    },
    {
      name: "Brazil",
      coords: [-14.235, -51.9253]
    },
  ];

  var jvm = new jsVectorMap({
    map: "world_merc",
    selector: "#map",
    zoomButtons: true,

    regionStyle: {
      initial: {
        fill: "#d1d5db",
      },
    },

    labels: {
      markers: {
        render: (marker) => marker.name,
      },
    },

    markersSelectable: true,
    selectedMarkers: markers.map((marker, index) => {
      var name = marker.name;

      if (name === "Russia" || name === "Brazil") {
        return index;
      }
    }),
    markers: markers,
    markerStyle: {
      initial: {
        fill: "#4A6CF7"
      },
      selected: {
        fill: "#ff5050"
      },
    },
    markerLabelStyle: {
      initial: {
        fontWeight: 400,
        fontSize: 14,
      },
    },
  });
  // ====== calendar activation
  document.addEventListener("DOMContentLoaded", function() {
    var calendarMiniEl = document.getElementById("calendar-mini");
    var calendarMini = new FullCalendar.Calendar(calendarMiniEl, {
      initialView: "dayGridMonth",
      headerToolbar: {
        end: "today prev,next",
      },
    });
    calendarMini.render();
  });

  // =========== chart one start
  const ctx1 = document.getElementById("Chart1").getContext("2d");
  const chart1 = new Chart(ctx1, {
    type: "line",
    data: {
      labels: [
        "Jan",
        "Fab",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      datasets: [{
        label: "",
        backgroundColor: "transparent",
        borderColor: "#365CF5",
        data: [
          600, 800, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
        ],
        pointBackgroundColor: "transparent",
        pointHoverBackgroundColor: "#365CF5",
        pointBorderColor: "transparent",
        pointHoverBorderColor: "#fff",
        pointHoverBorderWidth: 5,
        borderWidth: 5,
        pointRadius: 8,
        pointHoverRadius: 8,
        cubicInterpolationMode: "monotone", // Add this line for curved line
      }, ],
    },
    options: {
      plugins: {
        tooltip: {
          callbacks: {
            labelColor: function(context) {
              return {
                backgroundColor: "#ffffff",
                color: "#171717",
              };
            },
          },
          intersect: false,
          backgroundColor: "#f9f9f9",
          title: {
            fontFamily: "Plus Jakarta Sans",
            color: "#8F92A1",
            fontSize: 12,
          },
          body: {
            fontFamily: "Plus Jakarta Sans",
            color: "#171717",
            fontStyle: "bold",
            fontSize: 16,
          },
          multiKeyBackground: "transparent",
          displayColors: false,
          padding: {
            x: 30,
            y: 10,
          },
          bodyAlign: "center",
          titleAlign: "center",
          titleColor: "#8F92A1",
          bodyColor: "#171717",
          bodyFont: {
            family: "Plus Jakarta Sans",
            size: "16",
            weight: "bold",
          },
        },
        legend: {
          display: false,
        },
      },
      responsive: true,
      maintainAspectRatio: false,
      title: {
        display: false,
      },
      scales: {
        y: {
          grid: {
            display: false,
            drawTicks: false,
            drawBorder: false,
          },
          ticks: {
            padding: 35,
            max: 1200,
            min: 500,
          },
        },
        x: {
          grid: {
            drawBorder: false,
            color: "rgba(143, 146, 161, .1)",
            zeroLineColor: "rgba(143, 146, 161, .1)",
          },
          ticks: {
            padding: 20,
          },
        },
      },
    },
  });
  // =========== chart one end

  // =========== chart three start
  const ctx2 = document.getElementById("Chart2").getContext("2d");
  const chart2 = new Chart(ctx2, {
    type: "line",
    data: {
      labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      datasets: [{
          label: "Revenue",
          backgroundColor: "transparent",
          borderColor: "#365CF5",
          data: [80, 120, 110, 100, 130, 150, 115, 145, 140, 130, 160,
            210
          ],
          pointBackgroundColor: "transparent",
          pointHoverBackgroundColor: "#365CF5",
          pointBorderColor: "transparent",
          pointHoverBorderColor: "#365CF5",
          pointHoverBorderWidth: 3,
          pointBorderWidth: 5,
          pointRadius: 5,
          pointHoverRadius: 8,
          fill: false,
          tension: 0.4,
        },
        {
          label: "Profit",
          backgroundColor: "transparent",
          borderColor: "#9b51e0",
          data: [
            120, 160, 150, 140, 165, 210, 135, 155, 170, 140, 130, 200,
          ],
          pointBackgroundColor: "transparent",
          pointHoverBackgroundColor: "#9b51e0",
          pointBorderColor: "transparent",
          pointHoverBorderColor: "#9b51e0",
          pointHoverBorderWidth: 3,
          pointBorderWidth: 5,
          pointRadius: 5,
          pointHoverRadius: 8,
          fill: false,
          tension: 0.4,
        },
        {
          label: "Order",
          backgroundColor: "transparent",
          borderColor: "#f2994a",
          data: [180, 110, 140, 135, 100, 90, 145, 115, 100, 110, 115,
            150
          ],
          pointBackgroundColor: "transparent",
          pointHoverBackgroundColor: "#f2994a",
          pointBorderColor: "transparent",
          pointHoverBorderColor: "#f2994a",
          pointHoverBorderWidth: 3,
          pointBorderWidth: 5,
          pointRadius: 5,
          pointHoverRadius: 8,
          fill: false,
          tension: 0.4,
        },
      ],
    },
    options: {
      plugins: {
        tooltip: {
          intersect: false,
          backgroundColor: "#fbfbfb",
          titleColor: "#8F92A1",
          bodyColor: "#272727",
          titleFont: {
            size: 16,
            family: "Plus Jakarta Sans",
            weight: "400",
          },
          bodyFont: {
            family: "Plus Jakarta Sans",
            size: 16,
          },
          multiKeyBackground: "transparent",
          displayColors: false,
          padding: {
            x: 30,
            y: 15,
          },
          borderColor: "rgba(143, 146, 161, .1)",
          borderWidth: 1,
          enabled: true,
        },
        title: {
          display: false,
        },
        legend: {
          display: false,
        },
      },
      layout: {
        padding: {
          top: 0,
        },
      },
      responsive: true,
      // maintainAspectRatio: false,
      legend: {
        display: false,
      },
      scales: {
        y: {
          grid: {
            display: false,
            drawTicks: false,
            drawBorder: false,
          },
          ticks: {
            padding: 35,
          },
          max: 350,
          min: 50,
        },
        x: {
          grid: {
            drawBorder: false,
            color: "rgba(143, 146, 161, .1)",
            drawTicks: false,
            zeroLineColor: "rgba(143, 146, 161, .1)",
          },
          ticks: {
            padding: 20,
          },
        },
      },
    },
  });
  // =========== chart three end

  // ================== chart four start
  const ctx4 = document.getElementById("Chart4").getContext("2d");
  const chart4 = new Chart(ctx4, {
    type: "bar",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
      datasets: [{
          label: "",
          backgroundColor: "#365CF5",
          borderColor: "transparent",
          borderRadius: 20,
          borderWidth: 5,
          barThickness: 20,
          maxBarThickness: 20,
          data: [600, 700, 1000, 700, 650, 800],
        },
        {
          label: "",
          backgroundColor: "#d50100",
          borderColor: "transparent",
          borderRadius: 20,
          borderWidth: 5,
          barThickness: 20,
          maxBarThickness: 20,
          data: [690, 740, 720, 1120, 876, 900],
        },
      ],
    },
    options: {
      plugins: {
        tooltip: {
          backgroundColor: "#F3F6F8",
          titleColor: "#8F92A1",
          titleFontSize: 12,
          bodyColor: "#171717",
          bodyFont: {
            weight: "bold",
            size: 16,
          },
          multiKeyBackground: "transparent",
          displayColors: false,
          padding: {
            x: 30,
            y: 10,
          },
          bodyAlign: "center",
          titleAlign: "center",
          enabled: true,
        },
        legend: {
          display: false,
        },
      },
      layout: {
        padding: {
          top: 0,
        },
      },
      responsive: true,
      // maintainAspectRatio: false,
      title: {
        display: false,
      },
      scales: {
        y: {
          grid: {
            display: false,
            drawTicks: false,
            drawBorder: false,
          },
          ticks: {
            padding: 35,
            max: 1200,
            min: 0,
          },
        },
        x: {
          grid: {
            display: false,
            drawBorder: false,
            color: "rgba(143, 146, 161, .1)",
            zeroLineColor: "rgba(143, 146, 161, .1)",
          },
          ticks: {
            padding: 20,
          },
        },
      },
    },
  });
  // =========== chart four end
  </script>
</body>

</html>