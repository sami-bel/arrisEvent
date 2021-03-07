
// display registration of event
$(document).ready(function () {

  $('.event-list-line').on('click', function () {
    document.location = $(this).attr('data-path');
  })
});
