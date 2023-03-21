<?php
require_once(USER_PATH . 'controllers/base_controller.php');
require_once(USER_PATH.'models/Product.php');
require_once(USER_PATH.'models/Order.php');
require_once(USER_PATH.'models/Category.php');
class ProductsController extends BaseController
{
  function __construct()
  {
    $this->folder = 'products';
  }

  // public function cate1()
  // {
   
  //   // 
  //   if (isset($_POST['bestsellers'])) {
  //     $products_men = Product::select_cate_type(1,1);
  //   }
  //   else if (isset($_POST['onsale'])) {
  //     $products_men = Product::select_cate_type(1,3);
  //   }
  //   else if (isset($_POST['newarrival'])) {
  //     $products_men = Product::select_cate_type(1,2);
  //   }
  //   else {
  //     $products_men = Product::select_category(1);
  //   }    
  //   $data = array('products' => $products_men, 'cate'=>['Nam',1]) ;
  //   $this->render('products', $data);
  // }
  // public function cate2()
  // {
   
  //   // 
  //   if (isset($_POST['bestsellers'])) {
  //     $products_women = Product::select_cate_type(2,1);
  //   }
  //   else if (isset($_POST['onsale'])) {
  //     $products_women = Product::select_cate_type(2,3);
  //   }
  //   else if (isset($_POST['newarrival'])) {
  //     $products_women = Product::select_cate_type(2,2);
  //   }
  //   else {
  //     $products_women = Product::select_category(2);
  //   }    
  //   $data = array('products' => $products_women, 'cate'=>['Nữ', 2]);
  //   $this->render('products', $data);
  // }

  // public function cate3()
  // {
  //   // 
    // if (isset($_POST['bestsellers'])) {
    //   $products_kid = Product::select_cate_type(3,1);
    // }
    // else if (isset($_POST['onsale'])) {
    //   $products_kid = Product::select_cate_type(3,3);
    // }
    // else if (isset($_POST['newarrival'])) {
    //   $products_kid = Product::select_cate_type(3,2);
    // }
  //   else {
  //     $products_kid = Product::select_category(3);
  //   }    
  //   $data = array('products' => $products_kid, 'cate'=>['Trẻ em',3]);
  //   $this->render('products', $data);
  // }
  public function home()
  {
    if (isset($_POST['bestsellers'])) {
      $products = Product::select_type(1);
    }
    else if (isset($_POST['onsale'])) {
//       $products = Product::select_type(3);
        $products = Product::select_saleoff();
    }
    else if (isset($_POST['newarrival'])) {
      $products = Product::select_type(2);
    }
    else {
      $products = Product::all();
    }
    $categories = Category::all();
    $data = array('products' => $products, 'categories'=>$categories);
    $this->render('products', $data);
  }

