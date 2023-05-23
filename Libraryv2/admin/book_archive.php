<?php
require('dbconn.php');
require('checking.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Book Archive</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../asset/css/adminlte.min.css">
  <link rel="stylesheet" href="../asset/css/animate.min.css">
  <link rel="stylesheet" href="../asset/css/style.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../asset/tables/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../asset/tables/datatables-buttons/css/buttons.bootstrap4.min.css">
  <style>
    .card {
      width: 300px;
      margin-bottom: 20px;
    }

    .card-body {
      padding: 15px;
    }

    .book-image {
      width: 100%;
      height: 200px;
      background-color: #eee;
      margin-bottom: 10px;
    }

    .book-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .book-author {
      font-size: 14px;
      color: #666;
      margin-bottom: 10px;
    }

    .book-info {
      margin-bottom: 10px;
    }

    .modal-body p {
      margin-bottom: 10px;
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
          <a class="nav-link" data-widget="fullscreen" href="logout.php">
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
                        $image=$row['image'];  
                        echo $image ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php
                                      $sql="select * from Libraryv2.user where RollNo='$rollno'";
                                      $result=$conn->query($sql);
                                      $row=$result->fetch_assoc();
                                      $name=$row['Name'];  
                                      echo $name ?></a>
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
            <li class="nav-item animated bounceInRight">
              <a href="student.php" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Student
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
                  <a href="addbook.php" class="nav-link">
                    <i class="nav-icon fa fa-plus"></i>
                    <p>Add Book</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="book.php" class="nav-link">
                    <i class="nav-icon fa fa-list"></i>
                    <p>List of Books</p>
                  </a>
                </li>
                <li class="nav-item">
                              <a href="book_archive.php" class="nav-link">
                                 <i class="nav-icon fa fa-archive"></i>
                                 <p>Book Archive</p>
                              </a>
                           </li>
              </ul>
            </li>
            <li class="nav-item animated bounceInLeft">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-signature"></i>
                <p>
                  Requests
                </p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="issue_requests.php" class="nav-link">
                    <i class="nav-icon fa fa-paper-plane"></i>
                    <p>Issue Requests</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="renew_requests.php" class="nav-link">
                    <i class="nav-icon fa fa-share"></i>
                    <p>Renew Request</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="return_requests.php" class="nav-link">
                    <i class="nav-icon fa fa-reply-all"></i>
                    <p>Return Request</p>
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
                  <a href="pre.php" class="nav-link">
                    <i class="nav-icon fa fa-tag"></i>
                    <p>Previously Issued Books</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="history.php" class="nav-link">
                    <i class="nav-icon fa fa-trash"></i>
                    <p>Recently Deleted Books</p>
                  </a>
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
              <h1 class="m-0"><span class="fa fa-book"></span>List of Books</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Books</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <section class="content">
    <div class="container-fluid">
      <div class="row">
        <?php
        $xmlFile = 'book_data.xml';

        if (file_exists($xmlFile)) {
          $xml = simplexml_load_file($xmlFile);

          foreach ($xml->book as $book) {
            $section = (string)$book->Section;
            $name = (string)$book->Textbook;
            $author = (string)$book->Author;
            $isbn = (string)$book->ISBN;
            $availability = (string)$book->Availability;
            $status = (string)$book->Status;
            $image = (string)$book->image;
        ?>
       <div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <?php if ($image != NULL) { ?>
              <div class="book-image" style="display: flex; align-items: center; justify-content: center; height: 200px;">
              <img src="../uploads/<?php echo $image; ?>" class="img-fluid" style="max-height: 100%; max-width: 100%;" alt="Book Image">
                </div>
            <?php } else { ?>
                <div class="book-image">
                    <img src="../asset/img/blank.png" class="book-image" alt="Blank Image">
                </div>
            <?php } ?>
            <h5 class="card-title mb-3"><?php echo $name; ?> - <strong><?php echo $author; ?></strong></h5>
            <div class="card-text mb-4">
                <p><strong>Section:</strong> <?php echo $section; ?></p>
                <p><strong>ISBN:</strong> <?php echo $isbn; ?></p>
            </div>
            <div class="text-center">
                <button class="btn btn-primary view-details-btn" data-toggle="modal" data-target="#bookModal-<?php echo $isbn; ?>">View Details</button>
            </div>
        </div>
    </div>
</div>



              <!-- Modal -->
              <div class="modal fade" id="bookModal-<?php echo $isbn; ?>" tabindex="-1" role="dialog" aria-labelledby="bookModalLabel-<?php echo $bookid; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="bookModalLabel-<?php echo $bookid; ?>">Book Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <?php if ($image != NULL) { ?>
              <div class="book-image" style="display: flex; align-items: center; justify-content: center; height: 200px;">
              <img src="../uploads/<?php echo $image; ?>" class="img-fluid" style="max-height: 100%; max-width: 100%;" alt="Book Image">
                </div>
            <?php } else { ?>
                <div class="book-image" style="display: flex; align-items: center; justify-content: center; height: 200px;">
                    <img src="../asset/img/blank.png" class="img-fluid" style="max-height: 100%; max-width: 100%;" alt="Book Image">
                </div>
            <?php } ?>
                      <p><strong>Section:</strong> <?php echo $section; ?></p>
                      <p><strong>Book Name:</strong> <?php echo $name; ?></p>
                      <p><strong>Author:</strong> <?php echo $author; ?></p>
                      <p><strong>ISBN:</strong> <?php echo $isbn; ?></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
          }
            ?>
          </div>
        </div>
      </section>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->
  <script src="../asset/jquery/jquery.min.js"></script>
  <script src="../asset/js/bootstrap.bundle.min.js"></script>
  <script src="../asset/js/adminlte.js"></script>
  <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
  <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable();
    });
  </script>
</body>

</html>
