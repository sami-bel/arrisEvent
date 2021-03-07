export class Status {

  statusCssClassMap = {
    'waiting': 'badge badge-warning registration-status-js',
    'selected': 'badge badge-secondary registration-status-js',
    'accepted': 'badge badge-primary registration-status-js',
    'refused': 'badge badge-danger registration-status-js',
    'confirmed_by_user': 'badge badge-primary registration-info-js'
  }

  statusMap = {
    'selected' : 'Selectionné',
    'waiting' : 'En attente',
    'accepted' : 'Accepté',
    'refused' : 'Réfusé',
    'confirmed_by_user' : 'Confirmé par l\'utilisateur',
  }
  updateStatus(registrationId, status)
  {
    let $statusElement = $("#" + registrationId).find('.registration-status-js');
    let classCss = this.statusCssClassMap[status];

    $statusElement.removeClass();
    $statusElement.addClass( classCss );
    $statusElement.html(this.statusMap[status]);
  }
}

