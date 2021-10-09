<?php
require_once 'db.php';
$data = $_POST;
$showError = false;

if (isset($data['signup'])) {
    $errors = [];
    $showError = true;

    if (trim($data['firstname']) == '') {
        $errors[] = 'Укажите ваше имя!';
    }
    if (trim($data['lastname']) == '') {
        $errors[] = 'Укажите вашу фамилию!';
    }
    if (trim($data['email']) == '') {
        $errors[] = 'Укажите ваш Email!';
    }
    if (trim($data['password']) == '') {
        $errors[] = 'Укажите ваш пароль!';
    }
    if (trim($data['password']) != trim($data['password2'])) {
        $errors[] = 'Пароли не совпадают!';
    }

    if (R::count('users', 'email = ?', array($data['email'])) > 0) {
        $errors[] = 'Пользователь с таким Email уже зарегистрирован!';
    }

    if (empty($errors)) {
        $user = R::dispense('users');
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($user);

        header('Location: signin.php');
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/style.css">

    <title>Регистрация</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">

                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">sign up</a></li>
                        <li role="presentation"><a href="/" aria-controls="profile">Home</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <div role="tabpanel" class="tab-pane fade in active" id="Section2">
                            <form class="form-horizontal" action="signup.php" method="POST">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="firstname" value="<?php echo (!empty($data['firstname']) ? $data['firstname'] : ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="lastname" value="<?php echo (!empty($data['lastname']) ? $data['lastname'] : ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo (!empty($data['email']) ? $data['email'] : ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="password2">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default" name="signup">Sign up</button>
                                </div>
                                <div class="form-group forgot-pass">
                                    <button class="btn btn-default"><?php if ($showError) {echo showError($errors);} ?></button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div><!-- /.col-md-offset-3 col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>