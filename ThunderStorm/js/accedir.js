$(function() {

  $("#FormularioAcceso input,#FormularioAcceso textarea").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors) {
      // additional error messages or events
    },
    submitSuccess: function($form, event) {
      event.preventDefault(); // prevent default submit behaviour
      // get values from FORM
      var username = $("input#username").val();
      var password = $("input#password").val();
      $this = $("#sendMessageButton");
        cache: false,
        success: function() {
          // Success message
          $('#success').html("<div class='alert alert-success'>");
          $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#success > .alert-success')
            .append("<strong>Ha accedido correctamente al sistema. </strong>");
          $('#success > .alert-success')
            .append('</div>');
          //clear all fields
          $('#FormularioAcceso').trigger("reset");
        },
      error: function() {
        // Fail message
        $('#success').html("<div class='alert alert-danger'>");
        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
          .append("</button>");
        //clear all fields
        $('#FormularioAcceso').trigger("reset");
      };
    };
  };
};