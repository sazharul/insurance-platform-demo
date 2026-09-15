// window.marinCarriedBy = function (e) {
//     $(e).toggleClass("carried_card_active");
//     $(e).find(".white_image").toggle();
//     $(e).find(".black_image").toggle();

//     var url = $(e).data("url");
//     var calculator_id = $(e).data("calculator_id");
//     var carriedby_id = $(e).data("id");
//     console.log(carriedby_id);

//     $("#carried_id").val(carriedby_id);
//     $.ajax({
//         type: "POST",
//         url: url,
//         data: {
//             calculator_id: calculator_id,
//             carriedby_id: carriedby_id,
//         },
//         dataType: "html",
//         success: function (data) {
//             $("#risk_cover_area").html(data);
//         },
//     });
// };

// Menu Hover effect start
import Swal from "sweetalert2";

var toastMixin = Swal.mixin({
    toast: true,
    icon: "success",
    title: "General Title",
    animation: false,
    position: "top-right",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

$(".show_sub_menu").hover(
    function () {
        $(this).find(".desktop_sub_menu1").show();
        $(this).find(".desktop_sub_menu2").show();
    },

    function () {
        $(this).find(".desktop_sub_menu1").hide();
        $(this).find(".desktop_sub_menu2").hide();
    }
);
// window.openSelectBox = function (e) {
//     console.log($(e).parent().find(".select2"));
//     $(e).parent().find(".js-example-basic-single").select2("open");
// };

$(".pp").on("click", function () {
    $(this).parent().find(".js-example-basic-single").select2("open");
    $(this).removeClass("pp");
    $(this).addClass("ss");
});
$(".ss").on("click", function () {
    console.log("ok");
    $(this).parent().find(".js-example-basic-single").select2("close");
    $(this).removeClass("ss");
    $(this).addClass("pp");
});
// $(".filter_arrow_box").on("click", function () {
//     console.log("ok");
//     $(".additional_coverage_card").trigger("click");
// });
// Menu Hover effect end

// $(document).on("click", function (event) {
//     var target = $(event.target);
//     var menu = $(".main_menu").parent();
//
//     // Check if the clicked element is outside of the menu div
//     if (!target.closest(menu).length) {
//         $(".desktop_sub_menu1").hide();
//         $(".desktop_sub_menu2").hide();
//     }
// });

// $(".main_menu").on("click", function () {
//     $(this).parent().find(".desktop_sub_menu1").toggle();
//     $(this).parent().find(".desktop_sub_menu2").toggle();
//
//     $(this).parent().siblings().find(".desktop_sub_menu1").hide();
//     $(this).parent().siblings().find(".desktop_sub_menu2").hide();
// });
var marin_carried_by = [];
$("div.carried_by").on("click", function () {
    $(this).parent().find(".carried_card").toggleClass("carried_card_active");
    // $(this)
    //     .parent()
    //     .siblings()
    //     .find(".carried_card")
    //     .removeClass("carried_card_active");
    $(this).parent().find(".white_image").toggle();
    $(this).parent().find(".black_image").toggle();

    // $(this).parent().siblings().find(".white_image").hide();
    // $(this).parent().siblings().find(".black_image").show();

    var url = $(this).data("url");
    var calculator_id = $(this).data("calculator_id");
    var carriedby_id = $(this).data("id");

    $("#carried_id").val(carriedby_id);
    $("#carried_risk_id").val("");
    $("#marine_interest_id").val("");
    if (
        $(this).parent().find(".carried_card").hasClass("carried_card_active")
    ) {
        marin_carried_by.push({
            carried_by: carriedby_id,
            carried_risk_id: "",
            marine_interest_id: "",
        });
    } else {
        if (marin_carried_by.filter((e) => e.carried_by != carriedby_id)) {
            marin_carried_by = $.grep(marin_carried_by, function (n) {
                return n.carried_by != carriedby_id;
            });
            $("#marin_carried_by").val(JSON.stringify(marin_carried_by));
        }
    }

    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
            carriedby_id: carriedby_id,
        },
        dataType: "html",
        success: function (data) {
            $("#risk_cover_area").html(data);
        },
    });
});

$("div.occupation_panel").on("click", function () {
    $(this)
        .parent()
        .find(".occupation_panel")
        .addClass("occupation_panel_active");
    $(this)
        .parent()
        .siblings()
        .find(".occupation_panel")
        .removeClass("occupation_panel_active");
    $(this).parent().find(".white_image").show();
    $(this).parent().find(".black_image").hide();

    $(this).parent().siblings().find(".white_image").hide();
    $(this).parent().siblings().find(".black_image").show();
});

