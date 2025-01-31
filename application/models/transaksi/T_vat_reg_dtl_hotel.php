<?php

/**
 * Icons Model
 *
 */
class T_vat_reg_dtl_hotel extends Abstract_model {

    public $table           = "t_vat_reg_dtl_hotel";
    public $pkey            = "t_vat_reg_dtl_hotel_id";
    public $alias           = "a";

    public $fields          = array(
                                't_vat_reg_dtl_hotel_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Cust Order'),
                                't_vat_registration_id'  => array('type' => 'int', 'nullable' => true, 'unique' => false, 'display' => 'ID Cust Order'),
                                'p_room_type_id'           => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'No Urut'),
                                'room_qty'    => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Jumlah Kamar'),
                                'service_qty'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Okupansi'),
                                'service_charge_wd'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Tarif Weekend'),
                                'service_charge_we'          => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Tarif Non Weekend'),
                                'description'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Deskripsi'),
                                 'creation_date'         => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By')

                            );

    public $selectClause    = "a.*, round(service_charge_we, 0) as service_charge_we";
    public $fromClause      = "v_vat_reg_dtl_hotel a";
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
            $this->record['creation_date'] = date('Y-m-d');
            $this->record['created_by'] = $userdata['app_user_name'];
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

        }else {
            //do something
            //example:
            $this->record['updated_date'] = date('Y-m-d');
            $this->record['updated_by'] = $userdata['app_user_name'];
            //if false please throw new Exception
        }
        return true;
    }

    

    

    

}

/* End of file Icons.php */