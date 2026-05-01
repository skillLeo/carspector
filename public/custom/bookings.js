"use strict";
var AdminBookingsList = function () {
    var findOne = function (primary, fallback) {
        return document.querySelector(primary) || (fallback ? document.querySelector(fallback) : null);
    };
    var findAll = function (root, primary, fallback) {
        var items = root.querySelectorAll(primary);
        return items.length || !fallback ? items : root.querySelectorAll(fallback);
    };
    var e, t, n, r, o = document.getElementById("kt_table_users"), c = () => {
        findAll(o, '[data-admin-table-filter="delete_row"]', '[data-kt-users-table-filter="delete_row"]').forEach((t => {
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
                        cancelButton: "btn fw-bold btn-light"
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
        t = findOne('[data-admin-table-toolbar="base"]', '[data-kt-user-table-toolbar="base"]'), n = findOne('[data-admin-table-toolbar="selected"]', '[data-kt-user-table-toolbar="selected"]'), r = findOne('[data-admin-table-select="selected_count"]', '[data-kt-user-table-select="selected_count"]');
        const s = findOne('[data-admin-table-select="delete_selected"]', '[data-kt-user-table-select="delete_selected"]');
        c.forEach((e => {
            e.addEventListener("click", (function () {
                setTimeout((function () {
                    a()
                }), 50)
            }))
        }));
        if (!s) {
            return;
        }
        s.addEventListener("click", (function () {
            Swal.fire({
                text: "Are you sure you want to delete selected customers?",
                icon: "warning",
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-light"
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
        if (!t || !n || !r) {
            return;
        }
        const e = o.querySelectorAll('tbody [type="checkbox"]');
        let c = !1, l = 0;
        e.forEach((e => {
            e.checked && (c = !0, l++)
        })), c ? (r.innerHTML = l, t.classList.add("d-none"), n.classList.remove("d-none")) : (t.classList.remove("d-none"), n.classList.add("d-none"))
    };
    return {
        init: function () {
            if (!o) {
                return;
            }

            o.querySelectorAll("tbody tr").forEach((e => {
                const t = e.querySelectorAll("td"), n = t[3].innerText.toLowerCase();
                let r = 0, o = "minutes";
                n.includes("yesterday") ? (r = 1, o = "days") : n.includes("mins") ? (r = parseInt(n.replace(/\D/g, "")), o = "minutes") : n.includes("hours") ? (r = parseInt(n.replace(/\D/g, "")), o = "hours") : n.includes("days") ? (r = parseInt(n.replace(/\D/g, "")), o = "days") : n.includes("weeks") && (r = parseInt(n.replace(/\D/g, "")), o = "weeks");
                const c = moment().subtract(r, o).format();
                t[3].setAttribute("data-order", c);
                const l = moment(t[5].innerHTML, "DD MMM YYYY, LT").format();
                t[5].setAttribute("data-order", l)
            }));
            e = $(o).DataTable({
                info: !1,
                order: [], // use server-side default (latest first)
                // Set default page length and menu options
                pageLength: 15,
                lengthMenu: [[15, 25, 50, 100, -1], [15, 25, 50, 100, 'All']],
                responsive: false,
                scrollX: true,
                autoWidth: false,
                columnDefs: [
                    { targets: [0, 1, 2, 3, 4, 5, 9, 10, 11], className: 'align-middle text-nowrap' },
                    { targets: [6, 7, 8], className: 'align-middle text-column' },
                    { targets: -1, className: 'text-end text-nowrap align-middle', orderable: false, searchable: false, width: '430px' }
                ],
                ajax: {
                    "url": hostUrl+'admin/fetch-bookings',
                    "type": "GET",
                    "data": function ( d ) {
                        d.city=$('.city').val();
                        d.date_range=$('.date_range').val();
                        d.user_id=$('#filter_user_select').val();
                        d.examiner_email=$('#filter_examiner_email').val();
                        d.status=$('#filter_status').val();
                        d.order_type=$('#filter_order_type').val();
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
                    // {data:'id',render:function(data,row,full){
                    //         // return '<div class="form-check form-check-sm form-check-custom form-check-solid">\n' +
                    //         //     '                                        <input class="form-check-input" type="checkbox" value="'+data+'" />\n' +
                    //         //     '                                    </div>';
                    //         return "";
                    //     }},
                    {data:'admin_order_date_display', name:'admin_order_date', width:'130px'},
                    {data:'order_number', name:'orderno', width:'150px'},
                    // {data:'examiner.name','name':'examiner.first_name',render:function(data,row,full){
                    //         console.log(full);
                    //       if (full.examiner){
                    //           let myHtml='<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">\n' +
                    //               '                                        <a href="/admin/user/profile/'+full.examiner.id+'">\n' +
                    //               '                                            <div class="symbol-label">\n' +
                    //               '                                                <img src="'+full.examiner.image+'" alt="Emma Smith" class="w-100" />\n' +
                    //               '                                            </div>\n' +
                    //               '                                        </a>\n' +
                    //               '                                    </div>\n' +
                    //               '                                    <div class="d-flex flex-column">\n' +
                    //               '                                        <a href="/admin/user/profile/'+full.examiner.id+'" class="text-gray-800 text-hover-primary mb-1">'+full.examiner.name+'</a>\n' +
                    //               '                                        <span>'+full.examiner.email+'</span>\n' +
                    //               '                                    </div>';
                    //           return myHtml;
                    //       }else {
                    //           return '<a href="#" class="btn-assign-examiner" data-id="'+full.id+'" data-bs-toggle="modal" data-bs-target="#assign_examiner">No Examiner</a>';
                    //       }
                    //     }},
                    {data:'price_display', name:'price', width:'130px'},
                    {data:'order_type_display', name:'order_type', width:'170px'},
                    {data:'vehicle_type', name:'vehicle_type', width:'155px'},
                    {data:'status', name:'admin_status', width:'150px'},
                    {data:'vehicle_display', name:'vehicle_make_model', width:'220px'},
                    {data:'customer_display', name:'customer_name', width:'240px'},
                    {data:'examiner_display', name:'examiner_name', width:'190px'},
                    {data:'completed_at_display', name:'completed_at', width:'150px'},
                    {data:'paid_at_display', name:'paid_at', width:'150px'},
                    {data:'actions', width:'430px'},
                    // {data:'document_in_english'},
                ]
            }).on("draw", (function () {
                l(), c(), a()
                // Initialize tooltips for elements that have title attributes
                // Note: Action buttons intentionally have no titles to avoid tooltips
                if (window.bootstrap) {
                    document.querySelectorAll('#kt_table_users [title]')
                        .forEach(function (el) { try { new bootstrap.Tooltip(el); } catch (e) {} });
                }
                // Ensure actions column is right-aligned and stays on one line.
                $('#kt_table_users tbody tr').each(function(){
                    var $cells = $(this).find('td');
                    var $actions = $cells.eq($cells.length-1); // actions column
                    $actions.addClass('text-end text-nowrap align-middle');
                });
                // Ensure all columns are visible on desktop, let Responsive collapse on small screens

                // Add confirmation on send buttons (including send-customer-pdf)
                $(document).off('click.btnsend','.btn-send, .js-send, .send-customer-pdf')
                    .on('click.btnsend','.btn-send, .js-send, .send-customer-pdf', function(e){
                    if ($(this).data('busy')) { e.preventDefault(); return; }
                    e.preventDefault();
                    $(this).data('busy', true);
                    var href = $(this).attr('href') || $(this).data('href');
                    var $form = $(this).closest('form');
                    var isSendCustomerPdf = $(this).hasClass('send-customer-pdf');

                    // Build Swal config; add checkbox for send-customer-pdf only
                    var swalCfg = {
                        title: 'Send PDF to customer?',
                        text: 'We will email the customer with the examination PDF. Continue?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, send',
                        cancelButtonText: 'Cancel',
                        customClass: { confirmButton:'btn btn-primary', cancelButton:'btn btn-light' },
                        buttonsStyling: false
                    };

                    if (isSendCustomerPdf) {
                        // Inject options for send-customer-pdf flow
                        swalCfg.html = '<div class="d-flex flex-column gap-3 mt-3">\
                            <div class="form-check text-start d-flex justify-content-center align-items-center">\
                                <input class="form-check-input" type="checkbox" value="1" id="swal-no-upsell">\
                                <label class="form-check-label ms-2" for="swal-no-upsell">Partner</label>\
                            </div>\
                            <div class="form-check text-start d-flex justify-content-center align-items-center">\
                                <input class="form-check-input" type="checkbox" value="1" id="swal-sent-review">\
                                <label class="form-check-label ms-2" for="swal-sent-review">Bewertung</label>\
                            </div>\
                        </div>';
                        // Prefer html over text if present
                        delete swalCfg.text;
                    }

                    Swal.fire(swalCfg).then(function(res){
                        if(res.isConfirmed){
                            if (href) {
                                if (isSendCustomerPdf) {
                                    var noUpsell = $('#swal-no-upsell').is(':checked');
                                    if (noUpsell) {
                                        // Append query param gracefully
                                        try {
                                            var u = new URL(href, window.location.origin);
                                            u.searchParams.set('no_upsell', '1');
                                            href = u.pathname + u.search + u.hash;
                                        } catch (err) {
                                            href += (href.indexOf('?') === -1 ? '?' : '&') + 'no_upsell=1';
                                        }
                                    }
                                    var sentReview = $('#swal-sent-review').is(':checked');
                                    if (sentReview) {
                                        try {
                                            var u2 = new URL(href, window.location.origin);
                                            u2.searchParams.set('sent_review', '1');
                                            href = u2.pathname + u2.search + u2.hash;
                                        } catch (err2) {
                                            href += (href.indexOf('?') === -1 ? '?' : '&') + 'sent_review=1';
                                        }
                                    }
                                }
                                window.location = href;
                            }
                            else if ($form && $form.length) {
                                if (isSendCustomerPdf) {
                                    var noUpsell2 = $('#swal-no-upsell').is(':checked');
                                    if (noUpsell2) {
                                        $('<input>', { type:'hidden', name:'no_upsell', value:'1' }).appendTo($form);
                                    }
                                    var sentReview2 = $('#swal-sent-review').is(':checked');
                                    if (sentReview2) {
                                        $('<input>', { type:'hidden', name:'sent_review', value:'1' }).appendTo($form);
                                    }
                                }
                                $form.get(0).submit();
                            }
                        } else {
                            $('.send-customer-pdf').data('busy', false);
                        }
                    });
                });

                // Delete confirmation handled globally in layout (mainadmin.blade.php)

                // Confirmation for status change badges/links
                $(document).off('click.statuschg', '#kt_table_users a[href*="/booking-status/"]')
                    .on('click.statuschg', '#kt_table_users a[href*="/booking-status/"]', function(e){
                        e.preventDefault();
                        var href = $(this).attr('href') || '';
                        try {
                            var url = new URL(href, window.location.origin);
                            var next = (url.searchParams.get('status') || '').toLowerCase();
                        } catch (err) {
                            var m = href.match(/[?&]status=([^&]+)/); var next = m ? decodeURIComponent(m[1]).toLowerCase() : '';
                        }
                        var names = { pending: 'Pending', processing: 'Processing', inspecting: 'Inspecting', completed: 'Completed' };
                        var nextLabel = names[next] || (next ? next : 'the new status');
                        Swal.fire({
                            title: 'Change status?',
                            text: 'Change booking status to "' + nextLabel + '"?',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, change',
                            cancelButtonText: 'Cancel',
                            buttonsStyling: false,
                            customClass: { confirmButton: 'btn btn-primary', cancelButton: 'btn btn-light' }
                        }).then(function(res){ if (res.isConfirmed) { window.location = href; } });
                    });
            }));
            l();
            var searchInput = findOne('[data-admin-table-filter="search"]', '[data-kt-user-table-filter="search"]');
            if (searchInput) {
                searchInput.addEventListener("keyup", (function (t) {
                    e.search(t.target.value).draw()
                }));
            }
            var resetButton = findOne('[data-admin-table-filter="reset"]', '[data-kt-user-table-filter="reset"]');
            var filterForm = findOne('[data-admin-table-filter="form"]', '[data-kt-user-table-filter="form"]');
            if (resetButton && filterForm) {
                resetButton.addEventListener("click", (function () {
                    filterForm.querySelectorAll("select").forEach((e => {
                        $(e).val("").trigger("change")
                    }));
                    e.search("").draw()
                }))
            }
            c();
            (() => {
                $('#kt_daterangepicker_4').on('change',function(){
                    e.search("").draw()
                })
                const t = filterForm,
                    n = t ? (t.querySelector('[data-admin-table-filter="filter"]') || t.querySelector('[data-kt-user-table-filter="filter"]')) : null, r = t ? t.querySelectorAll("select") : [];
                if (!n) {
                    return;
                }
                n.addEventListener("click", (function () {
                    var t = "";
                    r.forEach(((e, n) => {
                        e.value && "" !== e.value && (0 !== n && (t += " "), t += e.value)
                    })), e.search(t).draw()
                }))
            })();

            // Re-evaluate on resize to force all columns visible on desktop
            (function(){
                var to=null;
                window.addEventListener('resize', function(){
                    clearTimeout(to);
                    to=setTimeout(function(){
                        try{
                            var isDesktop = window.matchMedia('(min-width: 992px)').matches;
                            if (isDesktop) { e.columns().visible(true, false); e.columns.adjust(); }
                        }catch(err){}
                    }, 150);
                });
            })();

            // Filters
            $('#filter_examiner_email, #filter_status, #filter_order_type').on('keyup change', function(){ e.draw(); });
            $('#filter_user_select').on('change', function(){ e.draw(); });


            var orderid='';
            var emailOrderId='';
            var manualEmailMessageDirty=false;
            var manualEmailFieldMap = [
                { key: 'bookingCode',   selector: '#email_examiner_booking_code',   label: 'Auftrags-Nr' },
                { key: 'customerName',  selector: '#email_examiner_customer_name',  label: 'Unser Kunde als Referenz (Auftraggeber)' },

                { key: 'carModel',      selector: '#email_examiner_car_model',      label: '\nFahrzeug' },
                { key: 'listingLink',   selector: '#email_examiner_listing_link',   label: 'Online-Inserat' },

                { key: 'sellerName',    selector: '#email_examiner_seller_name',    label: '\nVerkäufer' },
                { key: 'sellerAddress', selector: '#email_examiner_seller_address', label: 'Standort' },
                { key: 'sellerPhone',   selector: '#email_examiner_seller_phone',   label: 'Kontakt' }
            ];


            function fillManualEmailFields(payload){
                manualEmailFieldMap.forEach(function(field){
                    var $el=$(field.selector);
                    if(!$el.length){return;}
                    var value=(payload && payload[field.key])?payload[field.key]:'';
                    $el.val(value);
                });
            }

            function collectManualEmailFields(){
                var payload={};
                manualEmailFieldMap.forEach(function(field){
                    var $el=$(field.selector);
                    if(!$el.length){return;}
                    payload[field.key]=$el.val()||'';
                });
                return payload;
            }

            function buildManualEmailTemplate(force){
                if(!force && manualEmailMessageDirty){return;}
                var lines=[];
                var hasDetails=false;
                manualEmailFieldMap.forEach(function(field){
                    var $el=$(field.selector);
                    if(!$el.length){return;}
                    var value=(($el.val()||'').toString().trim());
                    if(!value){return;}
                    if(!hasDetails){
                        lines.push('Sehr geehrte Damen und Herren,');
                        lines.push('wir haben einen Auftrag für einen CarCheck.');
                        lines.push('');
                        hasDetails=true;
                    }
                    lines.push(field.label+': '+value);
                });
                if(hasDetails){lines.push('');}
                lines.push('Bei Fragen oder Updates können Sie gerne direkt auf diese E-Mail antworten oder uns unter partner@carspector.de kontaktieren.');
                lines.push('');
                lines.push('Mit freundlichen Grüßen');
                lines.push('Ihr Team von Carspector');
                $('#examiner_email_message').val(lines.join('\n'));
                manualEmailMessageDirty=false;
            }

            $(document).on('focus','.js-select-on-focus',function(){
                var el=this;
                setTimeout(function(){ if(typeof el.select==='function'){ el.select(); } },0);
            });
            $(document).on('input','#examiner_email_message',function(){ manualEmailMessageDirty=true; });
            $(document).on('input change','.js-manual-mail-field',function(){ buildManualEmailTemplate(false); });

            $(document).off('click','.btn-assign-examiner').on('click','.btn-assign-examiner',function(e){
               e.preventDefault();
               orderid=$(this).attr('data-id');

            });
            $(document).off('click','.btn-email-examiner').on('click','.btn-email-examiner',function(e){
                e.preventDefault();
                emailOrderId=$(this).data('id');
                var email=$(this).data('email') || '';
                var payload={
                    customerName:$(this).data('customerName')||'',
                    bookingCode:$(this).data('bookingCode')||('#'+(emailOrderId||'')),
                    carModel:$(this).data('carModel')||'',
                    sellerName:$(this).data('sellerName')||'',
                    sellerAddress:$(this).data('sellerAddress')||'',
                    sellerPhone:$(this).data('sellerPhone')||'',
                    listingLink:$(this).data('listingLink')||''
                };
                $('#examiner_email_order_id').val(emailOrderId);
                $('#email_examiner_email').val(email);
                $('#examiner_email_message').val('');
                $('#email_examiner_subject').val('');
                fillManualEmailFields(payload);
                manualEmailMessageDirty=false;
                buildManualEmailTemplate(true);
                $('#email_examiner').modal('show');
            });
            $(document).off('click.assign','.btn-assign-examiner-now').on('click.assign','.btn-assign-examiner-now',function(e){
               e.preventDefault();
               var $btn=$(this);
               if ($btn.prop('disabled')) { return; }
               var originalHtml=$btn.html();
               $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2" role="status"></span>Assigning...');
               var examinerid=$('#select-examiner').val();
               var email=$('#examiner_email').val();
                $.ajax({
                    url:examinerAssign,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type:"POST",
                    data:{id:orderid,examiner_id:examinerid,email:email},
                    success:function(data){
                        toastr.success('','Examiner assigned successfully...');
                        $('#assign_examiner').modal('hide');
                        setTimeout(function(){
                            window.location.reload();
                        },1000);
                    },
                    error:function (error){
                        toastr.error('','Error While assigning examiner...');
                    },
                    complete:function(){
                        $btn.prop('disabled', false).html(originalHtml);
                    }
                })
            })
            $(document).off('click','.btn-send-examiner-email').on('click','.btn-send-examiner-email',function(e){
                e.preventDefault();
                if (!examinerEmailRoute) { toastr.error('','Keine E-Mail Route definiert.'); return; }
                var $btn=$(this);
                if ($btn.prop('disabled')){ return; }
                var bookingId = $('#examiner_email_order_id').val() || emailOrderId;
                var email=$('#email_examiner_email').val();
                var message=$('#examiner_email_message').val();
                var subject=$('#email_examiner_subject').val();
                var manualFields=collectManualEmailFields();
                if (!bookingId){ toastr.error('','Keine Buchung ausgewählt.'); return; }
                if (!email){ toastr.error('','Bitte eine gültige E-Mail angeben.'); return; }
                if (!subject){ toastr.error('','Bitte einen Betreff eingeben.'); return; }
                var originalHtml=$btn.html();
                $btn.prop('disabled',true).html('<span class="spinner-border spinner-border-sm me-2" role="status"></span>Senden...');

                $.ajax({
                    url: examinerEmailRoute,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "POST",
                    data: {
                        order_id: bookingId,
                        email: email,
                        message: message,
                        subject: subject,
                        manual_customer_name: manualFields.customerName,
                        manual_booking_code: manualFields.bookingCode,
                        manual_car_model: manualFields.carModel,
                        manual_seller_name: manualFields.sellerName,
                        manual_seller_address: manualFields.sellerAddress,
                        manual_seller_phone: manualFields.sellerPhone,
                        manual_listing_link: manualFields.listingLink
                    },
                    success:function(data){
                        toastr.success('', data.message || 'E-Mail wurde versendet.');
                        $('#email_examiner').modal('hide');
                        $('#examiner_email_message').val('');
                    },
                    error:function (error){
                        var msg = (error.responseJSON && error.responseJSON.message) ? error.responseJSON.message : 'Fehler beim Senden der E-Mail';
                        toastr.error('', msg);
                    },
                    complete:function(){
                        $btn.prop('disabled',false).html(originalHtml);
                    }
                })
            });


            // One-time modal setup: manage title + field clearing based on edit vs create mode
            var bookingEditMode = false;
            var bookingModalEl = document.getElementById('kt_add_booking');
            if (bookingModalEl) {
                bookingModalEl.addEventListener('show.bs.modal', function() {
                    if (bookingEditMode) {
                        $('#booking-modal-title').text('Edit Booking');
                    } else {
                        $('#booking-modal-title').text('Create Booking');
                        $("[name=vehicle_make_model]").val('');
                        $("[name=advertisement_link]").val('');
                        $("[name=city]").val('');
                        $("[name=email]").val('');
                        $("[name=customer_name]").val('');
                        $("[name=examiner_name]").val('');
                        $("[name=admin_order_date]").val('');
                        $("[name=admin_status]").val('');
                        $("[name=completed_at]").val('');
                        $("[name=paid_at]").val('');
                        $("[name=desc]").val('');
                        $("[name=street]").val('');
                        $("[name=phone]").val('');
                        $("[name=id]").val('');
                        $("[name=vehicle_type]").val('');
                        $('[name=document_in_english]').prop('checked', false);
                        $('[name=pdf_with_partner_logo]').prop('checked', false);
                        if ($('[name=partner_logo_id]').length) {
                            $('[name=partner_logo_id]').val('').trigger('change');
                        }
                        $('[name=negotiation_checklist]').prop('checked', false);
                        if (typeof window.togglePartnerLogoField === 'function') {
                            window.togglePartnerLogoField();
                        }
                    }
                });
                bookingModalEl.addEventListener('hidden.bs.modal', function() {
                    bookingEditMode = false;
                });
            }

            $(document).off('click.edit','.btn-edit-order').on('click.edit','.btn-edit-order',function(e){
                e.preventDefault();
                if ($(this).data('busy')) return; $(this).data('busy', true);
                var id = $(this).attr('data-id');
                $.ajax({
                    url: hostUrl + 'admin/booking/edit',
                    type: "GET",
                    data: {id: id},
                    success: function(data) {
                        var mydt = data.dt;
                        $("[name=vehicle_make_model]").val(mydt.vehicle_make_model);
                        $("[name=advertisement_link]").val(mydt.advertisement_link);
                        $("[name=city]").val(mydt.city);
                        $("[name=email]").val(mydt.email);
                        $("[name=customer_name]").val(mydt.customer_name || '');
                        $("[name=examiner_name]").val(mydt.examiner_name || '');
                        $("[name=admin_order_date]").val(toDateInputValue(mydt.admin_order_date));
                        $("[name=admin_status]").val(mydt.admin_status || '');
                        $("[name=completed_at]").val(toDateInputValue(mydt.completed_at));
                        $("[name=paid_at]").val(toDateInputValue(mydt.paid_at));
                        $("[name=desc]").val(mydt.desc);
                        $("[name=address]").val(mydt.street);
                        $("[name=phone]").val(mydt.phone);
                        $("[name=price]").val(mydt.price);
                        $("[name=id]").val(mydt.id);
                        $("[name=vehicle_type]").val(mydt.vehicle_type);
                        $('[name=document_in_english]').prop('checked', mydt.document_in_english == 1);
                        $('[name=pdf_with_partner_logo]').prop('checked', mydt.pdf_with_partner_logo == 1);
                        if ($('[name=partner_logo_id]').length) {
                            $('[name=partner_logo_id]').val(mydt.partner_logo_id || '').trigger('change');
                        }
                        if (typeof window.togglePartnerLogoField === 'function') {
                            window.togglePartnerLogoField();
                        }
                        $('[name=negotiation_checklist]').prop('checked', mydt.negotiation_checklist == 1);
                        bookingEditMode = true;
                        bootstrap.Modal.getOrCreateInstance(bookingModalEl).show();
                    },
                    error: function(error) {
                        console.log(error);
                        toastr.error('', 'Could not load booking data');
                    },
                    complete: function() {
                        $('.btn-edit-order').data('busy', false);
                    }
                });
            })

            function toDateInputValue(value) {
                if (!value) {
                    return '';
                }
                return String(value).substring(0, 10);
            }
        }
    }
}();
(function (callback) {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', callback);
    } else {
        callback();
    }
})(function () {
    AdminBookingsList.init()
});
