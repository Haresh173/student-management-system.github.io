<?php

include 'config.php';


if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
  $page_no = $_GET['page_no'];
} else {
  $page_no = 1;
}

$total_records_per_page = 10;
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

$query = "SELECT COUNT(*) As total_records FROM `student_signup`";

$result_count = mysqli_query($conn, $query);


$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;

$result = mysqli_query($conn, "SELECT * FROM `student_signup` LIMIT $offset, $total_records_per_page");

if (isset($_GET['did'])) {

  $sqlD = "DELETE FROM student_signup WHERE id= '" . $_GET['did'] . "'";
  if (mysqli_query($conn, $sqlD)) {
    echo "<script>alert('Delete Successfully!');</script>";
    echo "<script>window.location.href='admin-manageusers.php?page_no=" . $page_no . "'</script>";
  } else {
    echo "<script>alert('Delete Failed!')</script>";
    echo "<script>window.location.href='admin-manageusers.php?page_no=" . $page_no . "'</script>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>STUDENT MANAGEMENT SYSTEM</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/pagination.css">
  <style type="text/css">
    .table thead tr {
      background-color: #343a40;
      color: #fff;
    }

    .table tbody tr {
      background-color: #fff;
    }

    .content .box {
      padding: 3rem;
    }

    .text-black {
      color: #000;
      opacity: 1;
    }

    #usertable img {
      width: 50px;
    }

    .btn {
      background: #AD1C10;
      border-color: #AD1C10;
      color: #fff;
    }
  </style>
</head>


<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="admin-dashboard.php">DIRECT ENTRY SYSTEM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="logout.php">Log Out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="sidebar">
    <a href="admin-dashboard.php" class="list-group-item list-group-item-action py-2 ripple active">Dashboard</a>
    <a href="admin-viewform.php" class="list-group-item list-group-item-action py-2 ripple">View Credit Transfer Form</a>
    <a href="admin-feedback.php" class="list-group-item list-group-item-action py-2 ripple">Manage Feedbacks</a>
  </div>
  <div class="content">
    <div class="box">
      <h2 class="mb-3">Manage User</h2>
      <div class="row">
        <table class="table table-bordered" id="usertable">
          <thead>
            <tr>
              <th>#User ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Matric Number</th>
              <th>Program</th>
              <th>Profile Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              $count = 1;
              while ($row = mysqli_fetch_assoc($result)) {

                // <td>".nl2br($row['comment'])."</td>
                // <td>".$row['id']."</td>

                if ($row['image'] == '') {
                  $img = '<img src="images/default-avatar.jpg">';
                } else {
                  $img = '<img src="uploaded_img/' . $row['image'] . '">';
                }

                echo " <tr>
                                      <td>" . $row['id'] . "</td>
                                      <td>" . $row['name'] . "</td>
                                      <td>" . $row['email'] . "</td>
                                      <td>" . $row['phone_number'] . "</td>
                                      <td>" . $row['matric_number'] . "</td>
                                      <td>" . $row['program'] . "</td>
                                      <td>

                                          " . $img . "

                                      </td>
                                      <td><a class='btn btn-primary btn-sm px-4' href='admin-userdetails.php?id=" . $row['id'] . "'>Edit</a>"; ?>

                <a class='btn btn-dark btn-sm px-3' href='admin-manageusers.php?did=<?php echo $row['id'] ?>' onclick="javascript:return confirm('Confirm to delete?')">Delete</a></td>


            <?php
                $count++;
              }
            } else {
              echo " <tr>

                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>-</td>
                                
                                
                              </tr>";
            }



            ?>

          </tbody>
        </table>

        <div class="page-numbering">
          <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
          <ul class="pagination">

            <?php if ($page_no > 1) {
              echo "<li><a href='?page_no=1'>First Page</a></li>";
            } ?>

            <li <?php if ($page_no <= 1) {
                  echo "class='disabled'";
                } ?>>
              <a <?php if ($page_no > 1) {
                    echo "href='?page_no=$previous_page'";
                  } ?>>Previous</a>
            </li>


            <?php
            if ($total_no_of_pages <= 10) {
              for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                if ($counter == $page_no) {
                  echo "<li class='active'><a>$counter</a></li>";
                } else {
                  echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
              }
            } elseif ($total_no_of_pages > 10) {

              if ($page_no <= 4) {
                for ($counter = 1; $counter < 8; $counter++) {
                  if ($counter == $page_no) {
                    echo "<li class='active'><a>$counter</a></li>";
                  } else {
                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                  }
                }
                echo "<li><a onclick='clickPage()'>...</a></li>";
                echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
              } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                echo "<li><a href='?page_no=1'>1</a></li>";
                echo "<li><a href='?page_no=2'>2</a></li>";
                echo "<li><a onclick='clickPage()'>...</a></li>";
                for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                  if ($counter == $page_no) {
                    echo "<li class='active'><a>$counter</a></li>";
                  } else {
                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                  }
                }
                echo "<li><a onclick='clickPage()'>...</a></li>";
                echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
              } else {
                echo "<li><a href='?page_no=1'>1</a></li>";
                echo "<li><a href='?page_no=2'>2</a></li>";
                echo "<li><a onclick='clickPage()'>...</a></li>";
                for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                  if ($counter == $page_no) {
                    echo "<li class='active'><a>$counter</a></li>";
                  } else {
                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                  }
                }
              }
            }

            ?>

            <li <?php if ($page_no >= $total_no_of_pages) {
                  echo "class='disabled'";
                } ?>>
              <a <?php if ($page_no < $total_no_of_pages) {
                    echo "href='?page_no=$next_page'";
                  } ?>>Next</a>
            </li>

            <?php if ($page_no < $total_no_of_pages) {
              echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
            } ?>
          </ul>
        </div>
      </div>
      <div>



        <div class="container">
          <embed src="" type="application/pdf" width="100%" height="500px" class="embedPdf" />
        </div>
      </div>

