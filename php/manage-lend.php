<?php
session_start();
$page = 'lend'; ?>
<?php
include "header.php";
include  "fucntion_query.php";
?>
<?php
$name = $_POST["dat"]; // สม

$sql = "SELECT * FROM tb_book WHERE book_name LIKE '%$name%' ORDER BY book_name ASC";
$result = mysqli_query($conn, $sql);
$countt = mysqli_num_rows($result);
$order = 1;
?>
 <!DOCTYPE html>
 <html lang="en">
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <head>
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
 </head>
<body>

  <!-- Navigation -->
  <?php include "navbar.php"; ?>
  <!-- Page Content -->

  <div>
    

      

    

          <form action="save_history.php" method="post">
            <div class="container">
             
              <?php if ($countt > 0) { ?>
                <table id="example" class="table table-bordered" >
                  <thead>
                    <tr >
                      <th scope="col">ลำดับ</th>
                      
                      <th scope="col">ชื่อหนังสือ</th>
                      <th scope="col">ชื่อผู้เขียน</th>
                      <th scope="col">รหัสหนังสือ</th>
                      <th scope="col">ปี</th>
                      <th scope="col">อัปโหลด</th>
                      <th scope="col">สถานะ</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php

                    $book = GetDataBooks();
                    for ($i = 0; $i < count($book); $i++) {
                      $disabled = '';
                      if ($book[$i]->book_status == 'ปกติ') {
                        $status = ' bg-info';
                      } elseif ($book[$i]->book_status == 'ถูกยืม') {
                        $status = 'bg-danger';
                        $disabled = 'disabled';
                      } elseif ($book[$i]->book_status == 'หาย') {
                        $status = 'bg-dark';
                        $disabled = 'disabled';
                      } else {
                        $status = 'secondary';
                        $disabled = 'disabled';
                      }
                      $checked = '';
                      if ($_SESSION["book_id"] == $book[$i]->book_id) {
                        $checked = 'checked';
                      }
                    ?>
                      <tr>
                        <td><?= $i + 1; ?></td>
                        
                        <td>
                        <h3> <img  src="imag/<?=$book[$i]->book_detail ?>"while="80px" height="70px" /></h3>
                          <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="<?= $book[$i]->book_id ?>" name="book_id[]" <?= $disabled ?> <?= $checked ?>>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description"><?= $book[$i]->book_name ?></span>
                            <a href="<?= $book[$i]->book_detail != '' ? $book[$i]->book_detail : '#'; ?>" target="_blank"></a>
                          </label>
                        </td>
                        
                        <td><?= $book[$i]->book_user ?></td>
                        <td><?= $book[$i]->book_code ?></td>
                        <td><?= $book[$i]->book_year ?></td>
                        <td><?= DateThai($book[$i]->book_date) ?></td>
                        <td>
                          <h5><span class="badge <?= $status ?>"><?= $book[$i]->book_status ?></span></h5>
                        </td>
                      </tr>
                    <?php } ?>

                  </tbody>
                </table>
              <?php } else { ?>
                <div class="alert alert-danger">
                  <b>ไม่พบข้อมูลที่ค้นหา !!!<b>
                </div>
              <?php } ?>
            </div>

            <div class="row">
              <div class="col-lg-6"></div>
              <div class="col-lg-6">
                <input type="submit" class="btn btn-success " name="submit" id="submit" value="ยืมหนังสือ">
              </div>
            </div>
          </form>

       
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.0.0-beta/dt-1.10.16/datatables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        paging: false
      });

      $("form").submit(function() {

        var checked = []
        $("input[name='book_id[]']:checked").each(function() {
          checked.push(parseInt($(this).val()));
        });

        if (checked.length == 0) {
          alert("กรุณาเลือกหนังสือที่ต้องการยืม !");
          return false;
        } else {
          alert("ทำการยืมเรียบร้อย !");
          return true;
        }

      });
    });
  </script>
</body>

</html>