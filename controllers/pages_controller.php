<?php
require_once('controllers/base_controller.php');
require_once('models/product.php');
class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function home()
  {
    //get Featured products from database
    $featured_products = ProductModel::getFeaturedProducts();
    $data = array('featured_products' => $featured_products);
    $this->render('home', $data);
  }


  public function error()
  {
    $this->render('error');
  }
  
  public function cart()
  {
    $this->render('cart');
  }
  public function listProduct()
  {
    $featured_products = ProductModel::getAllProducts();
    $data = array('featured_products' => $featured_products);
    $this->render('list_product', $data);
  }
}