$(function () {
    $(function () {
        $("form[name='login']").validate({
            rules: {

                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                }
            },
            messages: {
                email: "Please enter a valid email address",

                password: {
                    required: "Please enter password",

                }

            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });


    $(function () {

        $("form[name='registration']").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                username: {
                    required: true,
                    maxlength:30,
                    minlength:3
                }
            },

            messages: {
                email: "Please enter your email",
                password: {
                    required: "Please provide a password",
                    minlength: "Your Password must be longer than 5 characters"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your Password must be longer than 5 characters",
                    equalTo: "Please enter the same password as above"
                },
                username: {
                    required: "Please provide a display name",
                    maxlength:"Displayname cannot be longer than 30 characters",
                    minlength:"Displayname must be longer than 3 characters"
                }
            },

            submitHandler: function (form) {
                form.submit();
            }
        });
    });
});