<?php
  require_once '../connect.php'; //for connection of db

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>IMUN</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <?php include_once("sidebar.php") ?>
        <div class="main-panel">
            <?php include_once("navbar.php") ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color: #172337;">
                                    <h4 class="title">Registered Users</h4>
                                    <p class="category">User details</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Birthdate</th>
                                            <th>Gender</th>
                                            <th>Select</th>
                                            <th>Reject</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query = "SELECT * FROM `users` ";
                                                $result=mysqli_query($conn,$query);
                                                
                                                $rowCount = mysqli_num_rows($result);
                                                if($rowCount>0)
                                                {
                                                    while($row = mysqli_fetch_assoc($result)){
                                                        if($row['status']==0){
                                                        echo '<tr>
                                                                <td>'.$row["name"].'</td>
                                                                <td>'.$row["email"].'</td>
                                                                <td>'.$row["phone"].'</td>
                                                                <td style="color:#FF3333;">'.$row["dob"].'</td>
                                                                <td class="text-primary">'.$row["gender"].'</td>
                                                                <td><input style="background-color:green" type="submit" name="'.$row['email'].'" uname="'.$row["name"].'" class="btn btn-sm select" onclick="return false" value="Select"></td>
                                                                <td><input style="background-color:red" type="submit" name="'.$row['email'].'" uname="'.$row["name"].'" class="btn btn-sm reject" onclick="return false" value="Reject"></td>
                                                            </tr>';
                                                        }
                                                    }
                                                }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript">
    var x = document.getElementsByClassName('all');
    x[0].style.color="#172337";
</script>
</html>