window.cashOnTransit = function (e) {
    $(e).parent().find(".carried_card").addClass("carried_card_active");
    $(e)
        .parent()
        .siblings()
        .find(".carried_card")
        .removeClass("carried_card_active");
    $(e).parent().find(".white_image").show();
    $(e).parent().find(".black_image").hide();

    $(e).parent().siblings().find(".white_image").hide();
    $(e).parent().siblings().find(".black_image").show();

    $("#institute_type_id").val($(e).data("property_occupation_id"));
    var name = $(e).data("name");
    if (name == "Bank" || name == "Industrial") {
        $(".armod").show();
    } else {
        $(".armod").hide();
    }
};
window.srcc = function (e) {
    $("#srcc_id").val($(e).val());
    $("#srcc_name").val(name);
};
// $("div.construction_card").on("click", function (e) {
//     alert('ok');
//     $(e).find(".construction_card").addClass("construction_card_active");
//     $(e)
//         .parent()
//         .siblings()
//         .find(".construction_card")
//         .removeClass("construction_card_active");
//     $(e).find(".polygon_icon").show();

//     $(e).siblings().find(".polygon_icon").hide();
// });

// $("div.risk_covered_btn").on("click", function () {
//     console.log($(this).parent().addClass("risk_covered_btn_active"));
//     $(this).parent().addClass("risk_covered_btn_active");
//     $(this).parent().siblings().removeClass("risk_covered_btn_active");
// });

window.changeRiskCoverage = function (e, risk_id) {
    $("#carried_risk_id").val(risk_id);
    $(e).addClass("risk_covered_btn_active");
    $(e).siblings().removeClass("risk_covered_btn_active");

    var url = $(e).data("url");
    var calculator_id = $(e).data("calculator_id");
    var carried_by_id = $(e).data("carried_by_id");
    var objIndex = marin_carried_by.findIndex(
        (obj) => obj.carried_by == carried_by_id
    );
    marin_carried_by[objIndex].carried_risk_id = risk_id;
    $("#marin_carried_by").val(JSON.stringify(marin_carried_by));

    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
            risk_id: risk_id,
        },
        dataType: "html",
        success: function (data) {
            $("#risk_coverage_interest").html(data);
        },
    });
};

window.getMarineInterestType = function (e) {
    var value = $(e).val().split(",");
    var objIndex = marin_carried_by.findIndex(
        (obj) => obj.carried_risk_id == value[2].trim()
    );

    marin_carried_by[objIndex].marine_interest_id = value[0].trim();

    $("#marin_carried_by").val(JSON.stringify(marin_carried_by));
    $("#marine_interest_id").val(value[0].trim());
    $("#interestType").val(value[1]);
    // $(e).parent().parent().parent().hide();
};

window.classOfOccupation = function (e) {
    $("#occupation_id").val($(e).data("occupation_id"));
};
window.getRiskCoverage = function (e) {
    var id = $(e).data("property_location_id");
    var name = $(e).data("property_location_name");
    $("#risk_coverage_id").val($(e).val());
    $("#risk_coverage_name").val(name);
};

//premium calculator
function getPropertyOrOccupation(e, calculator_id) {
    console.log(calculator_id);
}

// window.show_dropdown_option = function (e) {
//     $(e).parent().find(".selectPropertyDIV").toggle();
//     $(e).parent().siblings().find(".selectPropertyDIV").hide();
// };

// window.show_dropdown_option2 = function (e) {
//     $(e).parent().find(".selectPropertyDIV2").toggle();
//     $(e).parent().siblings().find(".selectPropertyDIV2").hide();
// };

// window.show_dropdown_option3 = function (e) {
//     $(e).parent().find(".selectPropertyDIV3").toggle();
//     $(e).parent().siblings().find(".selectPropertyDIV3").hide();
// };

window.getMemberAssociationID = function (e) {
    $("#member_association_id").val($(e).val());
    // $("#member_association_name").val(member_name);
    // $(e).parent().parent().parent().hide();
    $(".memberInterestType").hide();
    $("#interest_type_id").val("");
};

window.getPropertyLocation = function (e) {
    var calculator_id = $(e).data("calculator_id");
    var property_location_id = $(e).val();
    var property_location_name = $(e).data("property_location_name");
    var url = $(e).data("url");
    $("#property_location_id").val(property_location_id);
    $(".property_location_name").val(property_location_name);
    $("#property_location_name").val(property_location_name);

    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
        },
        dataType: "html",
        success: function (data) {
            $("#premiumCalculator").append(data);
        },
    });
};

