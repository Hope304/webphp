(function ($) {
  ("use strict");

  // init jarallax parallax
  var initJarallax = function () {
    jarallax(document.querySelectorAll(".jarallax"));

    jarallax(document.querySelectorAll(".jarallax-img"), {
      keepImg: true,
    });
  };

  // input spinner
  var initProductQty = function () {
    $(".product-qty").each(function () {
      var $el_product = $(this);
      var quantity = 0;

      $el_product.find(".quantity-right-plus").click(function (e) {
        e.preventDefault();
        var quantity = parseInt($el_product.find(".quantity").val());
        $el_product.find(".quantity").val(quantity + 1);
      });

      $el_product.find(".quantity-left-minus").click(function (e) {
        e.preventDefault();
        var quantity = parseInt($el_product.find(".quantity").val());
        if (quantity > 0) {
          $el_product.find(".quantity").val(quantity - 1);
        }
      });
    });
  };

  // init Chocolat light box
  var initChocolat = function () {
    Chocolat(document.querySelectorAll(".image-link"), {
      imageSize: "contain",
      loop: true,
    });
  };

  // Animate Texts
  var initTextFx = function () {
    $(".txt-fx").each(function () {
      var newstr = "";
      var count = 0;
      var delay = 0;
      var stagger = 10;
      var words = this.textContent.split(/\s/);

      $.each(words, function (key, value) {
        newstr += '<span class="word">';

        for (var i = 0, l = value.length; i < l; i++) {
          newstr +=
            "<span class='letter' style='transition-delay:" +
            (delay + stagger * count) +
            "ms;'>" +
            value[i] +
            "</span>";
          count++;
        }
        newstr += "</span>";
        newstr +=
          "<span class='letter' style='transition-delay:" +
          delay +
          "ms;'>&nbsp;</span>";
        count++;
      });

      this.innerHTML = newstr;
    });
  };

  $(document).ready(function () {
    initProductQty();
    initJarallax();
    initChocolat();
    initTextFx();

    $(".user-items .search-item").click(function () {
      $(".search-box").toggleClass("active");
      $(".search-box .search-input").focus();
    });
    $(".close-button").click(function () {
      $(".search-box").toggleClass("active");
    });

    var breakpoint = window.matchMedia("(max-width:61.93rem)");

    if (breakpoint.matches === false) {
      var swiper = new Swiper(".main-swiper", {
        slidesPerView: 1,
        spaceBetween: 48,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          900: {
            slidesPerView: 2,
            spaceBetween: 48,
          },
        },
      });

      // homepage 2 slider
      var swiper = new Swiper(".thumb-swiper", {
        direction: "horizontal",
        slidesPerView: 6,
        spaceBetween: 6,
        breakpoints: {
          900: {
            direction: "vertical",
            spaceBetween: 6,
          },
        },
      });
      var swiper2 = new Swiper(".large-swiper", {
        spaceBetween: 48,
        effect: "fade",
        slidesPerView: 1,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        thumbs: {
          swiper: swiper,
        },
      });
    }

    // product single page
    var thumb_slider = new Swiper(".product-thumbnail-slider", {
      slidesPerView: 5,
      spaceBetween: 10,
      // autoplay: true,
      direction: "vertical",
      breakpoints: {
        0: {
          direction: "horizontal",
        },
        992: {
          direction: "vertical",
        },
      },
    });

    // product large
    var large_slider = new Swiper(".product-large-slider", {
      slidesPerView: 1,
      // autoplay: true,
      spaceBetween: 0,
      effect: "fade",
      thumbs: {
        swiper: thumb_slider,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  }); // End of a document

  $(window).load(function () {
    $(".preloader").fadeOut();
  });

  /* Custom Sticky Menu  */
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll < 100) {
      $(".header-sticky").removeClass("sticky-bar");
    } else {
      $(".header-sticky").addClass("sticky-bar");
    }
  });

  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll < 100) {
      $(".header-sticky").removeClass("sticky");
    } else {
      $(".header-sticky").addClass("sticky");
    }
  });
})(jQuery);

