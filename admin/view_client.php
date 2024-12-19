

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Owner Dashboard </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php include 'navbar.php' ?>
    <?php 
    
    $msg="";
    
    $fetch = $fun->view_client();
    ?>
    <div class="container-fluid page-body-wrapper">
        <?php include 'sidebar.php' ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    
                                <h4 class="card-title">Client Details</h4>
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Details</h4>
                                            <p class="card-description">
                                               
                                            </p>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr_NO</th>
                                                            <th>Full Name</th>
                                                            <th>Email</th>
                                                            <th>Mobile</th>
                                                            <th>Date of Birth</th>
                                                            <th>Address</th>
                                                            <th>Short Discription</th>
                                                            <th>Action</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                         if(mysqli_num_rows($fetch)>0){
                                                         $sr = 1;
                                                        while($res = mysqli_fetch_assoc($fetch)){
                                                         ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $sr;?></th>
                                                            <td><?php echo $res['name'];?></td>
                                                            <td><?php echo $res['email'];?></td>
                                                            <td><?php echo $res['mobile_number'];?></td>
                                                            <td><?php echo $res['dob'];?></td>
                                                            <td><?php echo $res['address'];?></td>
                                                            <td><?php echo $res['description'];?></td>
                                                           

                                                            <!-- edit and delete -->
                                                            <td class="">
                                                     <a href="edit_client.php?client&id=<?php echo $res['id']?>"><button type="button"
                                                                    class="btn btn-primary">Edit</button></a>
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                    onclick="deleteclient(<?php echo $res['id']?>)"
                                                                    class="btn btn-danger">
                                                                    Delete
                                                                   
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                         $sr++;
                                                          }
                                                          }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial: ./partials/_footer.html -->

            <!-- partial -->
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
     <?php include 'footer.php';?>
 <!-- plugins:js -->
 <script src="vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="vendors/chart.js/Chart.min.js"></script>
            <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
            <script src="vendors/progressbar.js/progressbar.min.js"></script>

            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="js/off-canvas.js"></script>
            <script src="js/hoverable-collapse.js"></script>
            <script src="js/template.js"></script>
            <script src="js/settings.js"></script>
            <script src="js/todolist.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page-->
            <script src="js/jquery.cookie.js" type="text/javascript"></script>
            <script src="js/dashboard.js"></script>
            <script src="js/Chart.roundedBarCharts.js"></script>
            <!-- End custom js for this page-->

            
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="ajax-script.js" type="text/javascript"></script>


    <script>
   async function deleteclient(id){
        const response = await fetch(`delete.php?client=true&id=${id}`);
        //const res = await response.text();
        //alert(res);   
        window.location.reload();
    }

   
</script>


</body>

</html>