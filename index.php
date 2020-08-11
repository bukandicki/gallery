<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" type="text/css" href="css/master.css">
  	<link rel="stylesheet" type="text/css" href="fontawesome/css/fontawesome-all.css">
    <title>Login Page</title>
  </head>
  <body>
    <section class="sectama login">

      <div class="body-daftar">
        <div class="head-daftar">
          Register Here
        </div>
        <div class="inner-body-daftar">
          <form class="inner-body-daftar" id="form_daftar" action="daftar.php" method="post" enctype="multipart/form-data">

            <div class="input-daf" id="input-daf">
              <i class="fas fa-address-card" id="icon_daf"></i>
              <input class="input-daftar" type="text" id="nama_daf" name="nm" value="" placeholder="Masukan nama" autocomplete="off">
            </div>

            <div class="input-daf" id="input-daf">
              <i class="fas fa-phone" id="icon_daf"></i>
              <input class="input-daftar" type="tel" id="tel_daf" name="tel" value="" placeholder="Masukan telepon" autocomplete="off">
            </div>

            <div class="input-daf" id="input-daf">
              <i class="fas fa-male" id="icon_daf"></i>
              <select name="jenkel" class="jenkel" id="jenkel_daf">
                <option value="0">- Jenis Kelamin -</option>
                <option value="1">Laki - Laki</option>
                <option value="2">Perempuan</option>
              </select>
            </div>

            <div class="input-daf" id="input-daf">
              <i class="fas fa-calendar-alt" id="icon_daf"></i>
              <input class="input-daftar" type="date" id="date_daf" name="dat" value="" autocomplete="off">
            </div>

            <div class="input-daf" id="input-daf">
              <i class="fas fa-user-secret" id="icon_daf"></i>
              <input class="input-daftar" type="text" id="username_daf" name="usr" value="" placeholder="Masukan username" autocomplete="off">
            </div>

            <div class="input-daf" id="input-daf">
              <i class="fas fa-lock" id="icon_daf"></i>
              <input class="input-daftar" type="password" id="password_daf" name="psw" value="" placeholder="Masukan password" autocomplete="off">
            </div>

            <div class="input-daf" id="input-daf">
              <i class="fas fa-shield-alt" id="icon_daf"></i>
              <input class="input-daftar" type="text" id="kode_daf" name="kdk" value="" maxlength="5" placeholder="Masukan kode keamanan" autocomplete="off">
            </div>
            <div id="daftar_keter" style="width: 100%;padding:.5em;margin-bottom: .5em;letter-spacing: .3em;color: #dc3545;transition: all ease-in-out 250ms;"></div>
            <button id="button_daftar" class="button-daftar"><span></span>DAFTAR</button>
          </form>
        </div>
      </div>

      <div class="body-login">
        <div class="head-login">
          Login Here
        </div>

        <div class="inner-body-login">
          <!-- LOGIN -->
          <form class="inner-body-login" id="form_login" action="login.php" method="POST">
            <div class="input-log" id="input-log">
              <i class="fas fa-user-secret" id="icon_log"></i>
              <input class="input-login" type="text" id="login_username" name="usr" value="" placeholder="Masukan username" autofocus autocomplete="off">
            </div>
            <div class="input-log" id="input-log">
              <i class="fas fa-lock" id="icon_log"></i>
              <input class="input-login" type="password" id="login_password" name="psw" value="" placeholder="Masukan password">
            </div>
            <div id="keterangan_login" style="width: 100%;padding:.5em;margin-bottom: .5em;letter-spacing: .3em;color: #dc3545;transition: all ease-in-out 250ms;"></div>
            <button id="button_login" class="button-login"><span></span>LOGIN</button>
             <div style="width: 100%;display: flex;justify-content: space-between;;">
              <a href="#" id="klik_lupa">Lupa password?</a>
              <a href="#" id="klik_daftar">Belum punya akun?</a>
            </div>
          </form>
        </div>
      </div>
    </section>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/master.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.button-daftar').attr('disabled',true);
          $('#form_daftar').keyup(function(){
            if($('#nama_daf').val().length < 1 || $('#tel_daf').val().length < 1 || $('#date_daf').val().length < 1 || $('#username_daf').val().length < 1 || $('#password_daf').val().length < 1 || $('#kode_daf').val().length < 1){
                $('.button-daftar').attr('disabled', true);
              }
            else{

                $('.button-daftar').attr('disabled',false);
              }
      });

  $("#button_daftar").click(function () {

      $.post($("#form_daftar").attr("action"),
             $("#form_daftar :input").serializeArray(),
             function (data) {
              $("#daftar_keter").html(data);
             });

    $("#form_daftar").submit(function(){
      return false;
    });


  });

});
    </script>
  </body>
</html>
