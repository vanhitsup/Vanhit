<?php
session_start();

/*
 * Nạp file kết nối CSDL
 */
include_once "../admin/connect.php";

// Biến lưu trữ lỗi trong quá trình đăng nhập
$errors = array();

/**
 * Xử lý đăng nhập
 */
if (isset($_POST) && !empty($_POST)) {

    if (!isset($_POST["username"]) || empty($_POST["username"])) {
        $errors[] = "Chưa nhập username";
    }
    if (!isset($_POST["password"]) || empty($_POST["password"])) {
        $errors[] = "Chưa nhập password";
    }

    /**
     * Nếu mảng $errors bị rỗng tức là không có lỗi đăng nhập
     */
    if (is_array($errors) && empty($errors)) {
        $username = $_POST["username"];
        $password =$_POST["password"];

        $sqlLogin = "SELECT * FROM accountad WHERE username = ? AND password = ?";

        // Chuẩn bị cho phần SQL
        $stmt = $conn->prepare($sqlLogin);

        // Bind 2 biến vào trong câu SQL
        $stmt->bind_param("ss", $username, $password);


        // thực thi câu lệnh sql
        $stmt->execute();

        // lấy ra bản ghi
        $res = $stmt->get_result();


        $row = $res->fetch_array(MYSQLI_ASSOC);


        if (isset($row['id']) && ($row['id'] > 0)) {

            /**
             * Nếu tồn tại bản ghi
             * thì sẽ tạo ra session đăng nhập
             */
            $_SESSION["loggedin"] = true;
            $_SESSION["fullname"] = $row['fullname'];

            header("Location:../admin-page/adminpage.php");
            exit;
        }

        else {
            $errors[] = "Dữ liệu đăng nhập không đúng";
        }

    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Title</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Montserrat:600|Noto+Sans|Open+Sans:400,700&display=swap');
        *{
            margin: 0;
            padding: 0;
            border-radius: 5px;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
            display: flex;
            align-items: center;
            text-align: center;
            font-family: sans-serif;
            justify-content: center;
            background: url(https://devforum.info/DEMO/LoginForm1/bg.jpg);
            background-size: cover;
            background-position: center;
        }
        .container{
            position: relative;
            width: 400px;
            background: white;
            padding: 60px 40px;
        }
        header{
            font-size: 40px;
            margin-bottom: 60px;
            font-family: 'Montserrat', sans-serif;
        }
        .input-field, form .button{
            margin: 25px 0;
            position: relative;
            height: 50px;
            width: 100%;
        }
        .input-field input{
            height: 100%;
            width: 100%;
            border: 1px solid silver;
            padding-left: 15px;
            outline: none;
            font-size: 19px;
            transition: .4s;
        }
        input:focus{
            border: 1px solid #1DA1F2;
        }
        .input-field label, span.show{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
        .input-field label{
            left: 15px;
            pointer-events: none;
            color: grey;
            font-size: 18px;
            transition: .4s;
        }
        span.show{
            right: 20px;
            color: #111;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            user-select: none;
            visibility: hidden;
            font-family: 'Open Sans', sans-serif;
        }
        input:valid ~ span.show{
            visibility: visible;
        }
        input:focus ~ label,
        input:valid ~ label{
            transform: translateY(-33px);
            background: white;
            font-size: 16px;
            color: #1DA1F2;
        }
        form .button{
            margin-top: 30px;
            overflow: hidden;
            z-index: 111;
        }
        .button .inner{
            position: absolute;
            height: 100%;
            width: 300%;
            left: -100%;
            z-index: -1;
            transition: all .4s;
            background: -webkit-linear-gradient(right,#00dbde,#fc00ff,#00dbde,#fc00ff);
        }
        .button:hover .inner{
            left: 0;
        }
        .button button{
            width: 100%;
            height: 100%;
            border: none;
            background: none;
            outline: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
        }
        .container .auth{
            margin: 35px 0 20px 0;
            font-size: 19px;
            color: grey;
        }


        .facebook i, .facebook span{
            color: #4267B2;
        }
        .google i, .google span{
            color: #dd4b39;
        }
        .links i{
            font-size: 23px;
            line-height: 40px;
            margin-left: -90px;
        }
        .links span{
            position: absolute;
            font-size: 17px;
            font-weight: bold;
            padding-left: 8px;
            font-family: 'Open Sans', sans-serif;
        }
        .singup{
            margin-top: 50px;
            font-family: 'Noto Sans', sans-serif;
        }
        .signup a{
            color: #3498db;
            text-decoration: none;
        }
        .signup a:hover{
            text-decoration: underline;
        }
    </style>

</head>
<body>
<div class="container">
    <header>Login Admin</header>
    <form name="loginadmin" action="" method="post">
        <?php
        if (is_array($errors) && !empty($errors)) {
            $errors_string = implode("<br>", $errors);
            echo "<div class='alert alert-danger'>";
            echo $errors_string;
            echo "</div>";
        }

        ?>
        <div class="input-field">
            <input type="text" placeholder="Enter Username" name="username">

        </div>
        <div class="input-field">
            <input class="pswrd" type="password" placeholder="Password" name="password">
        </div>
        <div class="button">
            <div class="inner">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>

    <br>
    <div class="singup">
        Comeback <a href="../user-page/indexviews.php">Home-page</a>
    </div>
</div>
</body>
</html>