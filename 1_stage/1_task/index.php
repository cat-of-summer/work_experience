<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <h1 class="navbar-text">1 task</h1>
        </div>
    </nav>

    <div class="container bg-light">
        <form method="POST" class="form" enctype="multipart/form-data" action="action.php" id="some_form">
            <div class="row">
                <div class="col-2">
                    <label for="username" class="form-label">Username</label>
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Введите имя пользователя">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="email" class="form-label">E-mail</label>
                </div>
                <div class="col-10">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Введите E-mail">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="message" class="form-label">Message</label>
                </div>
                <div class="col-10">
                    <textarea class="form-control" name="message" id="message" placeholder="Введите сообщение"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="file" class="form-label">File</label>
                </div>
                <div class="col-10">
                    <input class="form-control" name="file" id="file" type="file">
                </div>
            </div>
            <div class="row">
                <button class="btn btn-success" type="submit">Отправить форму</button>
            </div>
        </form>
    </div>

    <div id="success_message" class="alert alert-success container" role="alert" hidden>
        Успешное заполнение формы!
    </div>

    <script src="js/validation.js"></script>
    <script src="js/success_message.js"></script>
</body>
</html>