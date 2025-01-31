<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class vats_controller
* @version 07/05/2015 12:18:00
*/
class T_piutang_skpdkb_jabatan_controller {

    function read() {

        $page = getVarClean('page','int',1);
        $limit = getVarClean('rows','int',5);
        $sidx = getVarClean('sidx','str','t_vat_setllement_id');
        $sord = getVarClean('sord','str','desc');
		
		$s_keyword = getVarClean('s_keyword','str','');
		$status_bayar = getVarClean('status_bayar','str','belum_bayar');
		
        $data = array('rows' => array(), 'page' => 1, 'records' => 0, 'total' => 1, 'success' => false, 'message' => '');

        try {

            $ci = & get_instance();
            $ci->load->model('transaksi/t_piutang_skpdkb_jabatan');
            $table = $ci->t_piutang_skpdkb_jabatan;


            
            if( isset($_REQUEST['searchField'])){
                if($_REQUEST['searchField']=='npwd') {
                    $_REQUEST['searchField']='x.npwd';
                }
                if($_REQUEST['searchField']=='company_brand_name') {
                    $_REQUEST['searchField']='b.company_brand';
                }
                if($_REQUEST['searchField']=='code') {
                    $_REQUEST['searchField']='a.code';
                }
                 if($_REQUEST['searchField']=='no_kohir') {
                    $_REQUEST['searchField']='x.no_kohir';
                }
                 if($_REQUEST['searchField']=='payment_key') {
                    $_REQUEST['searchField']='x.payment_key';
                }
            }

            $req_param = array(
                "sort_by" => $sidx,
                "sord" => $sord,
                "limit" => null,
                "field" => null,
                "where" => null,
                "where_in" => null,
                "where_not_in" => null,
                "search" => $_REQUEST['_search'],
                "search_field" => isset($_REQUEST['searchField']) ? $_REQUEST['searchField'] : null,
                "search_operator" => isset($_REQUEST['searchOper']) ? $_REQUEST['searchOper'] : null,
                "search_str" => isset($_REQUEST['searchString']) ? $_REQUEST['searchString'] : null
            );

            // Filter Table

            $req_param['where'] = array();
            $req_param['where'][] = "x.p_settlement_type_id IN (4)";
			$req_param['where'][] = "( upper(b.wp_name) LIKE upper('%".$s_keyword."%') OR
				      upper(b.company_brand) LIKE upper('%".$s_keyword."%') OR
                      upper(x.npwd) LIKE upper('%".$s_keyword."%') OR
                      upper(x.no_kohir) LIKE upper('%".$s_keyword."%') OR
                      upper(x.payment_key) LIKE upper('%".$s_keyword."%')
                    )";

			
			if($status_bayar != "all") {
                if($status_bayar == 'belum_bayar') {
                    $req_param['where'][] = "c.receipt_no is null";
                }else {
                    $req_param['where'][] = "c.receipt_no is not null";
                }
            }

            $table->setJQGridParam($req_param);
            $count = $table->countAll();

            if ($count > 0) $total_pages = ceil($count / $limit);
            else $total_pages = 1;

            if ($page > $total_pages) $page = $total_pages;
            $start = $limit * $page - ($limit); // do not put $limit*($page - 1)

            $req_param['limit'] = array(
                'start' => $start,
                'end' => $limit
            );

            $table->setJQGridParam($req_param);

            if ($page == 0) $data['page'] = 1;
            else $data['page'] = $page;

            $data['total'] = $total_pages;
            $data['records'] = $count;

            $data['rows'] = $table->getAll();
            $data['success'] = true;
            logging('view data vat');
        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }
}