import "./slider";

$(".hamburger").click(function () {
    $(this).toggleClass("change");
    $(".mobile_side_menu").toggle();
    $("body").toggleClass("fixed-position");
});

$(".side_menu_section li").click(function () {
    $(this).siblings().find(".side_sub_menu_section").slideUp();
    $(this).find(".side_sub_menu_section").slideToggle();
});

window.toggleDesktopSubmenu = function (e) {
    $(e).parent().find("ul").toggle();
};

//Show 6 insurance list first start
if (window.matchMedia("(max-width: 576px)").matches) {
    var x = 6;
    var selector = $(".insurance_item:lt(" + x + ")");

    var size_li = $(".insurance_item").length;
    selector.show();

    $(".show_all_insurance_btn").click(function () {
        $(".insurance_item:lt(" + size_li + ")").show();
        $(this).css("opacity", "0.6");
    });
}
//Show 6 insurance list first end

$(".mobile_slider").slick({
    prevArrow: false,
    nextArrow: false,
    autoplay: true,
});

//about coversure slider start

var slideshow = $(".about_coversure_insurance").slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    infinite: true,
    prevArrow: false,
    nextArrow: false,
    autoplay: true,
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});

$(".slick_right_show").click(function () {
    slideshow.slick(
        "slickGoTo",
        parseInt(slideshow.slick("slickCurrentSlide")) + 1
    );
});

$(".slick_left_show").click(function () {
    slideshow.slick(
        "slickGoTo",
        parseInt(slideshow.slick("slickCurrentSlide")) - 1
    );
});

// Thumbnail/alternates slider for product page

// Mujib corner slider start
var mujibImageSlider = $(".mujib_image_slider").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    infinite: true,
    prevArrow: false,
    nextArrow: false,
    autoplay: true,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 380,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});

$(".mujib_img_right_show").click(function () {
    mujibImageSlider.slick(
        "slickGoTo",
        parseInt(mujibImageSlider.slick("slickCurrentSlide")) + 1
    );
});

$(".mujib_img_left_show").click(function () {
    mujibImageSlider.slick(
        "slickGoTo",
        parseInt(mujibImageSlider.slick("slickCurrentSlide")) - 1
    );
});
// Mujib corner slider end

$(".language_change_section").click(function () {
    $(".language_select_option").toggle();
});

// Online Premium Calculator start

window.motorActiveClass = function (e) {
    $(e).toggleClass("carried_card_active");
    $(e).find(".carried_card_img").hide();
    $(e).find(".carried_card_active_img").show();
    $(e)
        .parent()
        .siblings()
        .find(".carried_card")
        .removeClass("carried_card_active");
    $(e).parent().siblings().find(".carried_card_img").show();
    $(e).parent().siblings().find(".carried_card_active_img").hide();
};

window.get_vehicle_type = function (e) {
    var url = $(e).data("url");
    var vehicle_category_id = $(e).data("id");

    if (vehicle_category_id == 2) {
        $(".vt").show();
        $(".t").show();
        $(".t").show();
    } else if (vehicle_category_id == 1) {
        $(".vt").show();
        $(".t").hide();
        $(".v").show();
    } else {
        $(".vt").hide();
        $(".t").hide();
        $(".t").hide();
    }
    $("#vehicle_category_id").val(vehicle_category_id);
    $.ajax({
        type: "get",
        url: url,
        success: function (response) {
            $(".vehicle_type_list").html(response);
        },
    });
};

window.getEngineCapacity = function (e) {
    var url = $(e).data("url");
    var weight = $(e).data("weight");
    var vehicle_type_id = $(e).data("id");
    $("#vehicle_type_id").val(vehicle_type_id);
    $.ajax({
        type: "post",
        url: url,
        data: {
            weight: weight,
        },
        success: function (response) {
            $(".engine_capacity_list").html(response);
        },
    });
};

window.addEngineCapacityActive = function (e) {
    var engine_capacity_id = $(e).data("id");
    $("#engine_capacity_id").val(engine_capacity_id);
    $(e).toggleClass("engine_capacity_active");
    $(e).siblings().removeClass("engine_capacity_active");
};
window.CapacityActive = function (e) {
    var capacity_id = $(e).data("id");
    $("#capacity_id").val(capacity_id);
    $(e).toggleClass("engine_capacity_active");
    $(e).siblings().removeClass("engine_capacity_active");
};
// Online Premium Calculator end
$(".motor_risk_coverage").click(function () {
    $(this).toggleClass("construction_card_active");
    var checkBoxes = $(this).find("input");
    checkBoxes.prop("checked", !checkBoxes.prop("checked"));
});