  public function product()
  {
   
    // 
    if (isset($_GET['id'])) {
      $product_with_id = Product::select_product_by_id($_GET['id']);
      $data = array('product' => $product_with_id);
      $this->render('product', $data);
    }
    else {
      //exit('Product does not exist!');
    }
  }
  public function cart()
  {
    if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
      $product_id = (int) $_POST['product_id'];
      $quantity = (int) $_POST['quantity'];

      $product = Product::select_product_by_id($_POST['product_id']);
      
      if ($product && $quantity > 0) {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
          if (array_key_exists($product_id, $_SESSION['cart'])) {
            $_SESSION['cart'][$product_id] += $quantity;
          } else {
            $_SESSION['cart'][$product_id] = $quantity;
          }
        } else {
          $_SESSION['cart'] = array($product_id => $quantity);
        }
      }
      header('location: /products/cart');
      exit();
    }
    if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
      unset($_SESSION['cart'][$_GET['remove']]);
      header('location: /products/cart');
      exit();
    }

    if (isset($_POST['update']) && isset($_SESSION['cart'])) {
      foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
          $id = str_replace('quantity-', '', $k);
          $quantity = (int) $v;
          if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
            $_SESSION['cart'][$id] = $quantity;
          }
        }
      }
      header('location: /products/cart');
      exit();
    }

    // Send the user to the place order page if they click the Place Order button, also the cart should not be empty
    if (isset($_POST['order']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
      // orderbutton 
      //header('Location: index.php?page=order');
      exit;
    }

    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $products = array();
    $subtotal = 0.00;
    if ($products_in_cart) {

      $products = Product::select_products_in_cart($products_in_cart);
      // Calculate the subtotal
      foreach ($products as $product) {
        if ($product['saleoff']) {
          $subtotal += (float) ($product['price'] - $product['price'] * $product['percentoff'] / 100) * (int) $products_in_cart[$product['id']];
        } else {
          $subtotal += (float) $product['price'] * (int) $products_in_cart[$product['id']];
        }
      }
    }
    // Get the amount of items in the shopping cart, this will be displayed in the header.
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

    $data = array('products' => $products, 
                  'products_in_cart' => $products_in_cart, 
                  'num_items_in_cart' => $num_items_in_cart,
                  'subtotal' => $subtotal);
    $this->render('cart', $data);
  }
  public function order() {
    // Check the session variable for products in cart
    if (isset($_SESSION['user'])) {
      $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
      $products = array();
      $subtotal = 0.00;
      if ($products_in_cart && isset($_POST['address_order']) && isset($_POST['province_order'])) {      
        $products = Product::select_products_in_cart($products_in_cart);
        foreach ($products as $product) {
          if ($product['saleoff']) {
            $subtotal += (float) ($product['price'] - $product['price'] * $product['percentoff'] / 100) * (int) $products_in_cart[$product['id']];
          } else {
            $subtotal += (float) $product['price'] * (int) $products_in_cart[$product['id']];
          }
        }
        $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
      
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $createtime = date('Y-m-d H:i:s');
        
        $input_insert_order = array(
          // 'id' => $order_id,
          'customer' => $_SESSION['user']['username'],
          'province' => $_POST['province_order'],
          'address' => $_POST['address_order'],
          'phone' => $_SESSION['user']['phone_num'],
          'cart_total' => $subtotal,
          'createtime' => $createtime,
          'message' => NULL,
          'status' => 0,
          'user_id' => $_SESSION['user']['id']
        );
        
        Order::insert_into_order($input_insert_order);
        // Order::insert_into_order($order_id, $user_id, $note, $order_date, $subtotal);

        foreach ($products as $product) {
            // $sql = "INSERT INTO orderdetails (order_id, product_id, price, amount, total) VALUES (?,?,?,?,?)";
            // $stmt = $pdo->prepare($sql);
          $order_id = Order::find_order_id_by_createtime($createtime, $_SESSION['user']['username']);
            $input_insert_detail = array(
              // 'id' => Order::new_orderdetails_id() + 1,
              'order_id' => $order_id,
              'product_id' => $product['id'],
              'quantity' => $products_in_cart[$product['id']],
              'price' => $product['price'],
              
            );
            // $stmt->execute([$order_id, $product_id, $price, $amount, $total]);
            Order::insert_into_orderdetails($input_insert_detail);
        }

        $products = array();
        $products_in_cart = array();
        unset($_SESSION['cart']);
      }

      // remove order:
      if (isset($_POST['remove_order'])) {
        Order::remove_order_by_id($_POST['remove_order_id']);
      }

      $orders = Order::orders_by_id($_SESSION['user']['username']);

      //$order_detail = Order::

      $order_details = array();
      foreach ($orders as $order) {
        $order_detail = array("'" . $order['id'] . "'" => Order::order_detail_by_id($order['id']));
        $order_details = array_merge($order_detail, $order_details);
      }

      $data = array('orders' => $orders, 'total_orders' => Order::total_orders_by_id($_SESSION['user']['username']), 'order_details' => $order_details);
      $this->render('order', $data);
    }
    else {
      header('location: /pages/login');
      exit();
    }
  }
  
}
