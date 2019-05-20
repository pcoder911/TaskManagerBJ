$(function () {
   
    // шаблон для вывода сообщения
    var message = '<div class="alert alert-danger" role="alert">__text__</div>';

    // обработка формы регистрации
    $('#registerForm').on('submit', function (e) {
        var $form = $(this);
        var $panelBody = $('.panel-body');
        var login = $form.find('#login').val();
        var password = $form.find('#password').val();
        var passwordConfirm = $form.find('#password_confirm').val();

        $panelBody.find('.alert').remove();

        // Если пустые поля, игнорируем
        if (login == '' && password == '' && passwordConfirm == '') {
            $panelBody.prepend(message.replace('__text__', 'Fields can\'t be empty'));
            e.preventDefault();
            return false;
        }

        // проверка паролей
        if ((password == '' && passwordConfirm == '') || password != passwordConfirm) {
            $panelBody.prepend(message.replace('__text__', 'Passwords are not identical'));
            e.preventDefault();
            return false;
        }

        // проверка имени
        if (login == '') {
            $panelBody.prepend(message.replace('__text__', 'Enter your login'));
            e.preventDefault();
            return false;
        }
        // проверка имени
        if (password == '') {
            $panelBody.prepend(message.replace('__text__', 'Enter your password'));
            e.preventDefault();
            return false;
        }
    });

    // обработка формы логин
    $('#loginForm').on('submit', function (e) {
        var $form = $(this);
        var $panelBody = $('.panel-body');
        var login = $form.find('#login').val();
        var password = $form.find('#password').val();

        $panelBody.find('.alert').remove();

        // Если пустые поля, игнорируем
        if (login == '' && password == '') {
            $panelBody.prepend(message.replace('__text__', 'Fields can\'t be empty'));
            e.preventDefault();
            return false;
        }

        // проверка имени
        if (login == '') {
            $panelBody.prepend(message.replace('__text__', 'Enter your login'));
            e.preventDefault();
            return false;
        }
        // проверка имени
        if (password == '') {
            $panelBody.prepend(message.replace('__text__', 'Enter your password'));
            e.preventDefault();
            return false;
        }
    });

    // мини превью для картинки
    $("#image").on('change',function(){
        if (this.files && this.files[0]) {
            var file = new FileReader();
            file.onload = function (e) {
                $('#imageThumb').css('display', 'block').attr('src', e.target.result);
                $('#imagePreview').attr('src', e.target.result);
            };
            file.readAsDataURL(this.files[0]);
        }
    });
    
    // модальное отображение превью задачи
    $('#taskModal').on('show.bs.modal', function () {
        var name = $('#name').val();
        var email = $('#email').val();
        var task = $('#task').val();

        if (name != '') {
            $('#namePreview').html('<strong>' + name + '</strong>');
        }

        $('#emailPreview').text(email);
        $('#taskPreview').text(task);
    });

$('textarea.task__text').on('blur', function () {
var id = $(this).data('task-id');
var task = $(this).val();

        $.ajax({
            method: "post",
            url: "/update/task",
            type: 'json',
            data: { id: id, task: task },
            success: function () {
                }
            
        });
});
    // смена статуса пользователя
    $('.thumbnail input[type=checkbox]').on('change', function () {
        var status = $(this).prop('checked') ? 1 : 0;
        var id = $(this).data('task-id');
        var $label = $(this).closest('.thumbnail').find('.label-success');

 
        $.ajax({
            method: "post",
            url: "/update/status",
            type: 'json',
            data: { id: id, status: status },
            success: function () {
                if (status == 1) {
                    $label.text('Success');
                } else {
                    $label.text('');
                }
            }
        });
    });
});