window.getConstructionType = function (e) {
    console.log("ok");
    $(e).find(".carried_card").addClass("carried_card_active");
    $(e).siblings().find(".carried_card").removeClass("carried_card_active");
    $(e).find(".white_image").show();
    $(e).find(".black_image").hide();

    $(e).siblings().find(".white_image").hide();
    $(e).siblings().find(".black_image").show();

    var calculator_id = $(e).data("calculator_id");
    var property_occupation_id = $(e).data("property_occupation_id");
    var url = $(e).data("url");
    var interest_url = $(e).data("interest_url");
    var member = $(e).data("member");
    var name = $(e).data("name");

    if (name != "Industry") {
        $(".add_c").show();
        $(".add_ac").hide();
    } else {
        $(".add_c").show();
        $(".add_ac").show();
    }
    $("#property_occupation_id").val(property_occupation_id);

    if (member == 1) {
        $("#memberOfAssociation").show();
    } else {
        $("#memberOfAssociation").hide();
        $("#member_association_id").val("");
    }
    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
        },
        dataType: "html",
        success: function (data) {
            $("#constructionandcoverage").html(data);
        },
    });
    $.ajax({
        type: "POST",
        url: interest_url,
        data: {
            calculator_id: calculator_id,
            property_occupation_id: property_occupation_id,
        },
        dataType: "html",
        success: function (data) {
            $("#interest_type").html(data);
        },
    });
};
$("option.select_property_option").on("click", function () {
    $(this).parent().parent().parent().css("display", "none");
    $(".arrow_img1").css("transform", "rotate(0deg)");
    $(".arrow_img2").css("transform", "rotate(0deg)");
    $(".arrow_img3").css("transform", "rotate(0deg)");
    $(".arrow_img4").css("transform", "rotate(0deg)");
});
window.getConstructionID = function (e, calculator_id, construction_id) {
    $(e).find(".construction_card").addClass("construction_card_active");
    $(e)
        .siblings()
        .find(".construction_card")
        .removeClass("construction_card_active");
    // $(e).find(".polygon_icon").show();

    // $(e).siblings().find(".polygon_icon").hide();

    $("#building_construction_id").val(construction_id);
    var url = $(e).data("url");
    // $("#property_occupation_id").val(property_occupation_id);

    $("#add_roof").html("");

    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
            construction_id: construction_id,
        },
        dataType: "html",
        success: function (data) {
            $("#add_roof").html(data);
        },
    });
};

window.getConstructionRoofID = function (construction_roof_id, roof_name, e) {
    $("#building_construction_roof_id").val(construction_roof_id);
    $("#building_construction_roof_name").val(roof_name);
    // $(e).parent().parent().parent().hide();
};
window.getInterestTypeID = function (e) {
    $("#interest_type_id").val($(e).val());
    $("#interest_type_name").val();
    // $(e).parent().parent().parent().hide();
};

