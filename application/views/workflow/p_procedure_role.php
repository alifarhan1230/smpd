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
            <span>Role Pekerjaan</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-tabdrop">
            <ul class="nav nav-tabs">
                <li id="tab-1">
                    <a data-toggle="tab"> Pekerjaan Workflow </a>
                </li>
                <li class="active">
                    <a data-toggle="tab"> Role Prosedur </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active">
                    <table id="grid-table"></table>
                    <div id="grid-pager"></div>

                    <hr>
                    <div class="row" id="detail_placeholder" style="display:none;">
                        <div class="col-xs-12">
                            <table id="grid-table-detail"></table>
                            <div id="grid-pager-detail"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('lov/lov_groups.php'); ?>
<script>

    function showLovRole(id, code) {
        modal_lov_groups_show(id, code);
    }

    function clearLovRole() {
        $('#form_p_app_role_id').val('');
        $('#form_p_app_role_name').val('');
    }

</script>

<script>

    $(function($) {
        $("#tab-1").on( "click", function() {
            loadContentWithParams("workflow.p_procedure", {});
        });
    });

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."workflow.p_procedure_role_controller/crud"; ?>',
            postData: {p_procedure_id: <?php echo $this->input->post('p_procedure_id'); ?>},
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID',name: 'p_procedure_role_id', key: true, width: 35, sorttype: 'number', sortable: true, editable: true, hidden:true},
                {label: 'ID PROCEDURE',name: 'p_procedure_id', width: 35, sorttype: 'number', sortable: true, editable: true, hidden:true},
                {label: 'Role Aplikasi', name: 'role_code', width: 120, align: "left",  editable: false},
                {label: 'Role Aplikasi',
                    name: 'p_app_role_id',
                    width: 200,
                    sortable: true,
                    editable: true,
                    hidden: true,
                    editrules: {edithidden: true, number:true, required:true},
                    edittype: 'custom',
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            // give the editor time to initialize
                            setTimeout( function() {
                                elm.append('<input id="form_p_app_role_id" type="text"  style="display:none;">'+
                                        '<input id="form_p_app_role_name" disabled type="text" class="FormElement jqgrid-required" placeholder="Pilih Role">'+
                                        '<button class="btn btn-success" type="button" onclick="showLovRole(\'form_p_app_role_id\',\'form_p_app_role_name\')">'+
                                        '   <span class="fa fa-search icon-on-right bigger-110"></span>'+
                                        '</button>');
                                $("#form_p_app_role_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {

                            if(oper === 'get') {
                                return $("#form_p_app_role_id").val();
                            } else if( oper === 'set') {
                                $("#form_p_app_role_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'role_code');
                                        $("#form_p_app_role_name").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                },
                {label: 'Fungsi Role Flow',name: 'f_role', width: 150, sortable: true, editable: true,
                    editoptions: {
                        size: 50,
                        maxlength:64
                    }
                },
                {label: 'Berlaku Dari', name: 'valid_from', width: 120, editable: true,
                    edittype:"text",
                    editrules: {required: true},
                    editoptions: {
                        // dataInit is the client-side event that fires upon initializing the toolbar search field for a column
                        // use it to place a third party control to customize the toolbar
                        dataInit: function (element) {
                           $(element).datepicker({
                                autoclose: true,
                                format: 'dd-M-yyyy',
                                orientation : 'top',
                                todayHighlight : true
                            });
                        }
                    }
                },
                {label: 'Berlaku Sampai', name: 'valid_to', width: 120, editable: true,
                    edittype:"text",
                    editoptions: {
                        // dataInit is the client-side event that fires upon initializing the toolbar search field for a column
                        // use it to place a third party control to customize the toolbar
                        dataInit: function (element) {
                           $(element).datepicker({
                                autoclose: true,
                                format: 'dd-M-yyyy',
                                orientation : 'top',
                                todayHighlight : true
                            });
                        }
                    }
                },
                {label: 'Tgl Pembuatan', name: 'creation_date', width: 120, align: "left", editable: false},
                {label: 'Dibuat Oleh', name: 'created_by', width: 120, align: "left", editable: false},
                {label: 'Tgl Update', name: 'updated_date', width: 120, align: "left", editable: false},
                {label: 'Diupdate Oleh', name: 'updated_by', width: 120, align: "left", editable: false}
            ],
            height: '100%',
            autowidth: false,
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
				var celValue = $('#grid-table').jqGrid('getCell', rowid, 'p_app_role_id');
                var celCode = $('#grid-table').jqGrid('getCell', rowid, 'role_code');

                var grid_detail = $("#grid-table-detail");
                if (rowid != null) {
                    grid_detail.jqGrid('setGridParam', {
                        url: '<?php echo WS_JQGRID."administration.p_app_user_role_controller/showUserList"; ?>',
                        postData: {p_app_role_id: celValue}
                    });
                    var strCaption = 'Daftar User :: ' + celCode;
                    grid_detail.jqGrid('setCaption', strCaption);
                    $("#grid-table-detail").trigger("reloadGrid");
                    $("#detail_placeholder").show();

                    responsive_jqgrid('#grid-table-detail', '#grid-pager-detail');
                }

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
            editurl: '<?php echo WS_JQGRID."workflow.p_procedure_role_controller/crud"; ?>',
            caption: "Daftar Role Pekerjaan :: " + "<?php echo $this->input->post('proc_name'); ?>"

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
                editData: {
                    p_procedure_id: function() {
                        return <?php echo $this->input->post('p_procedure_id'); ?>;
                    }
                },
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

                    setTimeout(function() {
                        clearLovRole();
                    },100);
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


    /**
     * ---------------------------------------------------------------------
     * |  jqgrid table detail
     * ---------------------------------------------------------------------
     */
    $("#grid-table-detail").jqGrid({
        url: '<?php echo WS_JQGRID."administration.p_app_user_role_controller/showUserList"; ?>',
        datatype: "json",
        mtype: "POST",
        colModel: [
            {label: 'ID', key:true, name: 'p_app_user_role_id', width: 5, sorttype: 'number', editable: true, hidden: true},
            {label: 'User ID',  name: 'p_app_user_id', width: 5, sorttype: 'number',editable: false, hidden: true},
            {label: 'Username', name: 'app_user_name', width: 200, align: "left", editable: false},
            {label: 'Full Name', name: 'full_name', width: 200, align: "left", editable: false},
            {label: 'User Status', name: 'user_status', width: 200, align: "left", editable: false},

        ],
        height: '100%',
        width:500,
        autowidth: true,
        viewrecords: true,
        rowNum: 10,
        rowList: [10,20,50],
        rownumbers: true, // show row numbers
        rownumWidth: 35, // the width of the row numbers columns
        altRows: true,
        shrinkToFit: true,
        onSelectRow: function (rowid) {
            /*do something when selected*/
        },
        sortorder:'',
        pager: '#grid-pager-detail',
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
        caption: "Daftar User"

    });

    $('#grid-table-detail').jqGrid('navGrid', '#grid-pager-detail',
        {   //navbar options
            edit: false,
            editicon: 'fa fa-pencil blue bigger-110',
            add: false,
            addicon: 'fa fa-plus-circle purple bigger-110',
            del: false,
            delicon: 'fa fa-trash-o red bigger-110',
            search: true,
            searchicon: 'fa fa-search orange bigger-110',
            refresh: true,
            afterRefresh: function () {
                // some code here
            },

            refreshicon: 'fa fa-refresh green bigger-110',
            view: false,
            viewicon: 'fa fa-search-plus grey bigger-110'
        },

        {
            editData: {
                p_app_role_id: function() {
                    var selRowId =  $("#grid-table").jqGrid ('getGridParam', 'selrow');
                    var p_app_role_id = $("#grid-table").jqGrid('getCell', selRowId, 'p_app_role_id');
                    return p_app_role_id;
                }
            },
            // options for the Edit Dialog
            serializeEditData: serializeJSON,
            closeAfterEdit: true,
            closeOnEscape:true,
            recreateForm: true,
            viewPagerButtons: true,
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
                var response = $.parseJSON(response.responseText);
                if(response.success == false) {
                    return [false,response.message,response.responseText];
                }
                return [true,"",response.responseText];
            }

        },
        {
            //new record form
            serializeEditData: serializeJSON,
            closeAfterAdd: true,
            clearAfterAdd : true,
            closeOnEscape:true,
            recreateForm: true,
            width: 'auto',
            errorTextFormat: function (data) {
                return 'Error: ' + data.responseText
            },
            viewPagerButtons: false,
            beforeShowForm: function (e, form) {
                var form = $(e[0]);
                style_edit_form(form);
            },
            afterShowForm: function(form) {
                form.closest('.ui-jqdialog').center();
            },
            afterSubmit:function(response,postdata) {
                var response = $.parseJSON(response.responseText);
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
                var response = $.parseJSON(response.responseText);
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


    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );

    }

</script>