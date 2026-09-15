import "./bootstrap";
import 'video.js/dist/video.min.js';
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
import "./john";
import "./sohan";
import "./foisal";


