<?php
require_once 'db.php';
$data = $_POST;
$showError = false;

if (isset($data['signin'])) {
    $errors = [];
    $showError = true;

    if (trim($data['email']) == '') {
        $errors[] = 'Укажите ваш Email!';
    }
    if (trim($data['password']) == '') {
        $errors[] = 'Укажите ваш пароль!';
    }
    $user = R::findOne('users', 'email = ?', array($data['email']));
    if ($user) {
        if (password_verify($data['password'], $user->password)) {
            $_SESSION['user'] = $user;
            header('Location: /');
        } else {
            $errors[] = 'Неверный пароль!';
        }
    } else {
        $errors[] = 'Пользователь не найден!';
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

    <title>Авторизация</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">

                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">sign in</a></li>
                        <li role="presentation"><a href="/" aria-controls="profile">Home</a></li>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                            <form class="form-horizontal" action="signin.php" method="POST">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo (!empty($data['email']) ? $data['email'] : ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                    <div class="form-group">
                                        <button type="submit" name="signin" class="btn btn-default">Sign in</button>
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