var arr = [];
var previous_amount = 0;
window.add = function (identity, id, s_id = "", e) {
    var total_amount = Number($("#total_amount").val());
    var amount = $("#sub_amount_" + id).val();

    if (amount > 0) {
        $(".amount_value_message_" + id).hide();
    } else {
        $("#fire-insurence").hide();
        $(".amount_value_message_" + id).show();
    }

    if (amount > total_amount) {
        $("#fire-insurence").hide();
        $("#sub_amount_" + id).val(previous_amount);
        $("#amount_message_" + id).show();
    } else {
        previous_amount = $("#sub_amount_" + id).val();
        $("#amount_message_" + id).hide();
    }
    amount = previous_amount;

    var district_id = $("#get_district_for_" + id).val();
    if (!district_id) {
        district_id = "";
    }
    $("#sub_amount_" + id).css("border", "1px solid black");
    if (identity == "i") {
        if (amount == null) {
            alert("empty amount");
            return;
        }
        if (id && s_id) {
            const found = arr.some(
                (el) => el.coverage_id == id && el.c_sub_id == s_id
            );

            if (!found) {
                arr.push({
                    coverage_id: id,
                    coverage_amount: amount,
                    c_sub_id: s_id,
                    district_id: district_id,
                });
            } else {
                for (var i in arr) {
                    arr[i].coverage_amount = amount;
                }
            }
        } else if (id) {
            console.log("ppppp");
            const found = arr.some((el) => el.coverage_id == id);
            if (!found) {
                arr.push({
                    coverage_id: id,
                    coverage_amount: amount,
                    c_sub_id: s_id,
                    district_id: district_id,
                });
            } else {
                arr = $.grep(arr, function (n) {
                    return n.coverage_id != id;
                });
                arr.push({
                    coverage_id: id,
                    coverage_amount: amount,
                    c_sub_id: s_id,
                    district_id: district_id,
                });
            }
        }
    } else if (identity == "c") {
        if (amount == null) {
            alert("empty amount");
            return;
        }
        if ($(e).is(":checked")) {
            if (id && s_id) {
                const found = arr.some(
                    (el) => el.coverage_id == id && el.c_sub_id == s_id
                );
                if (!found) {
                    arr.push({
                        coverage_id: id,
                        coverage_amount: amount,
                        c_sub_id: s_id,
                        district_id: district_id,
                    });
                } else {
                    arr = $.grep(arr, function (n) {
                        return n.coverage_id != id && n.c_sub_id != s_id;
                    });
                    arr.push({
                        coverage_id: id,
                        coverage_amount: amount,
                        c_sub_id: s_id,
                        district_id: district_id,
                    });
                }
            } else if (id) {
                const found = arr.some((el) => el.coverage_id == id);
                if (!found) {
                    arr.push({
                        coverage_id: id,
                        coverage_amount: amount,
                        c_sub_id: s_id,
                        district_id: district_id,
                    });
                } else {
                    arr = $.grep(arr, function (n) {
                        return n.coverage_id != id;
                    });
                    arr.push({
                        coverage_id: id,
                        coverage_amount: amount,
                        c_sub_id: s_id,
                        district_id: district_id,
                    });
                }
            }
        } else {
            arr = $.grep(arr, function (n) {
                return n.c_sub_id != s_id;
            });
        }
    }
    // console.log(arr);
    return arr;
};
// window.aa = function (e, id) {};
window.getAdditionalCoverageID = function (e, additional_coverage_id) {
    $("#toggleAdditionalSubcoverage_" + additional_coverage_id).toggle();
    if (
        $(e)
            .find(".additional_coverage_card")
            .hasClass("additional_coverage_card_active")
    ) {
        arr = $.grep(arr, function (n) {
            return n.coverage_id != additional_coverage_id;
        });
        $("#sub_amount_" + additional_coverage_id).val("");
        $("#additional_coverage_id").val("");
    } else {
        $("#additional_coverage_id").val(additional_coverage_id);
    }
    document.getElementById("sub_amount_" + additional_coverage_id).focus();
    $(e)
        .find(".additional_coverage_card")
        .toggleClass("additional_coverage_card_active");

    // $(e).find('text-left').toggleClass('sub_coverage');
    // $(e)
    //     .siblings(e)
    //     .find(".additional_coverage_card")
    //     .removeClass("additional_coverage_card_active");
    $(e).find(".white_image").toggle();
    $(e).find(".black_image").toggle();

    // $(e).siblings().find(".white_image").hide();
    // $(e).siblings().find(".black_image").show();
};

window.getAdditionalCoverageID2 = function (e, additional_coverage_id) {
    $("#toggleAdditionalSubcoverage_" + additional_coverage_id).toggle();
    if (
        $(e)
            .find(".additional_coverage_card")
            .hasClass("additional_coverage_card_active")
    ) {
        arr = $.grep(arr, function (n) {
            return n.coverage_id != additional_coverage_id;
        });
        $("#sub_amount_" + additional_coverage_id).val("");
        $("#additional_coverage_id").val("");
    } else {
        $("#additional_coverage_id").val(additional_coverage_id);
    }
    $(e)
        .find(".additional_coverage_card")
        .toggleClass("additional_coverage_card_active");

    // $(e).find('text-left').toggleClass('sub_coverage');
    // $(e)
    //     .siblings(e)
    //     .find(".additional_coverage_card")
    //     .removeClass("additional_coverage_card_active");
    $(e).find(".white_image").toggle();
    $(e).find(".black_image").toggle();

    // $(e).siblings().find(".white_image").hide();
    // $(e).siblings().find(".black_image").show();
};
window.date_of_birth = function (e) {
    let date = $(e).val();
    $.ajax({
        type: "POST",
        url: "/calculation/bongo-dob",
        data: {
            dob: date,
        },
        dataType: "html",
        success: function (data) {
            console.log(data);
        },
    });
    date = date.split("/");
    date = date[1] + "/" + date[0] + "/" + date[2];
    var birthdate = new Date(date);

    var cur = new Date();
    var diff = cur - birthdate; // This is the difference in milliseconds
    var age = Math.floor(diff / 31557600000);
    $("#calculated_dob").val(age);
};

//marin starts
window.getCargoProductValue = function (e) {
    var cp = $(e).val();
    var data = cp.split(",");
    $("#cargo_id").val(data[0]);
    $("#cargoProductValue").val(name);

    if (data[1] == 1) {
        $("#toggle_member").show();
        $(".onclick-select2").select2();
    } else {
        $("#toggle_member").hide();
    }
    $(".selectPropertyDIV1").hide();
};
window.getDistrictValue = function (e) {
    $("#district_id").val($(e).val());
    $("#district_name").val(name);
};
window.getTariffType = function (e) {
    $("#tariff_id").val($(e).val());
    $("#tariffName").val(name);
};

