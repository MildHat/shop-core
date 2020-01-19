$(document).ready(() => {

    $('#registerSubmit').on('click', () => {

        let email = $('#registerEmail').val();
        let username = $('#registerUsername').val();
        let password = $('#registerPassword').val();
        let repeatPassword = $('#registerRepeatPassword').val();

        if (password === repeatPassword) {
            let data = {
                email: email,
                username: username,
                password: password
            };

            $.ajax({
                url: '/register',
                type: 'POST',
                data: data,
                success: (response) => {
                    if (response === 'success') {
                        $(document.body).removeClass("modal-open");
                        $('#authModal').removeClass('show');
                        $('#authModal').modal('toggle');
                        $('.auth-status').html('<a href="/cabinet">Cabinet</a>');
                    }
                },
                error: (error) => {
                    console.log(error.statusText);
                }
            });

        } else {
            $('#registerPasswordError').css('display', 'block');
            $('#registerPasswordError').html('Passwords is not equal');
        }

    });


    $('#loginSubmit').on('click', () => {

        let email = $('#loginEmail').val();
        let password = $('#loginPassword').val();

        let data = {
            email: email,
            password: password
        };

        $.ajax({
            url: '/login',
            type: 'POST',
            data: data,
            success: (response) => {
                console.log(response);
                if (response === 'success') {
                    $(document.body).removeClass("modal-open");
                    $('#authModal').removeClass('show');
                    $('#authModal').modal('toggle');
                    $('.auth-status').html('<a href="/cabinet">Cabinet</a>');
                }
            },
            error: (error) => {
                console.log(error.statusText);
            }
        });

    });


    $('#registerRepeatPassword').on('change', () => {

        $("#registerPasswordError").css('display', 'none');
        $('#registerPasswordError').html('');

    });

});