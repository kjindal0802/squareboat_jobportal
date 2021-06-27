<?php
require_once('config.php');
$errors = '';

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = md5(trim($_POST['password']));

    $sql = 'select * from user where email = :email and password = :password';
    $stmt = $pdo->prepare($sql);
    $p = ['email' => $email, 'password' => $password];
    $stmt->execute($p);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    if ($stmt->rowCount() == 1) {
        session_start();
        $_SESSION['id'] = $result[0]->sno;
        $_SESSION['email'] = $result[0]->email;
        $_SESSION['name'] = $result[0]->name;
        $_SESSION['user_type'] = $result[0]->user_type;
        
       
        
        if ($_SESSION['user_type'] == 1) {
            header("Location: candidate/");
        } else {
            header("Location: recruiter/");
        }
    } else {
        $errors = 'User is not registered or password is incorrect.';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Squarejob Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body style="background-color:#7773ec">
    <div class="login-form">
        <form action="#" method="post">
            <h2 class="text-center">Log in</h2>
            <p class="text-center" style='color:red'><?php print_r($errors); ?></p>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" value="submit" name='submit' class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
                <a href="#" class="float-right">Forgot Password?</a>
            </div><br>
            <p class="text-center"><a href="signup.php">Create an Account</a></p>
            <p class="text-center"><a href="index.php">Back to Home</a></p>
        </form>

    </div>
</body>

</html>