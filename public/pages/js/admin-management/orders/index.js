$(function () {
    const
        language = $('#language').val(),
        app_url = $('#app_url').val();
    let id = 0, core_name = "";
    $(document).ready(function () {
        "use strict";
        get_forms();
    });


    function get_forms() {
        var KTAppEcommerceCategories = function () {
            var t, e, n = () => {
            };
            return {
                init: function () {
                    (t = document.querySelector("#kt_orders_table")) && ((e = $(t).DataTable({
                        searchable: true,
                        ajax: {
                            "url": app_url + "/" + language + "/orders",
                            "type": 'GET',
                        },
                        columns: [
                            {
                                data: 'order_number',
                                name: 'order_number'
                            },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'phone_number',
                                name: 'phone_number'
                            },
                            {
                                data: 'email',
                                name: 'email'
                            },
                            {
                                data: 'governorate',
                                name: 'governorate'
                            },
                            {
                                data: 'city',
                                name: 'city'
                            },
                            {
                                data: 'pieces_number',
                                name: 'pieces_number'
                            },
                            {
                                data: 'avenue',
                                name: 'avenue'
                            },
                            {
                                data: 'street',
                                name: 'street'
                            },
                            {
                                data: 'building_number',
                                name: 'building_number'
                            },
                            {
                                data: 'floor',
                                name: 'floor'
                            },
                            {
                                data: 'status',
                                name: 'status'
                            },
                            {
                                data: 'payment_status',
                                name: 'payment_status'
                            },


                        ], language: {
                            url: language === "en" ? "//cdn.datatables.net/plug-ins/1.13.1/i18n/en-GB.json" : "//cdn.datatables.net/plug-ins/1.13.1/i18n/ar.json",
                        },
                    })).on("draw", (function () {
                        n()
                    })), document.querySelector('[data-kt-ecommerce-forms-filter="search"]').addEventListener("keyup", (function (t) {
                        e.search(t.target.value).draw()
                    })),
                        n())
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function () {
            KTAppEcommerceCategories.init()
        }));
    }
});
