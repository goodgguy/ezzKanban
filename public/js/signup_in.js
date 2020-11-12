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
        username:{
          required:true,
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
        username:{
          required:"Please provide a display name",
        }
      },

      submitHandler: function (form) {
        form.submit();
      }
    });
  });
});