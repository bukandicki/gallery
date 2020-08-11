$(document).ready(function() {
  loadData();
  $('#formfoto').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      type: $(this).attr('method'),
      url: $(this).attr('action'),
      data: $(this).serialize(),
      success:function () {
        loadData();
        resetForm();
      }
    });
  });
});

function loadData() {
  $.get('select.php', function (data) {
    $('#likecount').html(data);
    $('.love').click(function (e) {
      e.preventDefault();
        $.ajax({
          type: 'GET',
          url: $(this).attr('href'),
          success:function () {
            loadData();
          }
        });
    });
  });
}
