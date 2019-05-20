		<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">На главную</a></li>
    <li class="breadcrumb-item active" aria-current="page">Добавить новую задачу</li>
  </ol>
</nav>
<div class="container">
    <div class="row">
 

        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default panel-primary">
                <div class="panel-heading">Новая задача</div>
                <div class="panel-body">
                    <form action="/add/" method="post" enctype="multipart/form-data" id="addTaskForm">
                        <div class="form-group">
                            <label for="name">Наименование</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email адрес</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="task">Задача</label>
                            <textarea class="form-control" rows="3" id="task" name="task" placeholder="Task" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Иллюстрация к задаче</label>
                            <img id="imageThumb" src="#" />
                            <input type="file" id="image" name="image" accept="image/jpg,image/jpeg,image/png,image/gif" required>
                            <p class="help-block">jpg, gif, png</p>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>