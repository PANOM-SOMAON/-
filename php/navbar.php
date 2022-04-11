<?php
$active_index = '';
$active_register = '';
$active_admin  = '';
$active_lend = '';
$active_return = '';
$active_book = '';

if ($page == 'index') {
  $active_index = 'active';
} elseif ($page == 'register') {
  $active_register = 'active';
} elseif ($page == 'admin') {
  $active_admin = 'active';
} elseif ($page == 'lend') {
  $active_lend = 'active';
} elseif ($page == 'return') {
  $active_return = 'active';
} elseif ($page == 'book') {
  $active_book = 'active';
}
?>
<header class="header">

  <div class="header-1">

    <a href="#" class="logo"> <i class="fas fa-book"></i> bookly </a>

    <form action="" class="search-form">
      <input type="search" name="" placeholder="search here..." id="search-box">
      <label for="search-box" class="fas fa-search"></label>
    </form>

    <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            
            <div id="login-btn" class="fas fa-user"></div>
        </div>

  </div>
  <?php
  if (isset($_SESSION["status"])) {
    $user = getUser($_SESSION["id"]);
    if ($_SESSION["status"] == 0) {

  ?>
      <!-- User -->
      <div class="header-2">
        <nav class="navbar">
          <a href="index.php">home</a>
          <a href="manage-lend.php">book</a>
          <a href="borrow.php">ตารางยืม</a>
          <a href="returns.php">ตารางคืน</a>
          <a href="logout.php">ออกจากระบบ</a>

        </nav>
      </div>

    <?php } else { ?>
      <!-- Admin -->
      <div class="header-2">
        <nav class="navbar">
          <a href="index.php">home</a>
          <a href="manage-lend-admin.php">book</a>
          <a href="">ตารางยืม</a>
          <a href="returns.php">ตารางคืน</a>
          <a href="logout.php">ออกจากระบบ</a>


        </nav>
      </div>
    <?php }
  } else { ?>
    <!-- orther -->
    <div class="header-2">
        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="lend.php">book</a>
            <a href="register.php">ลงทะเบียน</a>
            <a href="admin-page.php">เข้าสู่ระบบ</a>
            
            
        </nav>
    </div>

  <?php } ?>


  </header>