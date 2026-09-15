import _ from 'lodash';
import $ from 'jquery';
window.$ = $;
window._ = _;


import select2 from 'select2';
select2();


import 'bootstrap';

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import 'bootstrap-datepicker/dist/js/bootstrap-datepicker';

import 'video.js/dist/video.min';
import 'slick-carousel/slick/slick.min'

import Swal from 'sweetalert2';

$(".js-example-basic-single").select2();

$(document).on('select2:open', () => {
    document.querySelector('.select2-search__field').focus();
});
