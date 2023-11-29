<?php
require 'connection.php';

if (isset($_POST['addressource'])) {
    $ressources = mysqli_real_escape_string($conn, $_POST['ressourceName']);
    $subcategory = mysqli_real_escape_string($conn, $_POST['SubcategoryID']);
    $project = mysqli_real_escape_string($conn, $_POST['ProjectID']);

    $squadQuery = "SELECT SquadID FROM squad WHERE ProjectID = '$project';";
    $squadResult = mysqli_query($conn, $squadQuery);

    if ($squadResult) {
        $squadRow = mysqli_fetch_assoc($squadResult);

        $squadID = $squadRow['SquadID'];

        $insertQuery = "INSERT INTO resources(ressourceName, SubcategoryID, SquadID, ProjectID)
                        VALUES ('$ressources', '$subcategory', '$squadID', '$project')";
        $mysqliQuery = mysqli_query($conn, $insertQuery);
    }
}
if (isset($_GET['idressource'])){
    $RessourceID = $_GET['idressource'];
    $delet = "DELETE FROM `resources` WHERE ResourceID = $RessourceID";
    $mysqliquery = mysqli_query($conn, $delet);
}
if (isset($_POST['updatressource'])) {
    $ressourceID = mysqli_real_escape_string($conn,$_POST['ressourceID']);
    $ressourcename = mysqli_real_escape_string($conn,$_POST['ressourceName']);
    $categoryId = mysqli_real_escape_string($conn,$_POST['categoryRessource']);
    $subcategoryId = mysqli_real_escape_string($conn,$_POST['subcategoryRessource']);
    $projectId = mysqli_real_escape_string($conn,$_POST['projectRessource']);
    $editquery = "UPDATE resources SET ressourceName='$ressourcename', SubcategoryID='$subcategoryId', ProjectID='$projectId' where ResourceID='$ressourceID'";
	$mysqliquery = mysqli_query($conn, $editquery);
    }
    /*<?php
if (isset($_POST['updatressource'])) {
    $ressourceID = $_POST['ressourceID'];
    $ressourcename = $_POST['ressourceName'];
    $categoryId = $_POST['categoryRessource'];
    $subcategoryId = $_POST['subcategoryRessource'];
    $projectId = $_POST['projectRessource'];

    // Assuming $conn is your database connection
    $editquery = "UPDATE resources SET ressourceName=?, SubcategoryID=?, ProjectID=? WHERE ResourceID=?";
    
    // Using prepared statement
    $stmt = mysqli_prepare($conn, $editquery);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssi", $ressourcename, $subcategoryId, $projectId, $ressourceID);

        // Execute the statement
        $mysqliquery = mysqli_stmt_execute($stmt);

        if ($mysqliquery) {
            echo "Resource updated successfully";
        } else {
            echo "Error updating resource: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error in preparing the statement: " . mysqli_error($conn);
    }
}
?>*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Charts</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.php">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="Ressources.php">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.php">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="category.php">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="subcategory.php">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.php">Dashboard 1</a>
                                </li>
                                
                                </li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="Ressources.php">
                                <i class="fas fa-chart-bar"></i>Ressources</a>
                        </li>
                        <li>
                            <a href="table.php">
                                <i class="fas fa-table"></i>Users</a>
                        </li>
                        <li>
                            <a href="category.php">
                                <i class="far fa-check-square"></i>Category</a>
                        </li>
                        <li>
                            <a href="subcategory.php">
                                <i class="fas fa-calendar-alt"></i>Subcategory</a>
                        </li>
                        
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
            <div class="row m-t-5 m-l-30 m-r-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class = "table-data__tool">
                                <h3 class="title-5 m-b-35">data ressources</h3>
                                <a href="#addRessourcesModal" class="btn btn-success m-b-35" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Ressources</span></a>
                                </div>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Resource</th>
                                                <th>Categroy</th>
                                                <th>Subcategory</th>
                                                <th>Squad</th>
                                                <th>Project</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require 'connection.php';
                                            $sql = "SELECT *
                                                    FROM resources
                                                    NATURAL JOIN squad
                                                    NATURAL JOIN projects
                                                    NATURAL JOIN (
                                                        SELECT *
                                                        FROM subcategory
                                                        NATURAL JOIN category
                                                    ) AS subcat_cat;";
                                            $mysqliresources = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($mysqliresources)) {
                                                $RessourcesID = $row['ResourceID'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['ressourceName']; ?></td>
                                                    <td><?php echo $row['CategoryNom']; ?></td>
                                                    <td><?php echo $row['subcategoryNom']; ?></td>
                                                    <td><?php echo $row['SquadName']; ?></td>
                                                    <td class="process"><?php echo $row['ProjectNom']; ?></td>
                                                    <td>
                                                    <div class="table-data-feature">
                                                    <a href="#editRessourcesModal<?php echo $RessourcesID ?>" class="edit" data-toggle="modal"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                        </button></a>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a href="Ressources.php?idressource=<?php echo $RessourcesID?>" class="delete"><i class="zmdi zmdi-delete"></i></a>
                                                        </button>
                                                    </div>
                                                </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

                    <!-- END DATA TABLE-->
            </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>                                        
    </div>
<!-- Add Ressources Modal  -->
<div id="addRessourcesModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="Ressources.php">
                <div class="modal-header">
                    <h4 class="modal-title">Add Ressources</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Ressource</label>
                        <input type="text" name="ressourceName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name="CategoryID">
                            <option selected>Choose a category</option>
                            <?php
                            $querycategory = "SELECT * FROM category;";
                            $conncategory = mysqli_query($conn, $querycategory);
                            while ($row = mysqli_fetch_assoc($conncategory)) {
                                echo "<option value='{$row['CategoryID']}'>{$row['CategoryNom']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SubCategory</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name="SubcategoryID">
                            <option selected>Choose a SubCategory</option>
                            <?php
                            $querysubcategory = "SELECT * FROM subcategory;";
                            $connsubcategory = mysqli_query($conn, $querysubcategory);
                            while ($rowsubcategory = mysqli_fetch_assoc($connsubcategory)) {
                                echo "<option value='{$rowsubcategory['SubcategoryID']}'>{$rowsubcategory['subcategoryNom']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Projects</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name="ProjectID">
                            <option selected>Choose a Project</option>
                            <?php
                            $queryprojects = "SELECT * FROM projects;";
                            $connprojects = mysqli_query($conn, $queryprojects);
                            while ($rowproject = mysqli_fetch_assoc($connprojects)) {
                                echo "<option value='{$rowproject['ProjectID']}'>{$rowproject['ProjectNom']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="addressource" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<?php
    require 'connection.php';
    $sql = "SELECT *
            FROM resources
            NATURAL JOIN squad
            NATURAL JOIN projects
            NATURAL JOIN (
                SELECT *
                FROM subcategory
                NATURAL JOIN category
            ) AS subcat_cat;";
    $mysqliresources = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($mysqliresources)) {
    $RessourcesID = $row['ResourceID'];
    $categoryid = $row['CategoryID'];
    $subcategoryID = $row['SubcategoryID'];
    $projectID = $row['ProjectID'];
?>
<div id="editRessourcesModal<?php echo $RessourcesID?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method = "POST" >
                <div class="modal-header">						
                    <h4 class="modal-title">Edit Ressources</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Ressource</label>
                        <input type="text" value = "<?php echo $row['ressourceName'];?>" name = "ressourceName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name = "categoryRessource" required>
                            <?php 
                                require 'connection.php';
                                $query = "SELECT * FROM category";
                                $queryconn = mysqli_query($conn,$query);
                                while ($row = mysqli_fetch_assoc($queryconn)) {
                                $categoryID = $row['CategoryID'];
                            ?>
                            <option value="<?php echo $row['CategoryID']?>" <?php if($categoryID == $categoryid) echo "selected"; ?>><?php echo $row['CategoryNom']?></option>
                            <?php } ?>
                        </select>
                    </div
                    <div class="form-group">
                        <label>Subcategory</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name = "subcategoryRessource" required>
                            <?php 
                                require 'connection.php';
                                $querysub = "SELECT * FROM subcategory natural join category;";
                                $sqliquerysub = mysqli_query($conn,$querysub);
                                while($row = mysqli_fetch_assoc($sqliquerysub)){
                                $subcategoryid = $row['SubcategoryID'];  
                            ?>
                            <option value="<?php echo $subcategoryid?>" <?php if($subcategoryid == $subcategoryID) echo "selected"; ?>><?php echo $row['subcategoryNom']?></option>
                            <?php } ?>
                        </select>
                    </div>	
                    <div class="form-group">
                        <label>Project</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label="Large select example" name = "projectRessource" required>
                            <?php 
                                require 'connection.php';
                                $queryproject = "SELECT * FROM projects;";
                                $sqliqueryproject = mysqli_query($conn,$queryproject);
                                while($row = mysqli_fetch_assoc($sqliqueryproject)){
                                $projectid = $row['ProjectID'];  
                            ?>
                            <option value="<?php echo $projectid?>" <?php if($projectid == $projectID) echo "selected"; ?>><?php echo $row['ProjectNom']?></option>
                            <?php } ?>
                        </select>
                    </div>		
                    <div class="modal-footer">
                        <input type="hidden" value = "<?php echo $RessourcesID ?>" name ="ressourceID">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name = "updatressource" class="btn btn-success" value="Edit">
                    </div>
                </div>
                
                
            </form>
        </div>
    </div>
</div>
<?php } ?>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