// Sử dụng jQuery để lắng nghe sự kiện khi mở modal
$("#modaltoggle").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Nút "Quick View"

  // Lấy thông tin từ các data-* attributes
  var productId = button.data("product-id");
  var productName = button.data("product-name");
  var productPrice = button.data("product-price");
  var productImage = button.data("product-image");
  var productSizes = button.data("product-sizes"); // Mảng JSON về kích thước và số lượng

  // Cập nhật nội dung modal
  var modal = $(this);
  modal.find("#product-name").text(productName); // Tiêu đề modal
  modal.find("#product-price").text(productPrice + " VND"); // Giá sản phẩm
  modal.find("#product-image").attr("src", productImage); // Hình ảnh sản phẩm

  $("#size-options").empty();
  if (productSizes && Object.keys(productSizes).length > 0) {
    Object.keys(productSizes).forEach(function (size) {
      var stockQuantity = productSizes[size]; // Lấy số lượng tồn kho của size này

      // Chỉ hiển thị size nếu số lượng tồn kho > 0
      var radioOption = $("<div>", {
        class: "col-auto",
      }).append(
        $("<input>", {
          type: "radio",
          class: "btn-check ",
          name: "options-outlined",
          id: "size-" + size,
          value: size,
          autocomplete: "off",
          disabled: parseInt(stockQuantity) === 0, // Disabled nếu hết hàng
        }),
        $("<label>", {
          class:
            "btn btn-outline-danger form-check-label justify-content-center d-flex",
          for: "size-" + size,
          text: size,
        })
      );

      $("#size-options").append(radioOption);
    });
  }
});

$("#cust-modal").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Nút "Quick View"

  // Lấy thông tin từ các data-* attributes
  var productId = button.data("product-id");
  var productName = button.data("product-name");
  var productPrice = button.data("product-price");
  var productImage = button.data("product-image");
  var productQuantity = button.data("total-quantity");
  var productStatus = button.data("product-status");
  console.log(productId);
  console.log("sdsd");
  // Cập nhật nội dung modal
  var modal = $(this);
  modal.find("#product-name").text(productName); // Tiêu đề modal
  modal.find("#product-price").text(productPrice + " VND"); // Giá sản phẩm
  modal.find("#product-image").attr("src", productImage); // Hình ảnh sản phẩm
  modal.find("#product-quantity").text(productQuantity);
  modal.find("#product-status").text(productStatus);
});
document.getElementById("decrease").addEventListener("click", function () {
  const quantityInput = document.getElementById("quantity");
  let value = parseInt(quantityInput.value, 10) || 0;
  if (value > 1) quantityInput.value = value - 1;
});

document.getElementById("increase").addEventListener("click", function () {
  const quantityInput = document.getElementById("quantity");
  let value = parseInt(quantityInput.value, 10) || 0;
  quantityInput.value = value + 1;
});

function previewImage(event) {
  const file = event.target.files[0];
  const reader = new FileReader();

  reader.onload = function (e) {
    const imagePreview = document.getElementById("image-preview");
    const selectedImage = document.getElementById("selected-image");

    // Hiển thị ảnh lên màn hình
    selectedImage.src = e.target.result;
    selectedImage.style.display = "block";
  };

  // Đọc tệp ảnh
  if (file) {
    reader.readAsDataURL(file);
  }
}

function confirmDelete(productId) {
  // Lấy nút trong modal và gắn URL phù hợp
  const deleteBtn = document.getElementById("delete-confirm-btn");
  deleteBtn.href = `index.php?controller=admin&action=deleteProduct&id=${productId}`;

  // Hiển thị modal
  const deleteModal = new bootstrap.Modal(
    document.getElementById("deleteModal")
  );
  deleteModal.show();
}
