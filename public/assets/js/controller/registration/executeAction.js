
import { Registration } from '../../modules/Registration/Registration.js';

let registration = new Registration();

// display registration of event
$(document).ready(function () {

  $(document).on("click", '.registration-action-js',function() {
    registration.setRegistrationElement($(this));
    registration.executeAction();
  })

});


