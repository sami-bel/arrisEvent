export class ClientHttp {
  get(url) {
    return $.ajax
    ({
      type: 'GET',
      url: url,
    });
  }

  post(data, url) {
    return $.ajax
    ({
      type: 'POST',
      url: url,
      data: data,
    });
  }
}
