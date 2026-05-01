"use strict";
var KTUsersList = function () {
    var e, t, n, r, o = document.getElementById("kt_table_users"), c = () => {
        o.querySelectorAll('[data-kt-users-table-filter="delete_row"]').forEach((t => {
            t.addEventListener("click", (function (t) {
                t.preventDefault();
                const n = t.target.closest("tr"), r = n.querySelectorAll("td")[1].querySelectorAll("a")[1].innerText;
                Swal.fire({
                    text: "Are you sure you want to delete " + r + "?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((function (t) {
                    t.value ? Swal.fire({
                        text: "You have deleted " + r + "!.",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {confirmButton: "btn fw-bold btn-primary"}
                    }).then((function () {
                        e.row($(n)).remove().draw()
                    })).then((function () {
                        a()
                    })) : "cancel" === t.dismiss && Swal.fire({
                        text: customerName + " was not deleted.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {confirmButton: "btn fw-bold btn-primary"}
                    })
                }))
            }))
        }))
    }, l = () => {
        const c = o.querySelectorAll('[type="checkbox"]');
        t = document.querySelector('[data-kt-user-table-toolbar="base"]'), n = document.querySelector('[data-kt-user-table-toolbar="selected"]'), r = document.querySelector('[data-kt-user-table-select="selected_count"]');
        const s = document.querySelector('[data-kt-user-table-select="delete_selected"]');
        c.forEach((e => {
            e.addEventListener("click", (function () {
                setTimeout((function () {
                    a()
                }), 50)
            }))
        })), s.addEventListener("click", (function () {
            Swal.fire({
                text: "Are you sure you want to delete selected customers?",
                icon: "warning",
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((function (t) {
                t.value ? Swal.fire({
                    text: "You have deleted all selected customers!.",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {confirmButton: "btn fw-bold btn-primary"}
                }).then((function () {
                    var ids=[];
                    c.forEach((t => {
                        // console.log($(this));
                        // console.log(t.value);
                        if (t.checked){
                            ids.push(t.value);
                        }

                        t.checked && e.row($(t.closest("tbody tr"))).remove().draw()
                    }));
                    console.log(ids);
                    $.ajax({
                        url:hostUrl+'admin/delete-users',
                        data:{ids:ids},
                        success:function(data){
                            console.log(data);
                            toastr.success(data.message);
                        },
                        error:function(error){
                            toastr.error(error.responseJSON.message);
                        }
                    })

                    o.querySelectorAll('[type="checkbox"]')[0].checked = !1
                })).then((function () {
                    a(), l()
                })) : "cancel" === t.dismiss && Swal.fire({
                    text: "Selected customers was not deleted.",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {confirmButton: "btn fw-bold btn-primary"}
                })
            }))
        }))
    };
    const a = () => {
        const e = o.querySelectorAll('tbody [type="checkbox"]');
        let c = !1, l = 0;
        e.forEach((e => {
            e.checked && (c = !0, l++)
        })), c ? (r.innerHTML = l, t.classList.add("d-none"), n.classList.remove("d-none")) : (t.classList.remove("d-none"), n.classList.add("d-none"))
    };
    return {
        init: function () {
            o && (o.querySelectorAll("tbody tr").forEach((e => {
                const t = e.querySelectorAll("td"), n = t[3].innerText.toLowerCase();
                let r = 0, o = "minutes";
                n.includes("yesterday") ? (r = 1, o = "days") : n.includes("mins") ? (r = parseInt(n.replace(/\D/g, "")), o = "minutes") : n.includes("hours") ? (r = parseInt(n.replace(/\D/g, "")), o = "hours") : n.includes("days") ? (r = parseInt(n.replace(/\D/g, "")), o = "days") : n.includes("weeks") && (r = parseInt(n.replace(/\D/g, "")), o = "weeks");
                const c = moment().subtract(r, o).format();
                t[3].setAttribute("data-order", c);
                const l = moment(t[5].innerHTML, "DD MMM YYYY, LT").format();
                t[5].setAttribute("data-order", l)
            })), (e = $(o).DataTable({
                info: !1,
                ajax: {
                    "url": hostUrl+'user/fetch-users',
                    "type": "GET",
                    "data": function ( d ) {
                        d.city=$('.city').val();
                        d.type='user';
                        // d.space_id=$('.parking-spot').val();
                        // d.daterange=$('.daterange').val();
                        return d;
                    }
                },
                processing: true,
                serverSide: true,
                searchDelay:500,
                selectable:true,
                columns:[
                    {data:'id',render:function(data,row,full){
                            return '<div class="form-check form-check-sm form-check-custom form-check-solid">\n' +
                                '                                        <input class="form-check-input" type="checkbox" value="'+data+'" />\n' +
                                '                                    </div>';
                        }},
                    {data:'name',render:function(data,row,full){
                            console.log(full);
                            let myHtml='<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">\n' +
                                '                                        <a href="/admin/user/profile/' + full.id + '">\n' +
                                '                                            <div class="symbol-label">\n' +
                                '                                                <img src="'+full.image+'" alt="Emma Smith" class="w-100" />\n' +
                                '                                            </div>\n' +
                                '                                        </a>\n' +
                                '                                    </div>\n' +
                                '                                    <div class="d-flex flex-column">\n' +
                                '                                        <a href="/admin/user/profile/' + full.id + '" class="text-gray-800 text-hover-primary mb-1">'+full.name+'</a>\n' +
                                '                                        <span>'+full.email+'</span>\n' +
                                '                                    </div>';
                            return myHtml;
                        }},
                    {data:'heard_about'},

                ]
            })).on("draw", (function () {
                l(), c(), a()
            })), l(), document.querySelector('[data-kt-user-table-filter="search"]').addEventListener("keyup", (function (t) {
                e.search(t.target.value).draw()
            })), document.querySelector('[data-kt-user-table-filter="reset"]').addEventListener("click", (function () {
                document.querySelector('[data-kt-user-table-filter="form"]').querySelectorAll("select").forEach((e => {
                    $(e).val("").trigger("change")
                })), e.search("").draw()
            })), c(), (() => {
                const t = document.querySelector('[data-kt-user-table-filter="form"]'),
                    n = t.querySelector('[data-kt-user-table-filter="filter"]'), r = t.querySelectorAll("select");
                n.addEventListener("click", (function () {
                    var t = "";
                    r.forEach(((e, n) => {
                        e.value && "" !== e.value && (0 !== n && (t += " "), t += e.value)
                    })), e.search(t).draw()
                }))
            })())
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTUsersList.init()
}));