window.marinCalculate = function (e) {
    var calculator_id = $("#calculator_id").val();
    var cargo_product_id = $("#cargo_id").val();
    var member_association_id = $("#member_association_id").val();
    var tariff_id = $("#tariff_id").val();
    var carried_id = $("#carried_id").val();
    var carried_risk_id = $("#carried_risk_id").val();
    var additional_coverage_id = $("#additional_coverage_id").val();
    var total_sum_insured = $("#total_sum_insured").val();
    var marine_interest_id = $("#marine_interest_id").val();
    var marin_carried_by = $("#marin_carried_by").val();
    var url = $(e).data("url");

    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
            cargo_product_id: cargo_product_id,
            member_association_id: member_association_id,
            tariff_id: tariff_id,
            carried_id: carried_id,
            carried_risk_id: carried_risk_id,
            additional_coverage_id: additional_coverage_id,
            total_sum_insured: total_sum_insured,
            marine_interest_id: marine_interest_id,
            marin_carried_by: marin_carried_by,
        },
        dataType: "html",
        success: function (data) {
            $("#addmodalcalculation").html(data);
        },
    });
};

/**NOTE - mediclaim */
$("div.overseas_card").on("click", function () {
    var sub_type_id = $(this).data("insurance_sub_type");
    $("#insurance_sub_type_id").val(sub_type_id);

    $(this).parent().find(".overseas_card").addClass("overseas_card_active");
    $(this)
        .parent()
        .siblings()
        .find(".overseas_card")
        .removeClass("overseas_card_active");

    $(this).parent().find("#active_text").addClass("active_p");
    $(this).parent().siblings().find("#active_text").removeClass("active_p");

    $(this).parent().find(".white_image").show();
    $(this).parent().find(".black_image").hide();

    $(this).parent().siblings().find(".white_image").hide();
    $(this).parent().siblings().find(".black_image").show();
});

window.getDateDifferent = function () {
    var date1 = $("#date_of_departure").val();
    var date2 = $("#return_date").val();

    $("#user_date_of_departure").val(date1);
    $("#user_return_date").val(date2);

    var date1 = date1;
    date1 = date1.split("/");
    date1 = date1[1] + "/" + date1[0] + "/" + date1[2];

    var date2 = date2;
    date2 = date2.split("/");
    date2 = date2[1] + "/" + date2[0] + "/" + date2[2];

    var dt1 = new Date(date1);
    var dt2 = new Date(date2);

    var total_date = Math.floor(
        (Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) -
            Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) /
            (1000 * 60 * 60 * 24)
    );

    var duration = parseInt(total_date) + 1;
    $("#travel_duration").html(duration);
    $("#travel_duration_value").val(duration);
};

window.setDateOfBirth = function (e) {
    let date = $(e).val();
    $("#user_date_of_birth").val(date);
    date = date.split("/");
    date = date[1] + "/" + date[0] + "/" + date[2];
    var birthdate = new Date(date);
    // console.log(date);

    var cur = new Date();
    var diff = cur - birthdate; // This is the difference in milliseconds
    var age = Math.floor(diff / 31557600000);

    // var dob = $("#date_of_birth").val();

    // $("#user_date_of_birth").val(dob);

    // var birthdate = new Date($(e).val());
    // var cur = new Date();
    // var diff = cur - birthdate; // This is the difference in milliseconds
    // // console.log(diff);
    // var age = Math.floor(diff / 31557600000);
    $("#calculated_dob").html(age);
};

