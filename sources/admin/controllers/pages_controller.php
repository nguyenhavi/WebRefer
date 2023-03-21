<?php
require_once(ADMIN_PATH.'controllers/base_controller.php');

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function home()
  {
    // Chỉ cần truyền vào array => tự trích xuất ra các biến
    // ==> Trong view tương ứng chỉ cần gọi lại những biến đã được truyền vào
    $data = array(
      'name' => 'Sang Beo',
      'age' => 22
    );
    $this->render('home', $data);
  }
  
  public function error()
  {
    $this->render('error');
  }
}