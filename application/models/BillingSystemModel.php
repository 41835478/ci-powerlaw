<?php

class BillingSystemModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getallinvoiceinfo() {
        $this->db->select('*');
        $this->db->from('tbl_invoice');
        $this->db->join('tbl_invoice_item','tbl_invoice_item.InvoiceId = tbl_invoice.InvoiceId');
        $this->db->join('user','user.id = tbl_invoice.UserId');
        $query = $this->db->get();
        return $query->result_array();
    }

}