window.toggleCountryType = function () {
    $(".innter_country_type").toggle();
};
$(".child_inner_class_type").on("click", function () {
    $(this).parent().hide();

    var input = $(this).data("type");
    console.log(input);
    if (input == "1") {
        $(".all_new_country_list .sengen").show();
        $(".all_new_country_list .nonsengen").hide();
        $(".all_new_country_list .isengen").hide();
        $(".all_new_country_list .inonsengen").hide();
        $(this).find(".child_inner_class_type .inonsengen").hide();
    } else if (input == "2") {
        $(".all_new_country_list .sengen").hide();
        $(".all_new_country_list .nonsengen").show();
        $(".all_new_country_list .isengen").hide();
        $(".all_new_country_list .inonsengen").hide();
    } else if (input == "3") {
        $(".all_new_country_list .sengen").hide();
        $(".all_new_country_list .nonsengen").hide();
        $(".all_new_country_list .isengen").show();
        $(".all_new_country_list .inonsengen").hide();
    } else if (input == "4") {
        $(".all_new_country_list .sengen").hide();
        $(".all_new_country_list .nonsengen").hide();
        $(".all_new_country_list .isengen").hide();
        $(".all_new_country_list .inonsengen").show();
    } else {
        $(".all_new_country_list .sengen").show();
        $(".all_new_country_list .nonsengen").show();
        $(".all_new_country_list .isengen").show();
        $(".all_new_country_list .inonsengen").show();
    }

    var type = "";
    if (input == 1) {
        type = "NONSCHENGEN";
    } else if (input == 2) {
        type = "SCHENGEN";
    } else {
        type = "All Country";
    }
    $(".default_country_type").html(type);
    // $(this).parent().hide();

    // var input, filter, table, tr, a, i, txtValue;

    // var input = $(this).data("type");
    // table = document.getElementById("my_tr");
    // tr = table.getElementsByTagName("tr");
    // for (i = 0; i < tr.length; i++) {
    //     a = tr[i].getElementsByTagName("span")[0];
    //     txtValue = a.textContent || a.innerText;

    //     console.log(txtValue.indexOf(input));
    //     if (txtValue.indexOf(input) > -1) {
    //         tr[i].style.display = "";
    //     } else {
    //         tr[i].style.display = "none";
    //     }
    // }
});
// window.selectSengenNonSengen = function (e) {
//     var input, filter, table, tr, a, i, txtValue;

//     var input = $(e).val();
//     table = document.getElementById("my_tr");
//     tr = table.getElementsByTagName("tr");
//     for (i = 0; i < tr.length; i++) {
//         a = tr[i].getElementsByTagName("span")[0];
//         txtValue = a.textContent || a.innerText;

//         //console.log(txtValue);
//         if (txtValue.indexOf(input) > -1) {
//             tr[i].style.display = "";
//         } else {
//             tr[i].style.display = "none";
//         }
//     }
// };
window.searchCountry = function () {
    var input, filter, table, tr, a, i, txtValue;
    input = document.getElementById("search_country");
    filter = input.value.toUpperCase();
    table = document.getElementById("my_tr");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        a = tr[i].getElementsByTagName("label")[0];
        txtValue = a.textContent || a.innerText;

        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
};

var country = [];
var country_list = [];
window.getSelectedCountry = function (country_id, country_name, e) {
    let obj = {
        id: country_id,
        name: country_name,
    };

    if ($(e).is(":checked")) {
        country_list.push(obj);
        country.push(country_id);
    } else {
        country_list = $.grep(country_list, function (n) {
            return n.id != country_id;
        });
        country = $.grep(country, function (n) {
            return n != country_id;
        });
    }

    $("#user_visit_country").val(country);
    showCountryListFrontend(country_list);
};

window.removeSelectedCountryList = function (id) {
    console.log(id);
    country_list = $.grep(country_list, function (n) {
        return n.id != id;
    });
    $("#country" + id).prop("checked", false);

    showCountryListFrontend(country_list);
};

window.showCountryListFrontend = function (country_list) {
    var data = "";
    for (var i = 0; i < country_list.length; i++) {
        data +=
            '<button class="btn mb-2 mr-10" type="button">' +
            country_list[i]["name"] +
            '<span id="current_selected_country"></span>';
        data +=
            '<img src="/images/website/close_icon.png" alt="" onclick="removeSelectedCountryList(' +
            country_list[i]["id"] +
            ')"></button>';
    }
    console.log();
    $("#selected_country_name").html(data);
};

window.mediclaimCalculate = function (e) {
    var url = $(e).data("url");
    var calculator_id = $("#calculator_id").val();
    var insurance_sub_type_id = $("#insurance_sub_type_id").val();
    var user_visit_country = $("#user_visit_country").val();
    var user_date_of_departure = $("#user_date_of_departure").val();
    var user_return_date = $("#user_return_date").val();
    var user_date_of_birth = $("#user_date_of_birth").val();
    var travel_duration_value = $("#travel_duration_value").val();

    console.log(user_date_of_birth);

    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
            insurance_sub_type_id: insurance_sub_type_id,
            user_visit_country: user_visit_country,
            user_date_of_departure: user_date_of_departure,
            user_return_date: user_return_date,
            user_date_of_birth: user_date_of_birth,
            travel_duration_value: travel_duration_value,
        },
        dataType: "html",
        success: function (data) {
            $("#addmodalcalculation").html(data);
        },
    });
};
/**NOTE - medicalim end */

/**!SECTION cash in safe and transit teriff start */

