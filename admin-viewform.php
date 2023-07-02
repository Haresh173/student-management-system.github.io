<?php 
include 'filelogic.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>STUDENT MANAGEMENT SYSTEM</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content = "IE=edge">
        <meta name="viewport" content = "width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <style type="text/css">
            .table thead tr{
              background-color: #343a40;
              color: #fff;
            }

            .table tbody tr{
              background-color: #fff;
            }

            .content .box{
               padding: 3rem;
            }

            .text-black{
              color: #000;
              opacity: 1;
            }

            .btn{
              background: #AD1C10;
              border-color: #AD1C10 ;
              color: #fff;
            }
        </style>
    </head>


<body>
   <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="admin-dashboard.php">STUDENT MANAGEMENT SYSTEM</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <!-- <a class="nav-link" href="admin-viewform.php">Home <span class="sr-only">(current)</span></a> -->
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="logout.php">Log Out</a>
              </li>
            </ul>
          </div>
        </nav>
    </header>
    <div class="sidebar">
      <a href="admin-dashboard.php" class="list-group-item list-group-item-action py-2 ripple">Dashboard</a>
      <a href="admin-viewform.php" class="list-group-item list-group-item-action py-2 ripple active">View Credit Transfer Form</a>
      <a href="admin-feedback.php" class="list-group-item list-group-item-action py-2 ripple">Manage Feedbacks</a>
    </div>
    <div class="content">
        <div class="box">
           <h2 class="mb-3">View Credit Transfer Form Files</h2>
           <div class="row">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>File Name</th>
                    <th>Size of file</th>
                    <th>Download Count</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($files as $file): ?>

                    <tr>
                      <td><p class="my-0 text-black filename" data-id="<?php echo $file['id']; ?>"><?php echo $file['name'];?></p></td>
                      <td><?php echo $file['size'];?> </td>
                      <td><?php echo $file['downloads']; ?></td>
                      <td>
                        <a onclick="previewPdf('<?php echo $file['id']; ?>')" class="btn btn-primary mr-1 btn-sm px-4">View</a>
                        <a class="btn btn-dark btn-sm" href="admin-viewform.php?file_id=<?php echo $file['id']?>">Download</a></td>
                    </tr>

                    <?php endforeach; ?>
                </tbody>
              </table>
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

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){




    });

    function previewPdf(fileid){

        var filename = $(`.filename[data-id='${fileid}']`).text();
        $('.embedPdf').attr('src', 'uploads/'+filename);

    }

</script>

</html>
