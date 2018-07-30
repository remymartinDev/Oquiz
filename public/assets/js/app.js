var app = {

  init: function() {
    console.log('init');

    $('#formLogin').on('submit', app.submitFormLogin);

  },

  submitFormLogin: function(evt) {

    //evt.preventDefault();

    var formData = $(this).serialize();

    console.log(formData);

    $.ajax({
      url: BASE_PATH+'signin',
      dataType: 'json',
      method: 'POST',
      data: formData
    }).done(function(response) {
      console.log(response);

      if (response.code == 1) {

        location.href = response.url;
      }

      else {

        $('#errorsDiv').html('');

        response.errorList.forEach(function(value, index) {
          $('#errorsDiv').append(value+'<br>');
        });

        $('#errorsDiv').show();
      }
    }).fail(function() {
      alert('Error in ajax');
    });
  },
};

$(app.init);