window.cashInSafeAndTransit = function (e) {
    var url = $(e).data("url");
    var calculator_id = $("#calculator_id").val();
    var institute_type_id = $("#institute_type_id").val();
    var property_location_id = $("#property_location_id").val();
    var srcc_id = $("#srcc_id").val();
    var building_construction_id = $("#building_construction_id").val();
    var building_construction_roof_id = $(
        "#building_construction_roof_id"
    ).val();
    var yearly_turnover = $("#yearly_turnover").val();

    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
            institute_type_id: institute_type_id,
            property_location_id: property_location_id,
            srcc_id: srcc_id,
            building_construction_id: building_construction_id,
            building_construction_roof_id: building_construction_roof_id,
            yearly_turnover: yearly_turnover,
        },
        dataType: "html",
        success: function (data) {
            $("#addmodalcalculation").html(data);
        },
    });
};

window.cashInTransitTransit = function (e) {
    var url = $(e).data("url");
    var calculator_id = $("#calculator_id").val();
    var institute_type_id = $("#institute_type_id").val();
    var srcc_id = $("#srcc_id").val();
    var yearly_turnover = $("#yearly_turnover").val();
    var armored = document.querySelector('input[name="armored"]:checked').value;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
            institute_type_id: institute_type_id,
            srcc_id: srcc_id,
            yearly_turnover: yearly_turnover,
            armored: armored,
        },
        dataType: "html",
        success: function (data) {
            $("#addmodalcalculation").html(data);
        },
    });
};
window.cashOnCounter = function (e) {
    var url = $(e).data("url");
    var calculator_id = $("#calculator_id").val();
    var institute_type_id = $("#institute_type_id").val();
    var srcc_id = $("#srcc_id").val();
    var building_construction_id = $("#building_construction_id").val();
    var building_construction_roof_id = $(
        "#building_construction_roof_id"
    ).val();
    var yearly_turnover = $("#yearly_turnover").val();

    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
            institute_type_id: institute_type_id,
            srcc_id: srcc_id,
            building_construction_id: building_construction_id,
            building_construction_roof_id: building_construction_roof_id,
            yearly_turnover: yearly_turnover,
        },
        dataType: "html",
        success: function (data) {
            $("#addmodalcalculation").html(data);
        },
    });
};

window.boilerTeriffType = function (e) {
    var birthdate = $("#getBoilerDate").val();
    var dt = new Date();
    if (Number(dt.getFullYear()) - birthdate == 0) {
        var boiler_age = 1;
    } else {
        var boiler_age = Number(dt.getFullYear()) - birthdate;
    }

    $("#calculated_dob").html(boiler_age);

    var total_amount = $("#total_amount").val();
    var SPP = $("#SPP").val();
    var calculator_id = 12;
    var url = $(e).data("url");

    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
            boiler_age: boiler_age,
            total_amount: total_amount,
            spp: SPP,
        },
        dataType: "html",
        success: function (data) {
            $("#addmodalcalculation").html(data);
        },
    });
};

window.personalTeriff = function (e) {
    var url = $(e).data("url");
    var calculator_id = $("#calculator_id").val();
    var occupation_id = $("#occupation_id").val();
    var risk_coverage_id = $("#risk_coverage_id").val();
    var total_amount = $("#total_amount").val();
    var medical_benifit = document.querySelector(
        'input[name="personal_medical_benifit"]:checked'
    ).value;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
            occupation_id: occupation_id,
            risk_coverage_id: risk_coverage_id,
            total_amount: total_amount,
            medical_benifit: medical_benifit,
        },
        dataType: "html",
        success: function (data) {
            $("#addmodalcalculation").html(data);
        },
    });
};

window.flatTeriff = function (e) {
    var url = $(e).data("url");
    var calculator_id = $("#calculator_id").val();
    var district_id = $("#district_id").val();
    var user_visit_country = $("#user_visit_country").val();
    var total_amount = $("#total_amount").val();
    var location_id = $("#property_location_id").val();
    var default_fire = $("#default_fire").val();

    $.ajax({
        type: "POST",
        url: url,
        data: {
            calculator_id: calculator_id,
            district_id: district_id,
            user_visit_country: user_visit_country,
            total_amount: total_amount,
            location_id: location_id,
            default_fire: default_fire,
        },
        dataType: "html",
        success: function (data) {
            $("#addmodalcalculation").html(data);
        },
    });
};
window.closeDialog = function (e) {
    $("#fire-insurence").hide();
    $("body").removeClass("modal-open");
    $("body").css({ overflow: "unset", "padding-right": "unset" });
    $("#fire-details-dialog-back").removeClass("fire-details-dialog-back");
};
window.checkAmountValidity = function () {
    var total_amount = Number($("#total_amount").val());
    var stop_flag = 0;
    $(".additional_coverage_validation").each(function (index) {
        if (stop_flag == 0) {
            if (
                $(this)
                    .find(".additional_coverage_card_active")
                    .hasClass("additional_coverage_card_active")
            ) {
                var message = document.getElementById(
                    "card_name_" + index
                ).innerText;
                var get_amount = Number($(this).find(".a_input").val());
                console.log("ok");

                if (get_amount > total_amount) {
                    stop_flag = 1;

                    $("#fire-insurence").hide();
                    $("#amount_message_" + index).show();
                } else {
                    $("#amount_message_" + index).hide();
                }
            }
        }
    });
};