//Bootstrap Datepicker Start
var date = new Date();
date.setDate(date.getDate());

$(".pp_date").datepicker({
    format: "dd/mm/yyyy",
    endDate: date,
    autoclose: true,
});

$(".date").datepicker({
    format: "dd/mm/yyyy",
    startDate: date,
    autoclose: true,
});

$("#date_of_departure").datepicker({
    format: "dd/mm/yyyy",
    startDate: date,
    autoclose: true,
    todayHighlight: true,
});

$("#date_of_departure")
    .datepicker()
    .on("changeDate", function (selected) {
        var startDate = $("#date_of_departure").datepicker("getDate");

        var date = selected.format();
        date = date.split("/");
        date = date[1] + "/" + date[0] + "/" + date[2];
        const new_date = new Date(date);

        new_date.setDate(new_date.getDate() + 89);

        $("#return_date").datepicker("setStartDate", startDate);
        $("#return_date").datepicker("setDate", startDate);
        $("#return_date").datepicker("setEndDate", new_date);
    });

$("#return_date").datepicker({
    format: "dd/mm/yyyy",
    startDate: date,
    autoclose: true,
    todayHighlight: true,
});

$("#date_of_birth").datepicker({
    format: "dd/mm/yyyy",
    endDate: date,
    autoclose: true,
    todayHighlight: true,
});
$("#getBoilerDate").datepicker({
    format: "yyyy",
    endDate: date,
    viewMode: "years",
    minViewMode: "years",
    autoclose: true, //to close picker once year is selected
});

//Bootstrap Datepicker ENd

window.policyStartDate = function (e) {
    const dateCopy = $(e).val();
    var url = $(e).data("url");
    $.ajax({
        type: "POST",
        url: url,
        data: {
            present_date: dateCopy,
        },
        success: function (data) {
            // $("#addmodalcalculation").html(data);
        },
    });
    $(".policy_end_date").val(dateCopy.setFullYear(dateCopy.getFullYear() + 1));
    var date = new Date($(e).val());
    // $(".policy_end_date").val(date.setDate(date.getDate() + 1));
    // var pp = date.setDate(date.getDate() + 1);
    // console.log(new Date(pp));

    // var someDate = new Date();
    // var numberOfDaysToAdd = 6;
    // var result = someDate.setDate(someDate.getDate() + numberOfDaysToAdd);
    // console.log(new Date(result));

    console.log(dateCopy.setFullYear(dateCopy.getFullYear() + 1));
};

