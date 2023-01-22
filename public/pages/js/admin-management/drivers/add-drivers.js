$(function () {
    const app_url = $('#app_url').val(),
        language = $('#language').val();

    $(document).ready(function () {
        create_news();
    });

    function create_news() {
        "use strict";
        var KTUsersAddPermission = function () {
            const t = document.getElementById("kt_modal_add_driver"),
                e = t.querySelector("#kt_modal_add_driver_form"),
                n = new bootstrap.Modal(t);
            return {
                init: function () {
                    (() => {
                        var o = FormValidation.formValidation(e, {
                            fields: {
                                full_name: {validators: {notEmpty: {message: "Name is required"}}},
                                email: {validators: {notEmpty: {message: "Email is required"}}},
                                phone_number: {validators: {notEmpty: {message: "Phone Number is required"}}},
                                address: {validators: {notEmpty: {message: "Address is required"}}},

                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger,
                                bootstrap: new FormValidation.plugins.Bootstrap5({
                                    rowSelector: ".fv-row",
                                    eleInvalidClass: "",
                                    eleValidClass: ""
                                })
                            }
                        });
                        t.querySelector('[data-kt-permissions-modal-action="close"]').addEventListener("click", (t => {
                            t.preventDefault(), Swal.fire({
                                text: language === "en" ? "Are you sure you would like to close?" : "هل أنت متأكد أنك تريد الإغلاق؟",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: language === "en" ? "Yes, close it!" : "نعم ، أغلقه!",
                                cancelButtonText: language === "en" ? "No, return" : "لا رجوع",
                                customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
                            }).then((function (t) {
                                t.value && $("#spoken_languages").val(null).trigger("change") && $(".errors").html("") && $("#file-chosen-input").html(language === "en" ? "No file chosen" : " لم يتم اختيار ملف") && $("#file-chosensss").html(language === "en" ? "No file chosen" : " لم يتم اختيار ملف") && n.hide()
                            }))
                        })), t.querySelector('[data-kt-driver-modal-action="cancel"]').addEventListener("click", (t => {
                            t.preventDefault(), Swal.fire({
                                text: language === "en" ? "Are you sure you would like to cancel?" : "هل أنت متأكد أنك تريد الإلغاء؟",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: language === "en" ? "Yes, cancel it!" : "نعم ، قم بإلغائها!",
                                cancelButtonText: language === "en" ? "No, return" : "لا رجوع",
                                customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
                            }).then((function (t) {
                                t.value ? (e.reset(),$("#spoken_languages").val(null).trigger("change"), $(".errors").html("") ,$("#file-chosen-input").html(language === "en" ? "No file chosen" : " لم يتم اختيار ملف"),$("#file-chosensss").html(language === "en" ? "No file chosen" : " لم يتم اختيار ملف"), n.hide()) : "cancel" === t.dismiss && Swal.fire({
                                    text: language === "en" ? "Your form has not been cancelled!." : "لم يتم إلغاء النموذج الخاص بك !.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: language === "en" ? "Ok, got it!" : "حسنًا ، فهمت!",
                                    customClass: {confirmButton: "btn btn-primary"}
                                })
                            }))
                        }));
                        const i = t.querySelector('[data-kt-permissions-modal-action="submit"]');
                        i.addEventListener("click", (function (t) {
                            $(':input[type="submit"]').prop('disabled', true);
                            $(".errors").html("");
                            var formData = new FormData(document.getElementById("kt_modal_add_driver_form"));

                            t.preventDefault(), o && o.validate().then((function (t) {
                                "Valid" == t ? $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        type: "POST",
                                        url: app_url + "/" + language +"/drivers/store",
                                        data: formData,
                                        processData: false,  // tell jQuery not to process the data
                                        contentType: false,
                                        success: function (response) {
                                            if ($.isEmptyObject(response.error)) {
                                                (i.setAttribute("data-kt-indicator", "on"), i.disabled = !0, setTimeout((function () {
                                                    i.removeAttribute("data-kt-indicator"), i.disabled = !1,
                                                        Swal.fire({
                                                            text: language === "en" ? "Form has been successfully submitted!" : "تم تقديم النموذج بنجاح!",
                                                            icon: "success",
                                                            buttonsStyling: !1,
                                                            confirmButtonText: language === "en" ? "Ok, got it!" : "حسنًا ، فهمت!",
                                                            customClass: {confirmButton: "btn btn-primary"}
                                                        }).then((function (t) {
                                                            t.isConfirmed && n.hide()
                                                            $(':input[type="submit"]').prop('disabled', false);
                                                        }))
                                                }), 2e3));
                                                $("input").val("");
                                                $("textarea").val("");
                                                $(".errors").html("");
                                                /*table.DataTable().ajax.reload();*/
                                                $('#kt_driver_table').DataTable().ajax.reload();

                                            } else {
                                                Swal.fire({
                                                    text: language === "en" ? "Sorry, looks like there are some errors detected, please try again." : "معذرة ، يبدو أنه تم اكتشاف بعض الأخطاء ، يرجى المحاولة مرة أخرى.",
                                                    icon: "error",
                                                    buttonsStyling: !1,
                                                    confirmButtonText: language === "en" ? "Ok, got it!" : "حسنًا ، فهمت!",
                                                    customClass: {confirmButton: "btn btn-primary"}
                                                })
                                                $(':input[type="submit"]').prop('disabled', false);
                                                $(".errors").html("");
                                                print_error(response.error);
                                            }
                                        }
                                    })
                                    : Swal.fire({
                                        text: language === "en" ? "Sorry, looks like there are some errors detected, please try again." : "معذرة ، يبدو أنه تم اكتشاف بعض الأخطاء ، يرجى المحاولة مرة أخرى.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: language === "en" ? "Ok, got it!" : "حسنًا ، فهمت!",
                                        customClass: {confirmButton: "btn btn-primary"}
                                    }).then((function (t) {
                                        $(':input[type="submit"]').prop('disabled', false);
                                    }))
                            }))
                        }))
                    })()
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function () {
            KTUsersAddPermission.init()
        }));
    }

    function print_error(errors) {
        $.each(errors, function (index, val) {
            $("#" + index + "_error").html(val);
            $("#" + index).focus();
        });
    }

});