window.fireCalculation = function (e) {
    var total_amount = Number($("#total_amount").val());
    var stop_flag = 0;
    $(".additional_coverage_validation").each(function (index) {
        // if (stop_flag == 0) {
        if (
            $(this)
                .find(".additional_coverage_card_active")
                .hasClass("additional_coverage_card_active")
        ) {
            var message = document.getElementById(
                "card_name_" + index
            ).innerText;
            var get_amount = $(this).find(".a_input").val();
            if (!get_amount) {
                stop_flag = 1;

                $(this).find(".a_input").css("border", "1px solid red");
                $("#fire-insurence").hide();
                $("#amount_value_message_" + index).show();
                //alert('Please Enter "' + message + '" amount!');
                let message_text = 'Please Enter "' + message + '" amount!';
                toastMixin.fire({
                    icon: "error",
                    animation: true,
                    title: message_text,
                });
            }
        }
        // }
    });
    $(".additional_coverage_validation").each(function (index) {
        if (stop_flag == 0) {
            if (
                $(this)
                    .find(".additional_coverage_card_active")
                    .hasClass("additional_coverage_card_active")
            ) {
                var message = document.getElementById(
                    "card_name_" + index
                ).innerText;
                var get_amount = Number($(this).find(".a_input").val());

                if (get_amount > total_amount) {
                    stop_flag = 1;

                    $("#fire-insurence").hide();
                    alert(
                        message +
                            " amount is grater than total sum insured is not applicable!"
                    );
                }
            }
        }
    });

    // return;
    var url = $(e).data("url");
    var calculator_id = $("#calculator_id").val();
    var property_location_id = $("#property_location_id").val();
    var property_occupation_id = $("#property_occupation_id").val();
    var member_association_id = $("#member_association_id").val();
    var interest_type_id = $("#interest_type_id").val();
    var building_construction_id = $("#building_construction_id").val();
    var building_construction_roof_id = $(
        "#building_construction_roof_id"
    ).val();
    if (stop_flag == 0) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                calculator_id: calculator_id,
                property_location_id: property_location_id,
                property_occupation_id: property_occupation_id,
                member_association_id: member_association_id,
                interest_type_id: interest_type_id,
                building_construction_id: building_construction_id,
                building_construction_roof_id: building_construction_roof_id,
                total_amount: total_amount,
                coverage: add(),
            },
            dataType: "html",
            success: function (data) {
                $("body").addClass("modal-open");
                $("body").css({ overflow: "hidden", "padding-right": "17px" });
                $("#fire-insurence").show();
                $("#fire-details-dialog-back").addClass(
                    "fire-details-dialog-back"
                );
                $("#addmodalcalculation").html(data);
            },
        });
    } else {
        $("#fire-insurence").hide();
    }
};
window.peoplePersonalAccident = function (e, id) {
    var url = $(e).data("url");
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id: id,
        },
        dataType: "html",
        success: function (data) {
            $("#peoplePersonalAccident").html(data);
        },
    });
};
/**!SECTION cash in safe and transit teriff end */
window.calculated_people = function (e) {
    var people = $(e).val();
    var url = $(e).data("url");
    if (people > 0) {
        var net_premium = $("#g_roup_net_premium").val();
        var vat = $("#g_roup_vat").val();
        var total_amount = $("#g_roup_total_amount").val();
        var total_vat = parseInt((people * net_premium * 15) / 100);

        $(".group_net_premium").html(people * net_premium);
        $(".group_vat").html(total_vat);
        $(".group_total").html(people * net_premium + total_vat);

        $("#group_net_premium").val(people * net_premium);
        $("#group_vat").val(total_vat);
        $("#group_total_amount").val(people * net_premium + total_vat);

        $.ajax({
            type: "POST",
            url: url,
            data: {
                people: people,
            },
            dataType: "html",
            success: function (data) {},
        });
    }
};
