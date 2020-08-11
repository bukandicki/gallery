$(document).ready(function () {
	$('#menu-hide').click(function () {
		$('#side').css('left','0');
	});

	$('#sidebar-hide').click(function () {
		$('#side').css('left','-50vh');
	});
    // $.ajax({
    //   url: 'select.php',
    //   data: "",
    //   dataType: 'json',
    //   success: function(data)
    //   {
    //     var id = data[0];
    //     var nama = data[1];
    //     var email = data[2];
    //     var lahir = data[3];
    //     var kelamin = data[4];
    //     var status = data[5];
    //     var ket = data[6];
		//
		// 	$('#side-name').attr('data-after',""+status+"");
    //   }
    // });
		//
		// $('#klik').click(function () {
		// 		$(this).prop('disabled',true);
		// });

		$('.love').unbind('click').click(function () {
			var love = $(this).attr('id');
			$("#"+love).find('i').css('color','red');
			$("#"+love).find('i').removeClass('far fa-heart').addClass('fas fa-heart');
			$("#"+love).prop('disabled',true);
		});

		$('#sidebar-hide').on({
			mouseenter: function () {
				$('#icon-close').removeClass('fas fa-bars').addClass('fas fa-times');
			},
			mouseleave: function () {
				$('#icon-close').removeClass('fas fa-times').addClass('fas fa-bars');
			}
		});

	$('.love').on({
		mouseenter: function () {
			$(this).find('i').removeClass('far fa-heart').addClass('fas fa-heart');
		},
		mouseleave: function () {
			$(this).find('i').removeClass('fas fa-heart').addClass('far fa-heart');
		}
	});
	$('.body-daftar').hide();
	$('#klik_daftar').click(function () {
		if ($(this).prop('id') == 'klik_daftar') {
			var s = 'Sudah punya akun ?';
			$(this).text(s);
			$(this).prop('id','punya');
			// $('#button_login').html('<span>DAFTAR</span>');
			// $('#button_login').prop('id','button_daftar');
			$('.body-daftar').toggle();

		}else {
			if ($(this).prop('id') == 'punya') {
			var p = 'Belum punya akun ?';
			$(this).text(p);
			$(this).prop('id','klik_daftar');
			// $('#button_daftar').html('<span>LOGIN</span>');
			// $('#button_daftar').prop('id','button_login');
			$('.body-daftar').hide();
			}
	}
	});
	// $('#button_login').prop('disabled', true);
  //    $('#login_username').keyup(function() {
  //       if($(this).val() != '') {
  //          $('#button_login').prop('disabled', false);
  //       }
  //    });
  setInterval(function () {
    $('#gallery').load("select_foto.php");
  },100);
});
