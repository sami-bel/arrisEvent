import { ClientHttp } from '../ClientHttp.js';
import { Action } from './Action.js';
import { Status } from './Status.js';

export class Registration {
  client = new ClientHttp();
  registration = null;

  executeAction()
  {
    let path = this.registration.attr('data-path');
    let data = [];
    let response = this.client.post(data, path);

    response.then(this.updateRegistration)
  }

  updateRegistration(data, status)
  {
    if (status === 'success') {
      let dataObject = JSON.parse(data);

      // // updateStatus
      let status = new Status();
      status.updateStatus(dataObject.id, dataObject.status);
      // // update action
      let action = new Action();
      action.updateActions(dataObject.id, dataObject.status);

    } else {
      console.log('error');
    }

  }

  setRegistrationElement($registration)
  {
    this.registration = $registration;
  }
}
