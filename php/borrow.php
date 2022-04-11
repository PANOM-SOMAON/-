<?php
 session_start(); 
$id = $_GET['id'];
 $page = 'return';?> 
 <?php 
 include "header.php";
 include  "fucntion_query.php";
 ?>

 <body>

   <!-- Navigation -->
   <?php include "navbar.php"; ?>
   <!-- Page Content -->
   
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
   

     

     <div class="jumbotron">       
       <div class="row">
         <div class="col-lg-12 ">
          <h2 class="display-5 text-center">ตารางข้อมูลการยืม</h2>
          <br>

          <form action="save_history.php" method="post"> 
            <div class="container">
             <table id="example" class="table " cellspacing="0" width="100%">
               <thead class="thead-light">
                 <tr class="table-active">
                   <th width="5%">ลำดับ</th>
                   <th width="20%">ชื่อหนังสือ</th>
                   <th width="15%">วันที่ยืม</th>
                   
                   <th width="15%">เหลือเวลาอีก</th>
                   <th width="15%">ค่าปรับ(บาท)</th>
                   <th width="5%">สถานะ</th>
                 </tr>
               </thead>

               <tbody>
                 <?php 
                 $book = GetDetailLend($id);
                 for ($i=0; $i < count($book) ; $i++) { 
                   
                   ?>
                   <tr>
                     <td><?=$i+1;?></td>
                     <td > 
                     <h3> <img  src="imag/<?=$book[$i]->book_detail ?>"while="80px" height="70px" /></h3>
                         <?=$book[$i]->book_name?>
                     </td>
                     <td><?=DateThai($book[$i]->lent_date_strat)?></td>
                     
                     <td><?php
                      $num_day = number_format(DateTimeDiff(date('Y-m-d'),$book[$i]->lend_date_end));
                      if($num_day >= 0){
                        echo $num_day." วัน";
                      }else{
                        echo "เลยกำหนด ".str_replace("-","",$num_day)." วัน";
                      }

                      ?></td>
                     <td>
                      <?php 
                        $sum = 0;
                        if($num_day < 0){
                          $sum = str_replace("-","",$num_day) * 5;
                        }
                        echo $sum." บาท"
                     ?></td>
                      <?php

                         if($sum >  0){
                           $status = 'bg-danger';
                           $text = 'โดนปรับ';
                         }else{
                           $status = 'bg-info';
                           $text = 'ปกติ';
                         }
                         if ($book[$i]->status_lend != 0) {
                          $status = 'bg-success';
                          $text = 'คืนแล้ว';
                        }
                      ?>
                     <td class="badge <?=$status?>"><h5>
                        <?php echo $text?>
                        
                      </h5>
                    </td>
                   </tr>
                   <?php } ?>   

                 </tbody>
               </table>
             </div>

             <!-- <div class="row">
               <div class="col-lg-5"></div>
               <div class="col-lg-7">
                 <input type="submit" class="btn btn-success " name="" value="ยืม">
               </div>
             </div> -->
           </form>

         </div>
       </div>
     </div>
   </div>

     <!-- Bootstrap core JavaScript -->
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   <!-- Bootstrap core JavaScript -->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/popper/popper.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.0.0-beta/dt-1.10.16/datatables.min.js"></script>
   <script type="text/javascript">
     $(document).ready(function() {
       $('#example').DataTable({
         paging: false
       });
     } );
   </script>
 </body>

 </html>
