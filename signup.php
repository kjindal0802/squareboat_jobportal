<?php
require_once('config.php');
$errors = '';
$success = '';

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password1 = md5(trim($_POST['password1']));
    $password2 = md5(trim($_POST['password2']));
    $experience = trim($_POST['experience']);
    $mobile = trim($_POST['mobile']);
    $user_type = trim($_POST['user_type']);

    if ($password1 !== $password2) {
        $errors = 'Password and confirm password does not match.';
    } else {
        $sql = 'select * from user where email = :email';
        $stmt = $pdo->prepare($sql);
        $p = ['email' => $email];
        $stmt->execute($p);

        if ($stmt->rowCount() == 0) {
            $sql = "insert into user (name, email, `password`, mobile,experience,user_type) values(:name,:email,:pass,:mobile,:experience,:user_type)";

            try {
                $handle = $pdo->prepare($sql);
                $params = [
                    ':name' => $name,
                    ':email' => $email,
                    ':pass' => $password1,
                    ':mobile' => $mobile,
                    ':experience' => $experience,
                    ':user_type' => $user_type
                ];

                $handle->execute($params);

                $success = 'User has been created successfully !!';
            } catch (PDOException $e) {
                $errors[] = $e->getMessage();
            }
        } else {
            $errors = 'Email address already registered.';
        }
    }

    // echo $email;


}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SquareJob Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
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

<body ng-app="" style="background-color:#7773ec">
    <div class="login-form">
        <form action="#" method="post">
            <h2 class="text-center">Sign Up</h2>
            <p class="text-center" style='color:red'><?php print_r($errors); ?></p>
            <p class="text-center" style='color:green'><?php print_r($success); ?></p>


            <div style="text-align:center">
                <input required type="radio" id="candidate" name="user_type" value="1">
                  <label for="html">Candidate</label>
                  <input required type="radio" id="recuriter" name="user_type" value="2">
                  <label for="css">Recruiter</label><br>
            </div>
            <div class="form-group">
                <input type="name" class="form-control" name='name' placeholder="Name" required="required">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name='email' placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name='password1' placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name='password2' placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" name='mobile' placeholder="Mobile" required="required">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name='experience' placeholder="Experience in years" required="required">
            </div>

            <div class="form-group">
                <button type="submit" name='submit' value="submit" class="btn btn-primary btn-block">Sign Up</button>
            </div>
            <p class="text-center"><a href="login.php">Back To Login</a></p>
        </form>

    </div>
</body>

</html>