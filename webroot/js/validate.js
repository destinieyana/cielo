$(document).ready(function(){

    let generic = "Sorry, something went wrong. Please try again"

    $("#userForm").validate({
        submitHandler: function(form){
            var datastring = $(form).serialize();

            $.ajax({
                type: "POST",
                url: "user/signup",
                data: datastring,
                dataType: "json",
                complete: function(jqXHR, status) {

                    try {
                        let data = JSON.parse(jqXHR.responseText);

                        if (data.success) {
                            return alertify.notify(data.success, 'success', 5);
                        }

                        return alertify.notify(data.error || generic, 'error', 5);

                    } catch (e) {
                        return alertify.notify(generic, 'error', 5);
                    }
                }
            });
        },
        rules: {
            'name': {
                required: true,
            },
            'date_of_birth': {
                required: true,
            },
            'email': {
                required: true,
            },
            'fav_color': {
                required: true,
            },
        },
        messages: {
            email: {
                required: "We need your email address to contact you",
                email: "Your email address must be in the format of name@domain.com"
            },
            date_of_birth: {
                require: "Please enter your Date of Birth",
                date_of_birth: "Your Date of Birth must be in the format of mm/dd/yyyy"
            }
        }
    });
});


