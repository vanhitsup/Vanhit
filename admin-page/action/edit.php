<?php
// nạp file kết nối CSDL
include_once "../../admin/connect.php";
$id = intval($_GET['id']);
$sqlSelect = "SELECT * FROM category WHERE id=".$id;
$result = $conn->query($sqlSelect);
$row = $result->fetch_assoc();
?>
<?php
// nạp file kết nối CSDL
include_once "../../admin/connect.php";
$nameproduct="";
$brand="";
$number="";
$image="";
$price="";
$note="";
$configuration="";
$screencard="";
$weight="";
$chipset="";
$harddisk="";



/**
 * Kiểm tra xem có dữ liệu submit đi hay không
 * !empty($_POST) có nghĩa là không rỗng tức là có dữ liệu trong mảng này
 * isset($_POST) dùng để kiểm tra biến có tồn tại hay không
 */
if (isset($_POST) && !empty($_POST)&& isset($_POST["id"])) {
    //Tạo ra 1 biến để check lỗi mặc định là rỗng
    $errors = array();
    //!isset($_POST["name"]) => không tồn tại
    //empty($_POST["name"]) => rỗng
    if (!isset($_POST["nameproduct"]) || empty($_POST["nameproduct"])) {
        $errors[] = "Tên sản phẩm không hợp lệ";
    }
    if (!isset($_POST["brand"]) || empty($_POST["brand"])) {
        $errors[] = "Hãng không hợp lệ";
    }
    if (!isset($_POST["number"]) || empty($_POST["number"])) {
        $errors[] = "Số lượng không hợp lệ";
    }
    if (!isset($_POST["price"]) || empty($_POST["price"])) {
        $errors[] = "Giá tiền không hợp lệ";
    }
    if (!isset($_POST["note"]) || empty($_POST["note"])) {
        $errors[] = "Mô tả không hợp lệ";
    }
    if (!isset($_POST["configuration"]) || empty($_POST["configuration"])) {
        $errors[] = "Cấu hình không hợp lệ";
    }
    if (!isset($_POST["screencard"]) || empty($_POST["screencard"])) {
        $errors[] = "Card màn hình không hợp lệ";
    }if (!isset($_POST["weight"]) || empty($_POST["weight"])) {
        $errors[] = "Trọng lượng không hợp lệ";
    }
    if (!isset($_POST["chipset"]) || empty($_POST["chipset"])) {
        $errors[] = "Chipset không hợp lệ";
    }
    if (!isset($_POST["harddisk"]) || empty($_POST["harddisk"])) {
        $errors[] = "Ổ đĩa cứng không hợp lệ";
    }
    //$errors rỗng tức là không có lỗi
    if (empty($errors)) {
        $nameproduct = $_POST['nameproduct'];
        $brand = $_POST['brand'];
        $number = $_POST['number'];
        $id=$_POST["id"];
        $price = $_POST['price'];
        $note = $_POST['note'];
        $configuration=$_POST['configuration'] ;
        $screencard=$_POST['screencard'];
        $weight=$_POST['weight'];
        $chipset=$_POST['chipset'];
        $harddisk=$_POST['harddisk'];




            //Thư mục upload file
            $target="C:/xampp/htdocs/Project-ITPLus_Final-master/resources/upload/";
            //Vị trí file lưu tạm trong Server
            $target_file=$target.basename($_FILES["image"]["name"]);
            $allowUpload=true;

            //Lấy phần mở rọng của file
            $imageFileType= pathinfo($target_file,PATHINFO_EXTENSION);
            $maxfilesize= 800000;//(bytes)
            ////Những loại file được phép UPload
            $allowTypes= array('jpg','png','jpeg','gif');

            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                $allowUpload = true;
            }else{
                $errors[] = "Ảnh không hợp lệ";
                $allowUpload=false;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($allowUpload) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
                {

                    $image = $_FILES['image']['name'];
                    $sqlUpdate = "UPDATE category  SET name='$nameproduct',brand='$brand',number=$number,image='$image',price='$price',note='$note',configuration='$configuration',screencard='$screencard',weight='$weight',chipset='$chipset',harddisk='$harddisk' WHERE id=$id";
                    $result = $conn->query($sqlUpdate);
                    $result->execute();
                    if ($result == true) {
                        echo "<p class='alert alert-success'>Sửa thành công !</p>";
                        header("Location:../category.php");
                    } else {
                        echo "<p class='alert alert-danger'>Sửa thất bại !</p>";
                    }
                }
                else
                {
                    $errors[] = "Lỗi upload ảnh";
                }
            }
            else
            {
                $errors[] = "Không upload đc ảnh";
            }



    }else{
        // Chuyển mảng $errors thành chuỗi = hàm implode()
        $errors_string = implode("<br>", $errors);
        echo "<div class='alert alert-danger'>$errors_string</div>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VanhITs.com</title>

    <!-- Custom fonts for this template -->
    <link href="../../resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../resources/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../resources/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../adminpage.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin <sup>Vanh</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="../adminpage.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Giao diện
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Components</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>

                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="../category.php">Danh mục sản phẩm</a>
                    <a class="collapse-item" href="../userlist.php">Danh sách User</a>

                </div>
            </div>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <h1 style="margin: 0 0 0 200px;color:deepskyblue"><a href="../adminpage.php" style="text-decoration: none">VietAnhITs.Com</a></h1>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>



                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMIN</span>
                            <img class="img-profile rounded-circle" src="../—Pngtree—vector users icon_3762775.png">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Create New Product</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <form name="create" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                    <div class="form-group">
                                        <label>Product</label>
                                        <input type="text" name="nameproduct" class="form-control" value="<?php echo $row["name"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <input type="text" name="brand" class="form-control" value="<?php echo  $row["brand"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Number</label>
                                        <input type="text" name="number" class="form-control" value="<?php echo $row["number"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" id="image" class="form-control"  value="<?php echo $row["image"] ?>">
                                        <img style="width: 50px; height: 50px" src="http://localhost/Project-ITPLus_Final-master/resources/upload/<?php echo $row["image"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="price" class="form-control" value="<?php echo $row["price"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Basic information</label>
                                        <input type="text" name="note" class="form-control" value="<?php echo $row["price"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>OS</label>
                                        <input type="text" name="configuration" class="form-control" value="<?php echo $row["configuration"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Screen card</label>
                                        <input type="text" name="screencard" class="form-control" value="<?php echo $row["screencard"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Weight</label>
                                        <input type="text" name="weight" class="form-control" value="<?php echo $row["weight"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>CPU</label>
                                        <input type="text" name="chipset" class="form-control" value="<?php echo $row["chipset"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Hard disk</label>
                                        <input type="text" name="harddisk" class="form-control" value="<?php echo $row["harddisk"] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="margin-right: 20px">Confirm Edit</button>
                                    <a href="../category.php" class="btn btn-warning">List Product</a>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; PhamTranVietAnh</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn muốn đăng xuất?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Chọn "Logout" ở phía dưới để kết thúc phiên làm việc của bạn.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="../../login/logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../../resources/vendor/jquery/jquery.min.js"></script>
<script src="../../resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../resources/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../resources/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../resources/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../resources/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../resources/js/demo/datatables-demo.js"></script>

</body>

</html>