window.selectInsuranceType = function (e, name) {
    $(e).addClass("extra_button");
    $(e).siblings().removeClass("extra_button");
    $("#selected_insurance_type").val(name);

    if (name == "Comprehensive") {
        $(".excludingRiskCoverage").show();
    } else {
        $(".excludingRiskCoverage").hide();
    }
};
window.insuranceFirst = function (e, name) {
    var url = $(e).data("url");
    var base_url = window.location.origin;
    $("#insurance_first").val(name);
    $(e).addClass("extra_button");
    $(e).siblings().removeClass("extra_button");

    if (name == "Renewal Insurance") {
        $.ajax({
            type: "POST",
            url: url,
            success: function (data) {
                if (data.status == false) {
                    window.location.replace(base_url + "/user/login");
                }
            },
        });
        $(".certificate").show();
        $(".renewal_insurance_section").show();
    } else {
        $(".certificate").hide();
        $(".renewal_insurance_section").hide();
    }
};
var covarage = [];
window.getCertificateDetails = function (e) {
    var c_number = $(e).val();
    var url = $(e).data("url");

    $.ajax({
        type: "POST",
        url: url,
        data: {
            c_number: c_number,
        },
        success: function (data) {
            if (data.status == true) {
                var base_url = window.location.origin;
                $(".dca").hide();
                var order = data.order;
                console.log(order.sell_details);
                selectInsuranceType(
                    this,
                    order.sell_details.details.selected_insurance_type
                );

                /**
                 * selected_insurance_type data manage strats
                 */
                if (
                    order.sell_details.details.selected_insurance_type ==
                    "Comprehensive"
                ) {
                    $(".Comprehensive").siblings().removeClass("extra_button");
                    $(".Comprehensive").addClass("extra_button");
                } else {
                    $(".Act_Liability").siblings().removeClass("extra_button");
                    $(".Act_Liability").addClass("extra_button");
                }
                $("#selected_insurance_type").val(
                    order.sell_details.details.selected_insurance_type
                );
                /**
                 * selected_insurance_type data manage ends
                 */

                /**
                 * vehicle related all task starts
                 */

                $(
                    "#vehicle_category_id_" +
                    order.sell_details.details.tariff.vehicle_category_id
                ).addClass("carried_card_active");

                //setting front page value
                $("#vehicle_category_id").val(
                    order.sell_details.details.tariff.vehicle_category_id
                );
                $("#vehicle_type_id").val(
                    order.sell_details.details.tariff.vehicle_type_id
                );
                $("#engine_capacity_id").val(
                    order.sell_details.details.tariff.engine_capacity_id
                );
                //***************** */

                $(
                    "#vehicle_category_id_" +
                    order.sell_details.details.tariff.vehicle_category_id
                )
                    .find(".carried_card_active_img")
                    .css("display", "none");

                $.ajax({
                    type: "get",
                    url:
                        base_url +
                        "/get_vehicle_type_renewal/" +
                        order.sell_details.details.tariff.vehicle_category_id +
                        "/" +
                        order.sell_details.details.tariff.vehicle_type_id,
                    success: function (response) {
                        // $(".vehicle_type_list").html(response);
                        if (response.status == true) {
                            var html = "";
                            html += '<h2 class="mt-5 mb-3">Vehicle Type</h2>';
                            html += '<div class="row">';
                            html += '<div class="col-lg-12">';
                            html += '<div class="panel_type">';
                            $.each(response.type, function (index, value) {
                                var type_active_class = "";
                                var card_img = "";
                                var card_active_img = "";
                                if (
                                    value.id ==
                                    order.sell_details.details.tariff
                                        .vehicle_type_id
                                ) {
                                    type_active_class = "carried_card_active";
                                    card_img = 'style="display: none"';
                                    card_active_img = 'style="display: inline"';
                                }
                                html += '<div class="property_card">';
                                html +=
                                    '<div class="card carried_card ' +
                                    type_active_class +
                                    '" ';
                                html +=
                                    'data-id="' +
                                    value.id +
                                    '" data-url="' +
                                    base_url +
                                    "/get_engine_capacity/" +
                                    value.id +
                                    '">';
                                html +=
                                    '<img class="carried_card_img" src="' +
                                    base_url +
                                    "/" +
                                    value.color_image +
                                    '" alt=""' +
                                    card_img +
                                    ">";
                                html +=
                                    '<img class="carried_card_active_img" src="' +
                                    base_url +
                                    "/" +
                                    value.white_image +
                                    '" alt=""' +
                                    card_active_img +
                                    ">";
                                html +=
                                    '<h3 class="">' + value.en_name + "</h3>";
                                html += "</div>";
                                html += "</div>";
                            });
                            html += "</div>";
                            html += "</div>";
                            html += "</div>";

                            $(".vehicle_type_list").html(html);
                        }
                    },
                });

                //engine capacity update here
                var capacity = "";

                capacity +=
                    '<h2 class="mt-5 mb-3 vehicle_engine_capacity">Engine Capacity (CC)</h2>';
                capacity += '<div class="row">';

                capacity += '<div class="col-lg-3 col-md-3 col-sm-3"></div>';
                capacity += '<div class="col-lg-6 col-md-6 col-sm-6">';
                capacity += '<div class="form-group">';
                capacity +=
                    '<input type="number" class="form-control" id="engine_capacity_cc" placeholder="Engine capacity in cc" value="' +
                    order.sell_details.details.tariff.vehicle_category_id +
                    '">';
                capacity += "</div>";
                capacity += "</div>";
                capacity += '<div class="col-lg-3 col-md-3 col-sm-3"></div>';
                capacity += "</div>";

                //vehicle weight is update here
                if (
                    order.sell_details.details.tariff.vehicle_category_id !== 3
                ) {
                    capacity +=
                        '<h2 class="mt-5 mb-3 vehicle_engine_capacity">Vehicle Weight (Ton)</h2>';
                    capacity += '<div class="row">';

                    capacity +=
                        '<div class="col-lg-3 col-md-3 col-sm-3"></div>';
                    capacity += '<div class="col-lg-6 col-md-6 col-sm-6">';
                    capacity += '<div class="form-group">';
                    capacity +=
                        '<input type="number" class="form-control" id="vehicle_weight_ton" placeholder="Vehicle weight in ton" value="' +
                        order.sell_details.details.vehicle_weight_ton +
                        '">';
                    capacity += "</div>";
                    capacity += "</div>";
                    capacity +=
                        '<div class="col-lg-3 col-md-3 col-sm-3"></div>';
                    capacity += "</div>";
                }
                $(".engine_capacity_list").html(capacity);

                /**
                 * vehicle related all task end
                 */
                //vehicle_price
                $("#vehicle_price").val(
                    order.sell_details.details.vehicle_price
                );
                //passanger
                $("#passanger").val(order.sell_details.details.passenger);

                /**
                 * driver selection starts
                 */

                let self = document.getElementById("self-driver");
                self.checked = false;
                let paid = document.getElementById("paid-driver");
                paid.checked = false;

                if (order.sell_details.details.driver_type == "paid") {
                    var radiobtn = document.getElementById("paid-driver");
                    radiobtn.checked = true;
                } else {
                    var radiobtn = document.getElementById("self-driver");
                    radiobtn.checked = true;
                }
                /**
                 * driver selection ends
                 */

                //tachometer strats from here
                if (order.sell_details.details.tachometer_amount > 0) {
                    var tachometer_amount =
                        document.getElementById("tachometer");
                    tachometer_amount.checked = true;
                }
                if (order.sell_details.details.vtss_amount > 0) {
                    var vtss_amount = document.getElementById("vts_meter");
                    vtss_amount.checked = true;
                }
                //tachometer ends here

                //making selected for every marked risk cover
                var risk_cover = order.sell_details.details.risk_cover;

                $.each(risk_cover, function (index, value) {
                    covarage.push(value.id);
                    $("#active_risk_coverage_id_" + value.id).addClass(
                        "construction_card_active"
                    );
                    $("#active_risk_coverage_id_" + value.id)
                        .find(".motor_risk_value")
                        .attr("checked");
                });
                $("#c_capacity").val(covarage);
            } else {
                $(".dca").show();
            }
        },
    });
};
window.NCB = function (e) {
    $("#ncb").val($(e).val());
};
window.loading = function (e) {
    $("#loading").val($(e).val());
};
window.motorCalculate = function (e) {
    var url = $(e).data("url");
    var calculator_id = $("#calculator_id").val();
    var vehicle_category_id = $("#vehicle_category_id").val();
    var vehicle_type_id = $("#vehicle_type_id").val();
    // var engine_capacity_id = $("#engine_capacity_id").val();
    var vehicle_price = $("#vehicle_price").val();
    var passanger = $("#passanger").val();
    var certificate_number = $("#certificate_number").val();
    var ncb = $("#ncb").val();
    var loading = $("#loading").val();
    var selected_insurance_type = $("#selected_insurance_type").val();
    var insurance_first = $("#insurance_first").val();
    var policy_start_date = $("#policy_start_date").val();
    var engine_capacity_cc = $("#engine_capacity_cc").val();
    var vehicle_weight_ton = $("#vehicle_weight_ton").val();
    // var capacity_id = $("#capacity_id").val();
    // return;

    if (passanger == "") {
        alert("Passenger Can not be empty");
        return false;
    }

    if (vehicle_price == "") {
        alert("Vehicle Price Can not be empty");
        return false;
    }

    console.log("aa" + $("#c_capacity").val());
    if (insurance_first == "First Time Insurance") {
        var covarage = [];
        $.each($("input[name='motor_risk']:checked"), function () {
            covarage.push($(this).val());
        });
    } else {
        var covarage = $("#c_capacity").val().split(",");
        console.log(covarage);
    }

    var tachometer = "no";
    if (document.getElementById("tachometer").checked) {
        var tachometer = "yes";
    }
    var vtss = "no";
    if (document.getElementById("vts_meter").checked) {
        var vtss = "yes";
    }

    var driver_type = document.querySelector(
        'input[name="driver"]:checked'
    ).value;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
            vehicle_category_id: vehicle_category_id,
            vehicle_type_id: vehicle_type_id,
            // engine_capacity_id: engine_capacity_id,
            vehicle_price: vehicle_price,
            passanger: passanger,
            covarage: covarage,
            vtss: vtss,
            tachometer: tachometer,
            driver_type: driver_type,
            certificate_number: certificate_number,
            ncb: ncb,
            loading: loading,
            selected_insurance_type: selected_insurance_type,
            insurance_first: insurance_first,
            policy_start_date: policy_start_date,
            engine_capacity_cc: engine_capacity_cc,
            vehicle_weight_ton: vehicle_weight_ton,
            // capacity_id: capacity_id,
        },
        success: function (data) {
            $("#addmodalcalculation").html(data);
        },
    });
};

window.openPopup = function () {
    document.getElementById("popup").style.display = "block";
};


window.closePopup = function () {
    document.getElementById("popup").style.display = "none";
};