</body>
<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <h6>About</h6>
        <p class="text-justify">Student Management System <i>is a website created for students from university where student can upload their credit transfer forms to be reviewed by admin
            and create a study plan </i> .</p>
      </div>

      <div class="col-xs-6 col-md-3">
        <h6>Quick Links</h6>
        <ul class="footer-links">
          <li><a href="#">Academic Calendar</a></li>
          <li><a href="#">E-learning</a></li>
        </ul>
      </div>

      <div class="col-xs-6 col-md-3">
        <h6>Social Medias</h6>
        <ul class="footer-links">
          <li><a href="https://www.facebook.com/">Facebook</a></li>
          <li><a href="https://www.instagram.com/">Instagram</a></li>
          <li><a href="https://twitter.com/">Twitter</a></li>
        </ul>
      </div>
    </div>
    <hr>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
        <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by Student Management System
          <a href="#"></a>
        </p>
      </div>
    </div>
  </div>
  </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {




  });

  function clickPage() {

    var totalpage = "<?php echo $total_no_of_pages ?>";

    let number = prompt("Enter page number", "1");
    if (number != null) {

      if (parseInt(number) > parseInt(totalpage)) {

        alert(`The total page number is ${totalpage} only`);

      } else if (charIsLetter(number)) {

        alert(`Enter number only`);

      } else {

        window.location.href = `?page_no=${number}`;

      }

    } else {
      alert('Please enter page number');
    }

  }

  function charIsLetter(char) {
    if (typeof char !== 'string') {
      return false;
    }

    return /^[a-z]+$/i.test(char);
  }

  function previewPdf(fileid) {

    var filename = $(`.filename[data-id='${fileid}']`).text();
    $('.embedPdf').attr('src', 'uploads/' + filename);

  }
</script>

</html>