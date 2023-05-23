<?php
require('dbconn.php');
require('checking.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>PAHINA AKLATAN</title>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="../asset/css/adminlte.min.css">
      <link rel="stylesheet" href="../asset/css/animate.min.css">
      <link rel="stylesheet" href="../asset/css/style.css">

      <style>
  .required:after {
    content:" *";
    color: red;
  }
   </style>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="../index.php">
                  <i class="fas fa-power-off"></i>
                  </a>
               </li>
            </ul>
         </nav>
         <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgba(62,88,113);">
                        <!-- Brand Logo -->
            <a href="index.php" class="brand-link animated swing">
            <img src="../asset/img/logo.png" alt="Aklatan Logo" width="200">
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar user panel (optional) -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                     <img src="<?php 
                                    $sql="select * from Libraryv2.user where RollNo='$rollno'";
                                    $result=$conn->query($sql);
                                    $row=$result->fetch_assoc();
                                  
                         
                                    $image=$row['image'];  echo $image ?>" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                     <a href="#" class="d-block"><?php
                   $sql="select * from Libraryv2.user where RollNo='$rollno'";
                   $result=$conn->query($sql);
                   $row=$result->fetch_assoc();
                 
        
                   $name=$row['Name'];  echo $name ?></a>
                  </div>
               </div>
                              <!-- Sidebar Menu -->
                              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <li class="nav-item animated bounceInLeft">
                        <a href="index.php" class="nav-link">
                           <i class="nav-icon fa fa-tachometer-alt"></i>
                           <p>
                              Dashboard
                           </p>
                        </a>
                     </li>
                     <li class="nav-item animated bounceInLeft">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-envelope"></i>
                           <p>
                              Messages
                           </p>
                           <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="message.php" class="nav-link">
                                 <i class="nav-icon fa fa-plus"></i>
                                 <p>Send Message</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="receive.php" class="nav-link">
                                 <i class="nav-icon fa fa-comment"></i>
                                 <p>Messages Received</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item animated bounceInRight">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-book"></i>
                           <p>
                              Books
                           </p>
                           <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="book.php" class="nav-link">
                                 <i class="nav-icon fa fa-list"></i>
                                 <p>List of Books</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item animated bounceInRight">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-tasks"></i>
                           <p>
                              Issued
                           </p>
                              <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="current.php" class="nav-link">
                                 <i class="nav-icon fa fa-bookmark"></i>
                                 <p>Currently Issued Books</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="history.php" class="nav-link">
                                 <i class="nav-icon fa fa-tag"></i>
                                 <p>Previously Issued Books</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                  </ul>
                  </li>
                  </ul>
               </nav>
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6 animated bounceInRight">
                        <h1 class="m-0"><span class="fa fa-book"></span>Book Details</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Book Details</li>
                        </ol>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php
            $bookid = $_GET['id'];
            $sql = "select * from Libraryv2.book where Bookid='$bookid'";
         
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
        
            $section=$row['Section'];

            $subject=$row['Subject'];
            $name=$row['Textbook'];
            $vol=$row['Volume'];
            $year=$row['Year'];
            $avail=$row['Availability'];
            $author=$row['Author'];
            $isbn=$row['ISBN'];
            $status=$row['Status']; 
 

            ?>
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Book Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-12">
                     <div class="card-header">
                        <span class="fa fa-book"> Book Information</span>
              </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                        <label class="required">Book Section</label>
                        <select class="form-control" name = "Section" tabindex="1" value="SC" data-placeholder="" readonly>
                        <option value=""></option>
     <option value="General Reference"<?php echo($row['Section']=="General Reference")? 'selected':''; ?>>General Reference</option>
     <option value="Reference"<?php echo($row['Section']=="Reference")? 'selected':''; ?>>Reference</option>
     <option value="Filipiniana" <?php echo($row['Section']=="Filipiniana")? 'selected':''; ?>>Filipiniana</option>
     <option class="Periodical" <?php echo($row['Section']=="Periodical")? 'selected':''; ?>>Periodical</option>
     <option value="Reserved Books"<?php echo($row['Section']=="Reserved Books")? 'selected':''; ?>> Reserved Books</option>
     <option value="Graduate Studies" <?php echo($row['Section']=="Graduate Studies")? 'selected':''; ?>>Graduate Studies</option>
     <option value="Special Collections" <?php echo($row['Section']=="Special Collections")? 'selected':''; ?>>Special Collection</option>
     <option value="Rare Book"  <?php echo($row['Section']=="Rare Book")? 'selected':''; ?>> Rare Book</option>
     <option value="Computer Internet Area"  <?php echo($row['Section']=="Computer Internet Area")? 'selected':''; ?>>Computer Internet Area</option>
                        </select>
                      </div>
               </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control" placeholder="Subject" id="Subject" name="Subject" value="<?php echo $subject?>" readonly>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label class="required">Title</label>
                    <input type="text" class="form-control" placeholder="Title" id="book" name="book" readonly value="<?php echo $name?>">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label>Volume</label>
                    <input type="text" class="form-control" placeholder="Volume" id="Title" name="Title" readonly value="<?php echo $vol?>">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label class="required">Year</label>
                    <input type="text" class="form-control" placeholder="Year" id="Copyright" name="Copyright" readonly value="<?php echo $year?>">
                  </div>
               </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label class="required">Number of Copies</label>
                    <input type="number" class="form-control" placeholder="#" id="availability" name="availability" readonly value="<?php echo $avail?>">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label class="required">Author</label>
                    <input type="text" class="form-control" placeholder="Year" id="Author" name="Author" readonly value="<?php echo $author?>">
                  </div>
               </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label>ISBN</label>
                    <input type="text" class="form-control" placeholder="ISBN #" id="ISBN" name="ISBN" value="<?php echo $isbn?>" readonly>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                        <label class="required">Status</label>
                        <select class="form-control" name = "status" tabindex="1" value="SC" data-placeholder="Select-Status" readonly>
                        <option value=""></option>
                        <option value="GOOD" <?php echo($row['Status']=="GOOD")? 'selected':''; ?>>GOOD</option>
                        <option value="DAMAGE" <?php echo($row['Status']=="DAMAGE")? 'selected':''; ?>>DAMAGE</option>
                        <option value="DILAPIDATED" <?php echo($row['Status']=="DILAPIDATED")? 'selected':''; ?>>DILAPIDATED</option>
                        </select>
                      </div>
               </div>
            </div>
              </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="book.php" class="btn btn-primary">Back</a>
                </div>
              </form>
            </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->
      <!-- jQuery -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>


      <?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!')</script>";
} ?>
   </body>
</html>