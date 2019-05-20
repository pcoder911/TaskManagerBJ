<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">На главную</a></li>
        <li class="breadcrumb-item active" aria-current="/login">Авторизация</li>
    </ol>
</nav>

<div class="container">
    <div class="row">

        <div class="col-md-offset-6 col-md-6">
            <div class="panel panel-default panel-primary">
                <div class="panel-heading">Авторизация</div>
                <div class="panel-body">
                    <?= isset($data['message']) ? '<div class="alert alert-danger" role="alert">' . $data['message'] . '</div>' : '' ?>

                    <form action="/login/" method="POST" id="loginForm">
                        <div class="form-group">
                            <label for="login">Логин</label>
                            <input type="text" name="login" class="form-control" id="login" placeholder="Login">
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Логин</button>

                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
