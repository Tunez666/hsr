<?php // типо изменения
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);  
session_start();
require_once "connect.php";
$tableName = 'users_d';
$_COOKIE;
    if (!empty($username) && !empty($pass)) {
        $query = "SELECT * FROM `$tableName` WHERE username = ?";
        $stmt = mysqli_prepare($Link, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($result)) {
            $dbPass = trim($row['pass']);
            $inputPass = trim($pass);
            
            if ($inputPass === $dbPass) {
                $_SESSION['user'] = $username;
                header("Location: lk.php");
                exit();
            } else {
                $error = "Неверный пароль";
            }
        } else {
            $error = "Пользователь '$username' не найден";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        $error = "Пожалуйста, введите имя пользователя и пароль";
    }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="content2">
        <h2>Войти</h2>
        
        <?php if(isset($error)): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form class="login-form" action="" method="POST">
            <div class="form-group">
                <label for="username">Имя пользователя:</label>
                <input type="text" id="username" name="username" required = "user">
            </div>
            
            <div class="form-group">
                <label for="pass">Пароль:</label>
                <input type="password" id="pass" name="pass" required = "123">
            </div>
            <input type="submit" value="Войти">
        </form>

         
        <center><p> <a href = "reg.php">Нет аккаунта? Зарегайся!</a> </p></center>
    
    </div>
</body>
</html>
