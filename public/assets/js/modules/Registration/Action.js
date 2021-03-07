export class Action {

  actionsMap = {
    'waiting': ['select', 'refuse'],
    'selected': ['accept', 'deselect', 'refuse'],
    'accepted': ['relaunch'],
    'confirmed_by_user': ['informer'],
    'refused': ['select']
  }

  actionsMenuMap = {
    'select' : 'Selectionner',
    'accept' : 'Accepter',
    'deselect' : 'Déselectionner',
    'refuse' : 'Réfuser',
    'relaunch' : 'Relancer',
  }

  updateActions(registrationId, status) {

    const actions = this.actionsMap[status];
    let $actionsElement = $("#" + registrationId).find('.registration-actions-js');

    $actionsElement.empty();

    for (let i = 0; i < actions.length; i++) {
      let path = '/registrations/' + registrationId + '/' + actions[i];
      let action = '<a class="dropdown-item registration-action-js" href="#" data-path="'+ path +'">' + this.actionsMenuMap[actions[i]] + '</a>'

      $actionsElement.append(action).html();
    }
  }
}

