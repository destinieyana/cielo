$(document).ready(function(){

    $("#userForm").validate({
        submitHandler: function(form){
            var datastring = $(form).serialize();

            $.ajax({
                type: "POST",
                url: "signup",
                data: datastring,
                dataType: "json",
                success: function(data, status, jqXhr){
                    //var obj = jQuery.parseJSON(data); if the dataType is not specified as json uncomment this
                    // do what ever you want with the server response
                    //API.respond(jqXhr.responseText);
                    if (data.error) {
                        alertify.notify(data.error, 'error', 5);
                        return;
                    }

                    alertify.notify(data.success, 'success', 5);
                },
                error: function() {
                    alertify.notify("Sorry, something went wrong. Please try again", 'error', 5);
                }
            });
        },
        rules: {
            'name': {
                required: false,
            },
            'date_of_birth': {
                required: false,
            },
            'email': {
                required: false,
            },
            'fav_color': {
                required: false,
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


