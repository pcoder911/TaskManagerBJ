<div class="container">
    <div class="row">
        <div class="nav pull-right">
            <span>Сортировать по:</span>
            <a <?php if (isset($_SESSION['sort'])) {
    if ($_SESSION['sort'] == 'name') echo 'class ="active"';
} ?>href="?sort=name">имени</a> |
            <a <?php if (isset($_SESSION['sort'])) {
    if ($_SESSION['sort'] == 'email') echo 'class ="active"';
} ?>href="?sort=email">email</a> |
            <a <?php if (isset($_SESSION['sort'])) {
    if ($_SESSION['sort'] == 'status') echo 'class ="active"';
} ?>href="?sort=status">статусу</a> |
        </div>
        <hr>
    </div>
    <div class="row">
<?php foreach ($data['task_list'] as $item): ?>
            <div class="col-md-4">
                <div class="thumbnail task">
                    <img src="/uploads/images/<?= $item['image'] ?>" alt="">
                    <div class="caption">
    <?php if (isset($_SESSION['user'])): ?>
                            <p class="checkbox">
                                <label>
                                    <input type="checkbox" data-task-id="<?= $item['id'] ?>" <?= $item['status'] == 1 ? 'checked' : ''; ?>> Задача выполнена
                                </label>
                            </p>
                            <hr>
    <?php endif; ?>
                        <h4><span class="label label-success pull-right"><?= $item['status'] > 0 ? 'success' : '' ?></span></h4>
                        <div class="task__user-info">
                            <strong><?= $item['name'] ?></strong><br>
                            <a href="mailto:#"><?= $item['email'] ?></a>
                        </div>
                        <br>
                        <?php if (!isset($_SESSION['user'])): ?>
                            <p class="task__text"><?= $item['task'] ?></p>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user'])): ?>
                            <textarea class="task__text" data-task-id="<?= $item['id'] ?>" ><?= $item['task'] ?></textarea>
    <?php endif; ?>
                    </div>
                </div>
            </div>
<?php endforeach; ?>
<?php echo $data['pagination']->get(); ?>
    </div>
</div>


