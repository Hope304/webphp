<div class="container-fluid">
  <!-- [ Main Content ] start -->
  <div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
      <div class="card table-card">
        <div class="card-body">
          <div class="text-end p-4 pb-0"><a
              href="index.php?controller=admin&action=addProduct"
              class="btn btn-primary"><i class="ti ti-plus f-18"></i> Thêm sản
              phẩm</a></div>
          <div class="table-responsive">
            <div
              class="datatable-wrapper datatable-loading no-footer searchable fixed-columns">
              <div class="datatable-container">
                <table class="table table-hover datatable-table"
                  id="pc-dt-simple">
                  <thead>
                    <tr>
                      <th style="width: 5.977907732293697%;"></th>
                      <th class="text-end" style="width: 3.1838856400259905%;">#
                      </th>
                      <th style="width: 36.19233268356075%;">Thông tin sản phẩm
                      </th>

                      <th class="text-end" style="width: 6.692657569850552%;">
                        Giá</th>
                      <th class="text-end" style="width: 5.003248862897985%;">
                        SL</th>
                      <th style="width: 10.33138401559454%;">Trạng thái</th>
                      <th class="text-center"
                        style="width: 14.554905782975958%;">Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($featured_products) && !empty($featured_products)) : ?>
                    <?php foreach ($featured_products as $product) : ?>
                    <tr
                      data-index="<?= htmlspecialchars($product->product_id); ?>">
                      <td>
                        <div class="form-check"><input class="form-check-input"
                            type="checkbox"></div>
                      </td>
                      <td class="text-end">
                        <?= htmlspecialchars($product->product_id); ?></td>
                      <td>
                        <div class="row">
                          <div class="col-auto pe-0"><img
                              src="<?= htmlspecialchars($product->product_image); ?>"
                              alt="user-image" class="wid-40 rounded-circle">
                          </div>
                          <div class="col">
                            <h6 class="mb-1">
                              <?= htmlspecialchars($product->product_name); ?>
                            </h6>

                          </div>
                        </div>
                      </td>

                      <td class="text-end">
                        <?= htmlspecialchars($product->product_price); ?></td>
                      <td class="text-end">
                        <?= htmlspecialchars($product->total_quantity); ?>
                      </td>
                      <td><span
                          class="badge bg-light-success f-12"><?= htmlspecialchars($product->product_status); ?></span>
                      </td>
                      <td class="text-center">
                        <ul class="list-inline me-auto mb-0">
                          <li class="list-inline-item align-bottom"
                            data-bs-toggle="tooltip" title="View"><a href="#"
                              class="avtar avtar-xs btn-link-secondary"
                              data-bs-toggle="modal"
                              data-bs-target="#cust-modal"
                              data-product-image="<?= htmlspecialchars($product->product_image); ?>"
                              data-product-name="<?= htmlspecialchars($product->product_name); ?>"
                              data-product-qty="<?= htmlspecialchars($product->total_quantity); ?>"
                              data-product-status="<?= htmlspecialchars($product->product_status); ?>"
                              data-product-price="<?= htmlspecialchars($product->product_price); ?>"><i
                                class="lni lni-eye f-18"></i></a></li>
                          <li class="list-inline-item align-bottom"
                            data-bs-toggle="tooltip" title="Edit"><a
                              href="index.php?controller=admin&action=editProduct&id=<?= ($product->product_id) ?>"
                              class="avtar avtar-xs btn-link-primary"><i
                                class="lni lni-pen-to-square f-18"></i></a>
                          </li>
                          <li class="list-inline-item align-bottom"
                            data-bs-toggle="tooltip" title="Delete">
                            <a href="#" class="avtar avtar-xs btn-link-danger"
                              onclick="confirmDelete(<?= htmlspecialchars($product->product_id); ?>)">
                              <i class="lni lni-trash-3 f-18"></i>
                            </a>
                          </li>

                        </ul>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- [ sample-page ] end -->
  </div><!-- [ Main Content ] end -->
</div>
<div class="modal fade" id="cust-modal" data-bs-keyboard="false" tabindex="-1"
  aria-hidden="true">
  <div
    class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0 justify-content-between">
        <h5 class="mb-0">Thông tin sản phẩm</h5><a href="#"
          class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal"><i
            class="ti ti-x f-20"></i></a>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-4">
            <div class="bg-light rounded position-relative">
              <!-- Badge hiển thị trạng thái -->
              <div class="position-absolute end-0 top-0 p-3">
                <span class="badge bg-light-success" id="product-status">In
                  Stock</span>
              </div>
              <!-- Hình ảnh -->
              <div class="text-center mt-3">
                <div class="chat-avtar d-inline-flex mx-auto">
                  <img class="img-fluid" id="product-image"
                    src="../assets/images/application/prod-img-5.png"
                    alt="Product image">
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-8">
            <h5 id="product-name">Canon EOS 1500D 24.1 Digital</h5>
            <div class="table-responsive">
              <table class="table w-auto table-borderless">
                <tbody>
                  <tr>
                    <td class="text-muted py-1">Qty</td>
                    <td class="py-1" id="product-quantity">21</td>
                  </tr>
                  <tr>
                    <td class="text-muted py-1">Price</td>
                    <td class="py-1">
                      <h5 class="mb-0" id="product-price">$399</h5>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this product?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
          data-bs-dismiss="modal">Cancel</button>
        <a href="#" id="delete-confirm-btn" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>