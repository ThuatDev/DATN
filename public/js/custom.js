$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#logout").click(function () {
        Swal.fire({
            title: "Đăng Xuất",
            text: "Bạn có chắc muốn đăng xuất khỏi hệ thống!",
            type: "question",
            confirmButtonColor: "#d33",
            confirmButtonText: "Đăng Xuất",
        }).then((result) => {
            if (result.value) document.getElementById("logout-form").submit();
        });
    });

    $("#mobile-logout").click(function () {
        document.getElementById("logout-form").submit();
    });

    $("#trigger-mobile").click(function () {
        $(".mobile-main-menu").addClass("active");
        $(".backdrop__body-backdrop___1rvky").addClass("active");
    });

    $(".backdrop__body-backdrop___1rvky").click(function () {
        $(".mobile-main-menu").removeClass("active");
        $(".backdrop__body-backdrop___1rvky").removeClass("active");
    });

    $("#close-trigger-mobile").click(function () {
        $(".mobile-main-menu").removeClass("active");
        $(".backdrop__body-backdrop___1rvky").removeClass("active");
    });

    $("#action-collapse").click(function () {
        if ($(this).find("i.fas").hasClass("fa-plus")) {
            $(this).find("i.fas").removeClass("fa-plus");
            $(this).find("i.fas").addClass("fa-minus");
        } else if ($(this).find("i.fas").hasClass("fa-minus")) {
            $(this).find("i.fas").removeClass("fa-minus");
            $(this).find("i.fas").addClass("fa-plus");
        }
    });
});
formatMoney = function (a, b) {
    console.log(typeof a);
    function f(a, b, c, d) {
        if (
            ("undefined" == typeof b && (b = 2),
            "undefined" == typeof c && (c = "."),
            "undefined" == typeof d && (d = ","),
            "number" != typeof a || isNaN(a) || !isFinite(a))
        )
            return 0;
        var a = a.toFixed(b).toString(), // 123.456 -> 123.46
            b = a.split("."),
            c = b[0],
            d = b.length > 1 ? "." + b[1] : "",
            e = /(\d+)(\d{3})/;
        var e = a.split("."),
            f = e[0].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1" + c),
            g = e[1] ? d + e[1] : "";
        return f + g;
    }
    "string" == typeof a &&
        ((a = a.replace(/\./g, "")), (a = a.replace(/\,/g, "")));
    var c = "",
        d = /\{\{\s*(\w+)\s*\}\}/,
        e = b || this.money_format;
    switch (e.match(d)[1]) {
        case "amount":
            c = f(a, 2);
            break;
        case "amount_no_decimals":
            c = f(a, 0);
            break;
        case "amount_with_comma_separator":
            c = f(a, 2, ".", ",");
            break;
        case "amount_no_decimals_with_comma_separator":
            c = f(a, 0, ".", ",");
    }
    return e.replace(d, c);
};
