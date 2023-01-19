$(function () {
    const add_cart_button = $("#add_cart_button"),
        app_url = $("#app_url").val(),
        role_id = $("#role_id").val(),
        language = $("#language").val(),
        action_permission_selected_input = $(".action_permission_selected"),
        permission_selected_input = $(".permission_selected");
    let permissions = [],
        old_permissions = [];

    $(document).ready(function () {
        roles();
        old_permissions_selected();
        permissions_selected();
    });

    function Action(id, permission_id, key) {
        this.id = id;
        this.permission_id = permission_id;
        this.key = key;
    }

    function Permission(id, actions) {
        this.id = id;
        this.actions = actions;
    }

    function Per(id) {
        this.id = id
    }

    function old_permissions_selected() {
        $(".kt_modal_edit_role").click(function () {
            let role_id = $(this).data("id");
            $('#kt_modal_update_role_form input[type=checkbox]').each(function () {
                if ($(this).prop("checked")) {
                    let permission_id = $(this).data("id"),
                        action_id = $(this).val().trim(),
                        key = action_id + "" + permission_id,
                        action = new Action(action_id, permission_id, key),
                        old_action = permissions.filter(x => x.key === key);
                    if (old_action.length === 0)
                        permissions.push(action);
                    else {
                        permissions = permissions.filter(x => x.key !== key);
                    }
                }
            });
            if (permissions.length === 0 && old_permissions.length > 0)
                permissions = old_permissions;
        })
    }

    function permissions_selected() {
        action_permission_selected_input.click(function () {
            let permission_id = $(this).data("id"),
                action_id = $(this).val().trim(),
                key = action_id + "" + permission_id,
                action = new Action(action_id, permission_id, key),
                old_action = permissions.filter(x => x.key === key);
            if (action_id)
                if (old_action.length === 0)
                    permissions.push(action);
                else {
                    permissions = permissions.filter(x => x.key !== key);
                }
        });
    }

    function roles() {
        "use strict";
        var KTUsersUpdateRole = function () {
            const t = document.getElementById("kt_modal_update_role"),
                e = t.querySelector("#kt_modal_update_role_form"),
                n = new bootstrap.Modal(t);
            return {
                init: function () {
                    (() => {
                        var o = FormValidation.formValidation(e, {
                            fields: {
                                user_management_view: {
                                    validators: {
                                        notEmpty: {
                                            message: language === "en" ? "Role permission select is required" : "تحديد الإذن مطلوب",
                                        }
                                    }
                                },role_name: {
                                    validators: {
                                        notEmpty: {
                                            message: language === "en" ? "This filed is required" : "هذا الحقل مطلوب",
                                        }
                                    }
                                },
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
                        t.querySelector('[data-kt-roles-modal-action="close"]').addEventListener("click", (t => {
                            t.preventDefault(), Swal.fire({
                                text: language === "en" ? "Are you sure you would like to close?" : "هل أنت متأكد أنك تريد الإغلاق؟",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: language === "en" ? "Yes, close it!" : "نعم ، أغلقه!",
                                cancelButtonText: language === "en" ? "No, return" : "لا تراجع",
                                customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
                            }).then((function (t) {
                                (e.reset(), n.hide())
                            }))
                        })), t.querySelector('[data-kt-roles-modal-action="cancel"]').addEventListener("click", (t => {
                            t.preventDefault(), Swal.fire({
                                text: language === "en" ? "Are you sure you would like to cancel?" : "هل أنت متأكد أنك تريد الإلغاء؟",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: language === "en" ? "Yes, cancel it!" : "نعم ، قم بالإلغاء!",
                                cancelButtonText: language === "en" ? "No, return" : "لا تراجع",
                                customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
                            }).then((function (t) {
                                t.value ? (e.reset(), n.hide()) : "cancel" === t.dismiss && Swal.fire({
                                    text: language === "en" ? "Your form has not been cancelled!." : "لم يتم إلغاء النموذج الخاص بك !.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: language === "en" ? "Ok, got it!" : "حسنًا ، فهمت!",
                                    customClass: {confirmButton: "btn btn-primary"}
                                })
                            }))
                        }));
                        const r = t.querySelector('[data-kt-roles-modal-action="submit"]');
                        r.addEventListener("click", (function (t) {
                            old_permissions = permissions;
                            let permis = [];
                            let per_id = [];
                            $.each(permissions, function (i) {
                                let old_per_id = per_id.filter(x => x.id === permissions[i].permission_id);
                                if (old_per_id.length === 0) {
                                    let pp = new Per(permissions[i].permission_id);
                                    per_id.push(pp)
                                    let op_pe = permissions.filter(x => x.permission_id === permissions[i].permission_id);
                                    let actions = [];
                                    $.each(op_pe, function (j) {
                                        actions.push(op_pe[j].id);
                                    });
                                    let perm = new Permission(permissions[i].permission_id, actions);
                                    permis.push(perm);
                                }
                            });
                            t.preventDefault(), o && o.validate().then((function (t) {
                                "Valid" == t ?
                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        type: "POST",
                                        url: app_url + "/" + language + "/roles/update/" + role_id,
                                        data: {
                                            name: $("#permission_name_update").val(),
                                            permissions: permis,
                                        },
                                        success: function (response) {
                                            if ($.isEmptyObject(response.error)) {
                                                (r.setAttribute("data-kt-indicator", "on"), r.disabled = !0, setTimeout((function () {
                                                    r.removeAttribute("data-kt-indicator"), r.disabled = !1,
                                                        Swal.fire({
                                                            text: language === "en" ? "Form has been successfully submitted!" : "تم تقديم النموذج بنجاح!",
                                                            icon: "success",
                                                            buttonsStyling: !1,
                                                            confirmButtonText: language === "en" ? "Ok, got it!" : "حسنًا ، فهمت!",
                                                            customClass: {confirmButton: "btn btn-primary"}
                                                        }).then((function (t) {
                                                            t.isConfirmed && n.hide();
                                                            if (t.isConfirmed) {
                                                                window.location.href = "/roles/show/" + role_id;
                                                            }
                                                        }))
                                                }), 2e3));
                                                // window.location.reload(true);
                                            } else {
                                                Swal.fire({
                                                    text: language === "en" ? "Sorry, looks like there are some errors detected, please try again." : "معذرة ، يبدو أنه تم اكتشاف بعض الأخطاء ، يرجى المحاولة مرة أخرى.",
                                                    icon: "error",
                                                    buttonsStyling: !1,
                                                    confirmButtonText: language === "en" ? "Ok, got it!" : "حسنًا ، فهمت!",
                                                    customClass: {confirmButton: "btn btn-primary"}
                                                })
                                                print_error(response.error);
                                            }
                                        }
                                    }) : Swal.fire({
                                        text: language === "en" ? "Sorry, looks like there are some errors detected, please try again." : "معذرة ، يبدو أنه تم اكتشاف بعض الأخطاء ، يرجى المحاولة مرة أخرى.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: language === "en" ? "Ok, got it!" : "حسنًا ، فهمت!",
                                        customClass: {confirmButton: "btn btn-primary"}
                                    })
                            }))
                        }))
                    })(), (() => {
                        const t = e.querySelector("#kt_roles_select_all"), n = e.querySelectorAll('[type="checkbox"]');
                        t.addEventListener("change", (t => {
                            if (t.target.checked) {
                                permissions = [];
                                n.forEach((e => {
                                    e.checked = t.target.checked
                                    let permission_id = e.getAttribute("data-id"),
                                        action_id = e.value.trim(),
                                        key = action_id + "" + permission_id,
                                        action = new Action(action_id, permission_id, key),
                                        old_action = permissions.filter(x => x.key === key);
                                    if (action_id)
                                        if (old_action.length === 0)
                                            permissions.push(action);
                                        else {
                                            permissions = permissions.filter(x => x.key !== key);
                                        }
                                }))
                            } else {
                                permissions = [];
                                n.forEach((e => {
                                    e.checked = t.target.checked
                                }))
                            }
                        }))
                    })()
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function () {
            KTUsersUpdateRole.init()
        }));
    }

    function print_error(errors) {
        $.each(errors, function (index, val) {
            $("#" + index + "_update_error").html(val);
            $("#" + index).focus();
        });
    }
});
