<!DOCTYPE html>
<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Макет jumbotron с навигационной панели и базовая система разметки.">

    <title>Задачник</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="/assets/css/style.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body>
<?php $uri = str_replace('/', '', $_SERVER['REQUEST_URI']);?>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-my">
  <a class="navbar-brand" href="/index">Задачник</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/index">Список задач</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/add">Добавить новую задачу</a>
      </li>
     </ul>
   <ul class="nav navbar-nav navbar-right">
            <?php if (isset($_SESSION['user'])): ?>
                                            <li><a href="logout/">Выход</a></li>
            <?php else: ?>
                                            <li><a href="login/">Авторизация</a></li>
            <?php endif; ?>
                        </ul>
  </div>
</nav>
