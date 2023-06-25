<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <main class="main">
        <div class="main-container">
            <h2 class="login">Регистрация</h2>
            <form action="auth.php?reg=1" method="post" class="form" enctype="multipart/form-data">
                <input class="login-input" type="text" name="lName" id="lName" placeholder="Фамилия" require>
                <input class="login-input" type="text" name="fName" id="fName" placeholder="Имя" require>
                <input class="login-input" type="text" name="otch" id="otch" placeholder="Отчество" require>
                <input class="login-input" type="text" name="login" id="login" placeholder="Логин" require>
                <input class="login-input" type="password" name="password" id="password" placeholder="Пароль" require>
                <input class="login-input" type="file" name="file" id="file" accept=".png">
                <button class="login-input">Зарегистрироваться</button>
            </form>
        </div>
    </main>

</body>
</html>