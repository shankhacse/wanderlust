<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class Bookingdetails extends MY_Controller {

    function __construct() {
        parent::__construct();
      
       $this->load->model('Commondata_model', 'Commondata_model',TRUE);
       $this->load->model('Bookingmodel', 'bookingmodel',TRUE);
       $this->load->module('template');
    }

    function index(){

        if($this->_authModel->is_logged_in()) {
         
             $data['bookinglist'] = $this->bookingmodel->getAllBookingList();
             //pre($data['bookinglist']);exit;
            $data['view_file'] = 'booking-details/booking-details-list';
            $this->template->admin_template($data);
        }
        else{
            redirect(admin_except_base_url().'login/');
        }
        
    }
    function getroomdetailsDetail(){

        if($this->_authModel->is_logged_in()) {

            $booking_id = $this->input->post('id');
         
             $bookinglist = $this->bookingmodel->getAllRoomDtl($booking_id);

             $table="<table id='roomDetailsTable' class='table customTbl table-bordered table-striped dataTables' style='border-collapse: collapse !important;'>
                    <thead>
                        <tr>
                            <th>Room No.</th>
                            <th>Mattress</th>
                            <th>Each Mattress Price</th>
                            <th>Total Mattress Price</th>
                            <th>Room Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>";
                        foreach ($bookinglist as $bookinglist) {
                            if($bookinglist->no_of_mattress > 0 ){ $mat_price = $bookinglist->each_mattress_price;            $total_mat_price = $bookinglist->no_of_mattress*$mat_price; }else{
                                $mat_price = 0;
                                $total_mat_price = $bookinglist->no_of_mattress*$mat_price;
                            }
                          $total = $bookinglist->rate + $total_mat_price; 
                            $table .="<tr>
                                        <td>".$bookinglist->room_no."</td>
                                        <td>".$bookinglist->no_of_mattress."</td>
                                        <td>".number_format($mat_price)."</td>
                                        <td>".number_format($total_mat_price)."</td>
                                        <td>".number_format($bookinglist->rate)."</td>
                                        <td>".number_format($total)."</td>
                                    </tr>";
                        }
                    $table .="</tbody> 
                                <tfoot>";
                    $table .= "<tr>
                               <th colspan = '3'>Total : </th>                               
                               <th></th>
                               <th></th>
                               <th></th>
                              </tr>";
                $table .="</tfoot>
                </table>";
          echo $table;
        }
        else{
            redirect(admin_except_base_url().'login/');
        }
        
    }

    public function Confirm()
    {
        if($this->_authModel->is_logged_in()) { 

            $bookingId=$this->uri->segment(4);            
            $this->bookingmodel->BookingConfirmOrNot($bookingId,'Y');
            /** audit trail */
            

             $this->Commondata_model->insertUserActivityData('Booking Details',"Update successfully","UPDATE",$bookingId);

            redirect(admin_except_base_url().'bookingdetails','refresh');

        } else{
            redirect(admin_except_base_url().'login/');
        }
    }
    public function Notconfirm()
    {
        if($this->_authModel->is_logged_in()) { 

            $bookingId=$this->uri->segment(4);
           // pre($userId);exit;
            $this->bookingmodel->BookingConfirmOrNot($bookingId,'N');
            /** audit trail */
            $this->Commondata_model->insertUserActivityData('Booking Details',"Update successfully","UPDATE",$bookingId);

            redirect(admin_except_base_url().'bookingdetails','refresh');

        }else{
            redirect(admin_except_base_url().'login/');
		}
    }
}