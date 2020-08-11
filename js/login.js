$("#button_login").click(function () {

      $.post($("#form_login").attr("action"),
             $("#form_login :input").serializeArray(),
             function (data) {
              $("#keterangan_login").html(data);
             });

    $("#form_login").submit(function(){
      return false;
    });


  });
