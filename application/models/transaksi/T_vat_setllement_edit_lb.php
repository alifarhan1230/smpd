<?php

/**
 * T_vat_setllement_edit_lb Model
 *
 */
class T_vat_setllement_edit_lb extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = "";

    public $selectClause    = " c.wp_name,
                                c.wp_address_name||' '||c.wp_address_no as wp_address_name ,
                                e.vat_code as jenis_pajak,
                                f.year_code, 
                                f.p_year_period_id,
                                b.code as finance_period_code,
                                d.order_no,
                                nvl(db_interest_charge,0) as db_interest_charge_2,
                                nvl(db_increasing_charge,0) as db_increasing_charge_2,
                                to_char(a.due_date,'dd MON yyyy') as due_date_2,
                                a.* ";
    public $fromClause      = "t_vat_setllement a
                                left join p_finance_period b 
                                    on b.p_finance_period_id = a.p_finance_period_id
                                left join t_cust_account c 
                                    on c.t_cust_account_id= a.t_cust_account_id
                                left join t_customer_order d 
                                    on d.t_customer_order_id = a.t_customer_order_id
                                left join p_vat_type e 
                                    on e.p_vat_type_id = c.p_vat_type_id
                                left join p_year_period f 
                                    on f.p_year_period_id = b.p_year_period_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            
            $this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            $this->record['update_date'] = date('Y-m-d');
            $this->record['update_by'] = $userdata['app_user_name'];
            //if false please throw new Exception
        }
        return true;
    }

    function saveDataSubmit($cusAccId,$Period,$npwd,$ms_start,$ms_end,$kamar,$tot,$p_vat_type_dtl_id,$p_vat_type_dtl_cls_id){

        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $user = $userdata['app_user_name'];

        $sql = "SELECT * FROM f_vat_settlement_manual_skpdkb_lb(".$cusAccId.",".$Period.",'".$npwd."','".$ms_start."','".$ms_end."',".$kamar.",".$tot.",".$p_vat_type_dtl_id.",".$p_vat_type_dtl_cls_id.",'".$user."')";

        //return $sql;

        $query = $this->db->query($sql);
        $items = $query->row_array();
            
        return $items;

    }

    function getEngine2step($cust_id){
        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $user = $userdata['app_user_name'];

        $sql = "SELECT * FROM f_first_submit_engine_2step(501,".$cust_id.",'".$user."')";

        $query = $this->db->query($sql);
        $items = $query->row_array();
            
        return $items;

    }

    function getVatSetllement($cust_id){

        $sql = "SELECT t_vat_setllement_id FROM t_vat_setllement WHERE t_customer_order_id = ".$cust_id;

        $query = $this->db->query($sql);
        $items = $query->row_array();
            
        return $items['t_vat_setllement_id'];
    }

}

/* End of file T_vat_setllement_edit_lb.php */