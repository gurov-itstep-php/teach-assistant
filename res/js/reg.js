$(document).ready(() => {

    // Cоздаем метрики валидации:
    let correct1 = false; // lоgin check
    let correct2 = true;  // pass1 check
    let correct3 = true;  // pass2 check
    let correct4 = true;  // email check

    // Сценарий валидации:
    // login от 6 до 16 символов(1-ый символ всегда буква, буквы, цифры, _, -, ., 1-ый символ всегда буква)
    let regExp1 = /^[a-zA-Z][a-zA-Z0-9_\-\.]{5,15}$/;
    // password от 8 символов - хотябы одна большая, хотябы одна маленькая буква и хотябы одна цифра, хотябы один символ: "_", "-", ".".
    let regExp2 = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[_\-\.])[A-Za-z0-9_\-\.]{8,}$/; 
    // email 
    let regExp3 = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/;

    // Проверка логина:
    $('#login').blur(() => {
        let loginValue = $('#login').val();
        console.log(`userlogin: ${loginValue}`);
        if (regExp1.test(loginValue)) {
            // Проверка занятости логина:
            //----------------------------
            $.ajax({
                type: "POST",
                url: "/php/teach-assistant/auth/ajax_check_login",
                data: "login=" + loginValue,
                success: function (result) {
                    //*
                    console.log(result);
                    if (result === "занят") {
                        $('#login-error').html('Такой логин уже используется!');
                        console.log('login-failed');
                        correct1 = false;
                    } else {
                        $('#login-error').html('');
                        console.log('login-valid');
                        correct1 = true;
                    }
                }
            });
        } else {
            console.log('login-failed');
            correct1 = false;
            $('#login-error').html('Логин должен быть:<br> - от 6 до 16 символов<br> - 1-ый символ всегда буква<br> - буквы в любом регистре, цифры<br> - допустимые символы: "_" , "-" , "."');
        }
    });

    // Проверка пароля:
    $('#pass1').blur(() => {
        let pass1Value = $('#pass1').val();
        //console.log(`userPass1: ${pass1Value}`);
        if (regExp2.test(pass1Value)) {
            console.log('pass1-valid');
            correct2 = true;
            $('pass1-error').html('');
        } else {
            console.log('pass1-failed');
            correct1 = false;
            $('#pass1-error').html('Пароль должен быть:<br>- от 8 символов<br>- хотябы одна большая буква<br>- хотябы одна маленькая буква<br>- хотябы одна цифра<br> - хотябы один символ: "_" , "-" , "."');
        }
    });

    // Проверка пароля-2:
    $('#pass2').blur(() => {
        let pass1Value = $('#pass1').val();
        let pass2Value = $('#pass2').val();
        //console.log(`userPass2: ${pass2Value}`);
        if (pass1Value === pass2Value) {
            console.log('pass2-valid');
            correct3 = true;
            $('#pass2-error').html('');
        } else {
            console.log('pass2-failed');
            correct3 = false;
            $('#pass2-error').html('Введенные пароли не совпадают!');
        }
    });

        // Проверка E-mail:
    //---------------------------?
    $('#email').blur(() => {
        let emailValue = $('#email').val();
        console.log(`userEmail: ${emailValue}`);
        if (regExp3.test(emailValue)) {
            // Проверка занятости логина:
            //----------------------------
            $.ajax({
                type: "POST",
                url: "/php/teach-assistant/auth/ajax_check_email",
                data: "email=" + emailValue,
                success: function (result) {
                    //*
                    console.log(result);
                    if (result === "занят") {
                        $('#email-error').html('Такой E-mail уже используется!');
                        console.log('email-failed');
                        correct4 = false;
                    } else {
                        $('#email-error').html('');
                        console.log('email-valid');
                        correct4 = true;
                    }
                }
            });
        } else {
            console.log('email-failed');
            correct4 = false;
            $('#email-error').html('Введенный Е-mail не прошел проверку корректности!<br>(пример: «nick@mail.com»)');
        }
    });

    // финальная проверка результатов валидации:
    $('#submit').click(() => {
        if (correct1 === true && correct2 === true &&
            correct3 === true && correct4 === true) {
            $('#regform').attr('onsubmit', 'return true');
        } else {
            let blockMessage = 'Форма содержит некорректные данные!\n';
            blockMessage += 'Отправка данных заблокированна!';
            alert(blockMessage);
        }
    });
});