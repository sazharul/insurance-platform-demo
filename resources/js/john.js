var showdiv1 = false;
window.spd1 = function () {
    if (showdiv1) {
        $(".selectPropertyDIV1").hide();
        showdiv1 = false;
        $(".arrow_img1").css("transform", "rotate(0deg)");
        // $(this).parent().find(".js-example-basic-single").select2("open");
    } else {
        $(".selectPropertyDIV1").show();
        showdiv1 = true;
        // $(".arrow_img1").css("transform", "rotate(180deg)");
        // var dd = $(this).parent().find(".js-example-basic-single").select2();
        // dd.select2("close");
    }
};

var showdiv2 = false;
window.spd2 = function () {
    if (showdiv2) {
        $(".selectPropertyDIV2").hide();
        showdiv2 = false;
        $(".arrow_img2").css("transform", "rotate(0deg)");
    } else {
        $(".selectPropertyDIV2").show();
        showdiv2 = true;
        $(".arrow_img2").css("transform", "rotate(180deg)");
    }
};

var showdiv3 = false;
window.spd3 = function () {
    if (showdiv3) {
        $(".selectPropertyDIV3").hide();
        showdiv3 = false;
        $(".arrow_img3").css("transform", "rotate(0deg)");
    } else {
        $(".selectPropertyDIV3").show();
        showdiv3 = true;
        $(".arrow_img3").css("transform", "rotate(180deg)");
    }
};

var showdiv4 = false;
window.spd4 = function () {
    if (showdiv4) {
        $(".selectPropertyDIV4").hide();
        showdiv4 = false;
        $(".arrow_img4").css("transform", "rotate(0deg)");
    } else {
        $(".selectPropertyDIV4").show();
        showdiv4 = true;
        $(".arrow_img4").css("transform", "rotate(180deg)");
    }
};

window.getBranchListByLocation = function (e, url) {
    var location_name = $(e).html();
    $('.sort_btn span').html(location_name);


    $.ajax({
        type: "get",
        url: url,
        success: function (response) {
            $('.show_all_branch').html(response);
        }
    });

};
// window.getPublications = function (e) {
//     $('#publication_sort').on('change', function () {
//         let publication_sort = $('#publication_sort').val();
//         $.ajax({
//             url: "{{ route('sort_publicaitons') }}",
//             method: "get",
//             data: { publication_sort:publication_sort },
//             success: function (response) {
//                 $('sort-publications').html(response);
//             }
//         });
//     });

// };

//sort-publications with ajax
$(document).ready(function () {
    $("#publication_sort").on('change', function () {
        var url = $(this).data('url');
        var publication_sort = $('#publication_sort').val();
        $.ajax({
            url: url,
            method: "GET",
            data: { publication_sort: publication_sort },
            success: function (res) {
                $('.publication_sort_result').html(res);
            }
        });
    });
});
//search-publications with ajax
$(document).ready(function () {
    $("#publications_search").on('keyup', function (e) {
        e.preventDefault();
        let search_string = $('#publications_search').val();
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method: "GET",
            data: { search_string: search_string },
            success: function (res) {
                $('.publication_sort_result').html(res);
                if(res.status=='nothing found'){
                    $('.publication_sort_result').html('<span class="text-danger text-center">'+'Nothing Found'+'</span>');
                }
            }
        });
    });
});
//sort-videos with ajax
$(document).ready(function () {
    $("#video_sort").on('change', function () {
        var url = $(this).data('url');
        var video_sort = $('#video_sort').val();
        $.ajax({
            url: url,
            method: "GET",
            data: { video_sort: video_sort },
            success: function (res) {
                $('.video_sort_result').html(res);
            }
        });
    });
});
//search-videos with ajax
$(document).ready(function () {
    $("#videos_search").on('keyup', function (e) {
        e.preventDefault();
        let search_string = $('#videos_search').val();
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method: "GET",
            data: { search_string: search_string },
            success: function (res) {
                $('.video_sort_result').html(res);
                if(res.status=='nothing found'){
                    $('.video_sort_result').html('<span class="text-danger text-center">'+'Nothing Found'+'</span>');
                }
            }
        });
    });
});
//sort-news_event with ajax
$(document).ready(function () {
    $("#news_event_sort").on('change', function () {
        var url = $(this).data('url');
        var news_event_sort = $('#news_event_sort').val();
        $.ajax({
            url: url,
            method: "GET",
            data: { news_event_sort: news_event_sort },
            success: function (res) {
                $('.news_event_result').html(res);
            }
        });
    });
});
//search-news_event with ajax
$(document).ready(function () {
    $("#news_event_search").on('keyup', function (e) {
        e.preventDefault();
        let search_string = $('#news_event_search').val();
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method: "GET",
            data: { search_string: search_string },
            success: function (res) {
                $('.news_event_result').html(res);
                if(res.status=='nothing found'){
                    $('.news_event_result').html('<span class="text-danger text-center">'+'Nothing Found'+'</span>');
                }
            }
        });
    });
});
//sort-images with ajax
$(document).ready(function () {
    $("#image_sort").on('change', function () {
        var url = $(this).data('url');
        var image_sort = $('#image_sort').val();
        $.ajax({
            url: url,
            method: "GET",
            data: { image_sort: image_sort },
            success: function (res) {
                $('.images_result').html(res);
            }
        });
    });
});
//search-images with ajax
$(document).ready(function () {
    $("#images_search").on('keyup', function (e) {
        e.preventDefault();
        let search_string = $('#images_search').val();
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method: "GET",
            data: { search_string: search_string },
            success: function (res) {
                $('.images_result').html(res);
                if(res.status=='nothing found'){
                    $('.images_result').html('<span class="text-danger text-center">'+'Nothing Found'+'</span>');
                }
            }
        });
    });
});
$("#submit").click(function () {
    var name = $("#name").val();
    var marks = $("#marks").val();
    var str = "You Have Entered "
        + "Name: " + name
        + " and Marks: " + marks;
    $("#modal_body").html(str);
});
function show_video(e, link) {
    video = document.getElementById("my-video");
    // source = document.getElementById("preview_video_link");
    source.src = link;
    video.load();
    video.play();
}

// var text_length = $('.container-fluid .breadgram-hero-area h2').html();

// var media_screen = window.matchMedia("(max-width: 576px)")

// if (media_screen.matches) { // If media query matches
//     if (text_length.length > 30){
//         // $('.container-fluid .breadgram-hero-area h2').css(font-size, "14px");
//         $('.container-fluid .breadgram-hero-area h2').style.fontSize = "10px";
//     }
// }

// $(".selectPropertyDIV option").on("click", function () {
//     $(e).removeClass(".selectPropertyDIV").hide();
// });
