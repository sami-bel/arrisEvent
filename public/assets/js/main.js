import { create, Sami } from './modules/test.js';
import { ClientHttp} from './modules/ClientHttp.js';

let sami = new Sami();
let clientHttp = new ClientHttp();

clientHttp.get();
console.log(sami.getName());
create();

$('.event-list-line').on('click', function (){

  console.log('ici');});
