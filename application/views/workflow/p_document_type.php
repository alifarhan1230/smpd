<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url();?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Workflow</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Jenis Workflow</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <table id="grid-table"></table>
        <div id="grid-pager"></div>
    </div>
</div>

<?php $this->load->view('lov/lov_tables.php'); ?>

<script>

    function showLovTable1(code) {
        modal_lov_table_show(code);
    }

    function showLovTable2(code) {
        modal_lov_table_show(code);
    }

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."workflow.document_type_controller/crud"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID',name: 'p_document_type_id', key: true, width: 35, sorttype: 'number', sortable: true, editable: true, hidden:true},
                {label: 'Nama Dokumen',name: 'doc_name', width: 200, sortable: true, editable: true,
                    editoptions: {
                        size: 50,
                        maxlength:64
                    },
                    editrules: {required: true}
                },
                
                {label: 'Nama Dokumen Tercetak',name: 'display_name', width: 200, sortable: true, hidden:true, editable: true,
                    editoptions: {
                        size: 50,
                        maxlength:96
                    },
                    editrules: {edithidden: true, required:true}
                },

                {label: 'No Urut Prioritas',name: 'listing_no', width: 200, sortable: true, hidden:true, editable: true,
                    editoptions: {
                        size: 20,
                        maxlength:2
                    },
                    editrules: {edithidden: true, number:true, required:true}
                },
                {label: 'Table Utama Dokumen',
                    name: 'tdoc',
                    width: 200,
                    sortable: true,
                    editable: true,
                    hidden: true,
                    editrules: {edithidden: true, required:true},
                    edittype: 'custom',
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            setTimeout( function() {
                                elm.append('<input id="form_t_doc" name="tdoc" size="44" disabled type="text" class="FormElement jqgrid-required" placeholder="Pilih Tabel">'+
                                        '<button class="btn btn-success" type="button" onclick="showLovTable1(\'form_t_doc\')">'+
                                        '   <span class="fa fa-search icon-on-right bigger-110"></span>'+
                                        '</button>');
                                $("#form_t_doc").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        }
                    }
                },
                {label: 'Table Kontrol Inbox',
                    name: 'tctl',
                    width: 200,
                    sortable: true,
                    editable: true,
                    hidden: true,
                    editrules: {edithidden: true, required:true},
                    edittype: 'custom',
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            setTimeout( function() {
                                elm.append('<input id="form_t_doc2" name="tctl" size="44" disabled type="text" class="FormElement jqgrid-required" placeholder="Pilih Tabel">'+
                                        '<button class="btn btn-success" type="button" onclick="showLovTable1(\'form_t_doc2\')">'+
                                        '   <span class="fa fa-search icon-on-right bigger-110"></span>'+
                                        '</button>');
                                $("#form_t_doc2").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        }
                    }
                },
                {label: 'Table Kontrol User',
                    name: 'tuser',
                    width: 200,
                    sortable: true,
                    editable: true,
                    hidden: true,
                    editrules: {edithidden: true, required:true},
                    edittype: 'custom',
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            setTimeout( function() {
                                elm.append('<input id="form_t_doc3" name="tuser" size="44" disabled type="text" class="FormElement jqgrid-required" placeholder="Pilih Tabel">'+
                                        '<button class="btn btn-success" type="button" onclick="showLovTable1(\'form_t_doc3\')">'+
                                        '   <span class="fa fa-search icon-on-right bigger-110"></span>'+
                                        '</button>');
                                $("#form_t_doc3").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        }
                    }
                },
                {label: 'Package',name: 'package_name', width: 200, sortable: true, editable: true,
                    editoptions: {
                        size: 50,
                        maxlength:64
                    },
                    editrules: {required: true}
                },
                {label: 'Fungsi Layout Profile Inbox',name: 'f_profile', width: 200, sortable: true, editable: true,
                    editoptions: {
                        size: 50,
                        maxlength:64
                    },
                    editrules: {required: true}
                },
                {label: 'Form Summary Inbox',name: 'profile_source', width: 200, sortable: true, editable: true,
                    editoptions: {
                        size: 50,
                        maxlength:64
                    },
                    editrules: {required: true}
                },
                {label: 'Fungsi Deteksi Fraud',name: 'f_app_fraud_engine', width: 200, sortable: true, hidden:true, editable: true,
                    editoptions: {
                        size: 50,
                        maxlength:64
                    },
                    editrules: {edithidden: true, required:false}
                },
                {label: 'Deskripsi',name: 'description', width: 200, sortable: true, hidden:true, editable: true,
                    editoptions: {
                        size: 50,
                        maxlength:128
                    },
                    editrules: {edithidden: true, required:false}
                },
                {label: 'Tgl Pembuatan', name: 'creation_date', width: 120, align: "left", editable: false},
                {label: 'Dibuat Oleh', name: 'created_by', width: 120, align: "left", editable: false},
                {label: 'Tgl Update', name: 'updated_date', width: 120, align: "left", editable: false},
                {label: 'Diupdate Oleh', name: 'updated_by', width: 120, align: "left", editable: false}
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 10,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            sortorder:'',
            pager: '#grid-pager',
            jsonReader: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }

            },
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '<?php echo WS_JQGRID."workflow.document_type_controller/crud"; ?>',
            caption: "Jenis Workflow"

        });

        jQuery('#grid-table').jqGrid('navGrid', '#grid-pager',
            {   //navbar options
                edit: true,
                editicon: 'fa fa-pencil blue bigger-120',
                add: true,
                addicon: 'fa fa-plus-circle purple bigger-120',
                del: true,
                delicon: 'fa fa-trash-o red bigger-120',
                search: true,
                searchicon: 'fa fa-search orange bigger-120',
                refresh: true,
                afterRefresh: function () {
                    // some code here
                    jQuery("#detailsPlaceholder").hide();
                },

                refreshicon: 'fa fa-refresh green bigger-120',
                view: false,
                viewicon: 'fa fa-search-plus grey bigger-120'
            },

            {
                // options for the Edit Dialog
                closeAfterEdit: true,
                closeOnEscape:true,
                recreateForm: true,
                serializeEditData: serializeJSON,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);

                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
                    return [true,"",response.responseText];
                }
            },
            {
                //new record form
                closeAfterAdd: false,
                clearAfterAdd : true,
                closeOnEscape:true,
                recreateForm: true,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                serializeEditData: serializeJSON,
                viewPagerButtons: false,
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);
                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }

                    $(".tinfo").html('<div class="ui-state-success">' + response.message + '</div>');
                    var tinfoel = $(".tinfo").show();
                    tinfoel.delay(3000).fadeOut();

                    return [true,"",response.responseText];
                }
            },
            {
                //delete record form
                serializeDelData: serializeJSON,
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    style_delete_form(form);

                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                onClick: function (e) {
                    //alert(1);
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
                    return [true,"",response.responseText];
                }
            },
            {
                //search form
                closeAfterSearch: false,
                recreateForm: true,
                afterShowSearch: function (e) {
                    var form = $(e[0]);
                    style_search_form(form);
                    form.closest('.ui-jqdialog').center();
                },
                afterRedraw: function () {
                    style_search_filters($(this));
                }
            },
            {
                //view record form
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                }
            }
        );

    });

    function serializeJSON(postdata) {
        var items;
        if(postdata.oper != 'del') {
            items = JSON.stringify(postdata, function(key,value){
                if (typeof value === 'function') {
                    return value();
                } else {
                  return value;
                }
            });
        }else {
            items = postdata.id;
        }

        var jsondata = {items:items, oper:postdata.oper, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'};
        return jsondata;
    }

    function style_edit_form(form) {

        //update buttons classes
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-primary');
        buttons.eq(1).addClass('btn-danger');


    }

    function style_delete_form(form) {
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-danger');
        buttons.eq(1).addClass('btn-default');
    }

    function style_search_filters(form) {
        form.find('.delete-rule').val('X');
        form.find('.add-rule').addClass('btn btn-xs btn-primary');
        form.find('.add-group').addClass('btn btn-xs btn-success');
        form.find('.delete-group').addClass('btn btn-xs btn-danger');
    }

    function style_search_form(form) {
        var dialog = form.closest('.ui-jqdialog');
        var buttons = dialog.find('.EditTable')
        buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'fa fa-retweet');
        buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'fa fa-comment-o');
        buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-success').find('.ui-icon').attr('class', 'fa fa-search');
    }

    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );

    }

</script>