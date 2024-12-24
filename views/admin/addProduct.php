<div class="container-fluid">
  <!-- [ breadcrumb ] start -->
  <div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a
                href="../dashboard/index.html">Home</a>
            </li>
            <li class="breadcrumb-item"><a
                href="javascript: void(0)">E-commerce</a></li>
            <li class="breadcrumb-item" aria-current="page">Thêm sản phẩm mới
            </li>
          </ul>
        </div>
        <div class="col-md-12">
          <div class="page-header-title">
            <h2 class="mb-0">Thêm sản phẩm mới</h2>
          </div>
        </div>
      </div>
    </div>
  </div><!-- [ breadcrumb ] end -->
  <!-- [ Main Content ] start -->
  <form action="index.php?controller=admin&action=addProduct" method="POST"
    enctype="multipart/form-data">
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="mb-3"><label class="form-label">Tên sản
                        phẩm</label> <input type="text" class="form-control"
                        placeholder="Enter Product Name" name="product_name">
                    </div>

                    <div class="mb-3"><label class="form-label">Giá</label>
                      <input type="text" class="form-control"
                        placeholder="Enter Product Category"
                        name="product_price">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">

                    <div class="mb-3"><label class="form-label">Trạng <table>
                        </table></label>
                      <select class="form-select" name="product_status">
                        <option value="In Stock">
                          In Stock</option>
                        <option value="Out of Stock">
                          Out of Stock</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <p><span class="text-danger">*</span> Recommended
                        resolution
                        is 640x640 with file size</p>
                      <label class="btn btn-outline-secondary" for="flupld">
                        <i class="ti ti-upload me-2"></i> Click to Upload
                      </label>
                      <input type="file" id="flupld" class="d-none"
                        onchange="previewImage(event)" name="product_image">

                      <!-- Vùng để hiển thị ảnh sau khi chọn -->
                      <div id="image-preview" style="margin-top: 15px;">
                        <img id="selected-image" src="" alt="
                          Selected Image"
                          style="max-width: 100%; display: block;">
                      </div>
                    </div>


                    <div class="text-end btn-page mb-0 mt-4">
                      <button class="btn btn-primary">Thêm sản phẩm mới</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- [ sample-page ] end -->
    </div>
  </form>
</div>