<div class="modal fade" id="modaltoggle" aria-hidden="true" tabindex="-1">
  <div
    class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="col-lg-12 col-md-12 me-3 position-relative">
          <div class="modal-close-btn position-absolute top-0 end-0">
            <button type="button" class="btn-close " data-bs-dismiss="modal"
              aria-label="Close"></button>
          </div>
          <div class="image-holder">
            <img src="" alt="Product Image" id="product-image"
              class="img-fluid" />
          </div>
        </div>
        <div class="col-lg-12 col-md-12">
          <div class="summary">
            <div class="summary-content fs-6">
              <div class="product-header d-flex justify-content-between mt-4">
                <h3 class="display-7 " id="product-name">Product Name</h3>

              </div>
              <span class=" fs-3" id="product-price">Product Price</span>
              <div class="row d-flex justify-content-start g-1 mb-4"
                id="size-options">
                <!-- Các lựa chọn size sẽ được thêm vào đây -->
              </div>
              <div class="variations-form shopify-cart">
                <div class="row">
                  <div class="col-md-6">
                    <div class="d-flex align-items-center">
                      <button class="btn btn-outline-secondary px-2"
                        id="decrease" type="button">-</button>
                      <input type="text" class="form-control text-center mx-1"
                        id="quantity" value="1" style="width: 50px;" />
                      <button class="btn btn-outline-secondary px-2"
                        id="increase" type="button">+</button>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <a rel="nofollow" data-no-instant="" href="#"
                      class="out-stock button">Out of stock</a>
                    <button type="submit"
                      class="btn btn-medium btn-black hvr-sweep-to-right">
                      Add to cart
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>