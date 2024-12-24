<div class="search-box bg-dark position-relative">
  <div class="search-wrap">
    <div class="close-button">
      <svg class="close" style="fill: white">
        <use xlink:href="#close"></use>
      </svg>
    </div>
    <form id="search-form" class="text-lg-center text-md-left pt-3"
      action="index.html" method="get">
      <input type="text" class="search-input" placeholder="Search..." />
      <svg class="search">
        <use xlink:href="#search"></use>
      </svg>
    </form>
  </div>
</div>

<!-- quick view -->

<!-- cart view -->
<div class="modal fade" id="modallong" tabindex="-1" aria-modal="true"
  role="dialog">
  <div
    class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5">Cart</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="shopping-cart">
          <div class="shopping-cart-content">
            <div class="mini-cart cart-list p-0 mt-3">
              <div class="mini-cart-item d-flex border-bottom pb-3">
                <div class="col-lg-2 col-md-3 col-sm-2 me-4">
                  <a href="#" title="product-image">
                    <img src="uploads/images/img1.jpg" class="img-fluid"
                      alt="single-product-item" />
                  </a>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8">
                  <div
                    class="product-header d-flex justify-content-between align-items-center mb-3">
                    <h4 class="product-title fs-6 me-5">
                      Sport Shoes For Men
                    </h4>
                    <a href="" class="remove" aria-label="Remove this item"
                      data-product_id="11913" data-cart_item_key="abc"
                      data-product_sku="">
                      <svg class="close">
                        <use xlink:href="#close"></use>
                      </svg>
                    </a>
                  </div>
                  <div
                    class="quantity-price d-flex justify-content-between align-items-center">
                    <div class="input-group product-qty">
                      <button type="button"
                        class="quantity-left-minus btn btn-light rounded-0 rounded-start btn-number"
                        data-type="minus">
                        <svg width="16" height="16">
                          <use xlink:href="#minus"></use>
                        </svg>
                      </button>
                      <input type="text" name="quantity"
                        class="form-control input-number quantity" value="1" />
                      <button type="button"
                        class="quantity-right-plus btn btn-light rounded-0 rounded-end btn-number"
                        data-type="plus">
                        <svg width="16" height="16">
                          <use xlink:href="#plus"></use>
                        </svg>
                      </button>
                    </div>
                    <div class="price-code">
                      <span class="product-price fs-6">$99</span>
                    </div>
                  </div>
                  <!-- quantity-price -->
                </div>
              </div>
            </div>
            <!-- cart-list -->
            <div class="mini-cart-total d-flex justify-content-between py-4">
              <span class="fs-6">Subtotal:</span>
              <span class="special-price-code">
                <span class="price-amount amount fs-6" style="opacity: 1">
                  <bdi>
                    <span class="price-currency-symbol">$</span>198.00
                  </bdi>
                </span>
              </span>
            </div>
            <div class="modal-footer my-4 justify-content-center">
              <button type="button"
                class="btn btn-red hvr-sweep-to-right dark-sweep">
                View Cart
              </button>
              <button type="button"
                class="btn btn-outline-gray hvr-sweep-to-right dark-sweep">
                Checkout
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Login -->


<!-- hero-->
<section id="intro" class="hero-section position-relative text-center mt-4">
  <div class="position-relative d-inline-block">
    <!-- Front Text "snea" -->
    <div class="text-front">
      <span class="text-front_tital fw-bold">snea</span>
      <p class="text-front-subtitle">NEW CONCEPT FOR SUMMER</p>
    </div>

    <!-- Image of the Shoe -->
    <img src="../../assets/images/slider.png" alt="Sneaker"
      class="shoe-image img-fluid position-relative" />

    <!-- Back Text "ker" -->
    <span class="text-back fw-bold">ker</span>
  </div>
</section>
<!--discount-coupon-->
<section class="discount-coupon py-2 my-2 py-md-5 my-md-5">
  <div class="container">
    <div class="bg-gray coupon position-relative p-5">
      <div class="bold-text position-absolute">10% OFF</div>
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-7 col-md-12 mb-3">
          <div class="coupon-header">
            <h2 class="display-7">10% Phiếu giảm giá</h2>
            <p class="m-0">
              Đăng ký với chúng tôi để được giảm giá 10% cho tất cả các giao
              dịch mua hàng
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="btn-wrap">
            <a href="#"
              class="btn btn-black btn-medium text-uppercase hvr-sweep-to-right">Email
              me</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--product-store-->
<section id="featured-products" class="product-store">
  <div class="container-md">
    <div
      class="display-header d-flex align-items-center justify-content-between">
      <h2 class="section-title text-uppercase">Sản phẩm nổi bật</h2>
      <div class="btn-right">
        <a href="index.php?controller=pages&action=listProduct"
          class="d-inline-block text-uppercase text-hover fw-bold">Xem tất
          cả</a>
      </div>
    </div>
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
</section>
<section id="collection-products" class="py-2 my-2 py-md-5 my-md-5">
  <div class="container-md">
    <div class="row">
      <div class="col-lg-6 col-md-6 mb-4">
        <div
          class="collection-card card border-0 d-flex flex-row align-items-end jarallax-keep-img position-relative">
          <img src="../../assets/images/collection-item1.jpg" alt="product-item"
            class="border-rounded-10 img-fluid jarallax-img" />
          <div class="card-detail p-3 m-3 p-lg-5 m-lg-5 position-absolute">
            <h3 class="card-title display-3">
              <a href="#">Bộ sưu tập giày tối giản</a>
            </h3>
            <a href="index.php?controller=pages&action=home"
              class="text-uppercase mt-3 d-inline-block text-hover fw-bold">Shop
              Now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div
          class="collection-card card border-0 d-flex flex-row jarallax-keep-img position-relative">
          <img src="../../assets/images/collection-item2.jpg" alt="product-item"
            class="border-rounded-10 img-fluid jarallax-img" />
          <div class="card-detail p-3 m-3 p-lg-5 m-lg-5 position-absolute">
            <h3 class="card-title display-3">
              <a href="#">Bộ sưu tập giày thể thao</a>
            </h3>
            <a href="index.php?controller=pages&action=home"
              class="text-uppercase mt-3 d-inline-block text-hover fw-bold">Shop
              Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="latest-products"
  class="product-store py-2 my-2 py-md-5 my-md-5 pt-0">
  <div class="container-md">
    <div
      class="display-header d-flex align-items-center justify-content-between">
      <h2 class="section-title text-uppercase">Sản phẩm mới nhất</h2>
      <div class="btn-right">
        <a href="index.php?controller=pages&action=listProduct"
          class="d-inline-block text-uppercase text-hover fw-bold">Xem tấ
          cả</a>
      </div>
    </div>
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