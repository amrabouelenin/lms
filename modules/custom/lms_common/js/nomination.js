(function ($, Drupal) {

  $('.modal-content').on( "click", '.yes_register',function(event) {
    event.preventDefault();
    var href = $(this).attr('link_url');
    var response = $.ajax({
                     type: "GET",
                     url: drupalSettings.path.baseUrl + href,
                     data: {"ajaxCall":true},
                     async: false
                   }).responseText;
    response = JSON.parse(response);
    if ( response.status == 'ok' ) {
       location.reload();
    }
    else {
       alert('Sorry you are not allowed to register.');
       $('#exampleModalCenter').modal('hide');
    }
    return false;
  });

  // to understand it later
  Drupal.AjaxCommands.prototype.nomination = function (ajax, response, status) {
    alert('entered ajax command');
  }
  //
  //$('[id*="attendace-form-overall-status"]').prop('disabled', true);
})(jQuery, Drupal);
