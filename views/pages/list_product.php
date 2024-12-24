<section id="intro"
  class="hero-product position-relative text-center d-flex align-items-center justify-content-center">
  <div class="position-relative" style="z-index: 4">
    <h1 class="text-white">Tất cả sản phẩm</h1>
  </div>
</section>

<section id="list-products" class="product-store   my-md-5 pt-0">
  <div class="container-md">
    <div class="product-content padding-small">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
        <?php if (isset($featured_products) && !empty($featured_products)) : ?>
        <?php foreach ($featured_products as $product) : ?>
        <div class="col mb-4">
          <div class="product-card position-relative">
            <div class="card-img">
              <img src="<?= htmlspecialchars($product->product_image); ?>"
                alt="product-item" class="product-image img-fluid" />
              <div
                class="cart-concern position-absolute d-flex justify-content-center">
                <div
                  class="cart-button d-flex gap-2 justify-content-center align-items-center">
                  <button type="button" class="btn btn-light"
                    data-bs-toggle="modal" data-bs-target="#modallong">
                    <svg class="shopping-carriage">
                      <use xlink:href="#shopping-carriage"></use>
                    </svg>
                  </button>
                  <button type="button" class="btn btn-light"
                    data-bs-target="#modaltoggle" data-bs-toggle="modal"
                    data-product-id="<?= htmlspecialchars($product->product_id); ?>"
                    data-product-image="<?= htmlspecialchars($product->product_image); ?>"
                    data-product-name="<?= htmlspecialchars($product->product_name); ?>"
                    data-product-price="<?= htmlspecialchars($product->product_price); ?>"
                    data-product-sizes="<?= htmlspecialchars(json_encode($product->sizes)); ?>">
                    <svg class="quick-view">
                      <use xlink:href="#quick-view"></use>
                    </svg>
                  </button>

                </div>
              </div>
            </div>
            <div class="card-detail d-flex flex-column align-items-start mt-3">
              <h3 class="card-title fs-6 fw-normal m-0 product-name">
                <?= htmlspecialchars($product->product_name); ?>
              </h3>
              <span
                class="card-price fw-bold"><?= htmlspecialchars($product->product_price); ?>
                VND</span>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>