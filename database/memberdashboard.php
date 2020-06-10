<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	session_start(); 
class memberdashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
		//$this->load->library('session');
		header('Cache-Control: no-cache');
		header('Pragma: no-cache');
        $this->load->model('dashboardmodel', '', TRUE);
        $this->load->model('profilemodel', '', TRUE);
		$this->load->model('healthassetvaluemodel','',TRUE);
		$this->load->model('gstmastermodel','',TRUE);
        $this->load->helper('date');
		$this->load->library('phpqrcode/qrlib');
		$this->load->model('memberloginmodel','',TRUE);
		$this->load->model('walletmodel','',TRUE);
		$this->load->model('commondatamodel','',TRUE);
		$this->crypto_call =& get_instance(); 
		//$this->load->helper('url');
    }

	
    public function index() {
			$this->load->library('session');
		 
			if($this->uri->segment(3) == TRUE){
				$custID =  $this->uri->segment(3);
				$result =  $this->memberloginmodel->checkMemberByCusID($custID);
				$this->session->set_userdata("user_data",$result);
			}
			else{
				$custID = 0;
			}
			
		
        if($this->session->userdata('user_data') && $custID > 0) {
			
            $session = $this->session->userdata('user_data');
		//	print_r($session);
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            
			$packageExpmsg="";
            $page = 'memberdashboard/memberdashboard_second';
            $membershipNumber = $this->profilemodel->getMembershipNumber($customerId);
           // $latestvalidity = $this->profilemodel->getValidityString($membershipNumber);/* commented on 17.05.2019 */
            $latestvalidity = $this->profilemodel->getActiveValidityString($membershipNumber);
            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
            
            $validityString = $fromdate." - ".$todate;
            $grantDays = $this->dashboardmodel->getExtensionDays($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
            $validupto = date('Y-m-d',  strtotime($todate));
            $validfrom = date('Y-m-d',  strtotime($fromdate));
            $totalExtentiondate = date('Y-m-d',strtotime($validupto. ' +'.$grantDays.' days'));
			$currentDate =date('Y-m-d');
			if($currentDate < $totalExtentiondate){
				$packageExpmsg = "Days left for expired";
			}
			else{
					$packageExpmsg = " Package Expired";
			}
			
            $date1 = DateTime::createFromFormat('Y-m-d', $totalExtentiondate);
            $date2 = DateTime::createFromFormat('Y-m-d', $currentDate);

            $diffDays = $date2->diff($date1)->format("%a");
			
            $subscriptionamount = $this->profilemodel->getSubscriptionAmountOfMember($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
            $paidAmount = $this->profilemodel->getPaidAmount($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
            
            
          //  getAttendanceRate($fromDate,$validUpto,$memberNo)
            $customer = $this->profilemodel->getCustomerByCustId($customerId);
			$customermobile=$customer["CUS_PHONE"];
			$member_Acc_code = $customer["ACC_CODE"];
			
			
			$profilepic = array(
						"gender" => $customer['CUS_SEX'],
						"profile_image" => $customer['image_name']
						);
            
			
            
            $header = "";
            
            $result["cashbackdata"] = $this->dashboardmodel->getMemberCashBackPoint($membershipNumber,$validityString);
           //$result['totalwalletcash'] = $this->walletmodel->gettotalwalletcash($customermobile);
			 //$result['totalwalletcash'] = $this->walletmodel->gettotalwalletcashByMemberaccCode($member_Acc_code);
			 
			 //added by anil on 28-04-2020
			$latestdata = $this->walletmodel->getlatestvalidity($membershipNumber);
			$mem = $latestdata->MEMBERSHIP_NO;
			$validity = $latestdata->FROM_DT.' - '.$latestdata->VALID_UPTO;
			
			 //ended by anil on 28-04-2020

            $result['promoamount'] = $this->walletmodel->getPromocashByMemberaccCode($member_Acc_code);
			// $result['cashback'] = $this->walletmodel->getCashBackByMemberaccCode($member_Acc_code);comment by anil on 28-04-020
			$result['cashback'] = $this->walletmodel->getCashBackByMembership($mem,$validity);
            $result['totalwalletcash'] = $result['cashback'] + $result['promoamount'];

            $result["packagExpirystatus"]=$packageExpmsg;
            $result["remain"]=$diffDays;
            $result["validupto"]=$todate;
            $result["attpercentage"]=  $this->dashboardmodel->getAttendanceRate($validfrom,$validupto,$membershipNumber);
            $result["paymentdue"] = ($subscriptionamount - $paidAmount);
            $result["packagehistory"] = $this->dashboardmodel->getPackageHistory($customermobile,$latestvalidity["VALIDITY_STRING"]);  
			$result["activePackages"] = $this->dashboardmodel->getActivepackages($customermobile);
			$result["advancePackage"] = $this->dashboardmodel->getAdvancepackages($customermobile);
			$result["havdata"]=$this->healthassetvaluemodel->getLatestHAVdata($membershipNumber,$validityString);
			$result['profile_img'] = $profilepic;
			$result['memacccode'] = $member_Acc_code; // added by mkr on 09.08.2019
			
           
			

			/* qrcode creations */

			$qrtext = $customermobile;
			if(isset($qrtext))
			{
	
				//file path for store images
				$SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'];
				
			//	$SERVERFILEPATH = base_url().'application/images/memberQrcode/';
			
				//local
			//	$SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/MantraproNew/memberpanel/application/images/memberQrcode/';

				//server
			$SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/memberpanel/application/images/memberQrcode/';
			   
				$text = $qrtext;
				
				$text1= substr($text, 0,9);
				
				$folder = $SERVERFILEPATH;
				$file_name1 = $text1. ".png";
				$file_name = $folder.$file_name1;
				QRcode::png($text,$file_name,"L",8,4);
				
				$result['qrcode_img']=$file_name1;
			}

		
            
            createbody_method($result, $page, $header, $session);
            //($body_content_data = '',$body_content_page = '',$body_content_header='',$data,$heared_menu_content='')
        } else {
			//echo "exit block";
            redirect('memberlogin', 'refresh');
        }
    }
	
	/*------------PAYMENT INFO DETAIL-------------*/
	public function getPaymentInfo()
	{
		if($this->session->userdata('user_data'))
		{
			$membership_no = $this->input->post('mno',TRUE);
			$validity = $this->input->post('validity',TRUE);
			
			$mno = base64_decode($membership_no);
			$validity_str = base64_decode($validity);
			$result['paymentDtlInfo'] = $this->dashboardmodel->getPaymentInfoDetail($mno,$validity_str);
			
			$page = 'memberdashboard/payment-detail-info';
			$display = $this->load->view($page,$result);
			echo $display;
		}
		else
		{
			 redirect('memberlogin', 'refresh');
		}
	}
	
	/*------------END PAYMENT INFO DETAIL-------------*/
	
	
	public function applycashback(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'memberdashboard/cash-back-apply';
            $membershipNumber = $this->profilemodel->getMembershipNumber($customerId);
            $latestvalidity = $this->profilemodel->getValidityString($membershipNumber);
            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
			$validityString = $fromdate." - ".$todate;
			$header ="";
			$result['memberid']=$customerId;
			$result['membershipNumber']=$membershipNumber;
			$result['validityString']=$validityString;
			$result["cashbackdata"] = $this->dashboardmodel->getMemberCashBackPoint($membershipNumber,$validityString);
			
			createbody_method($result, $page, $header, $session);
			
		}else{
			redirect('memberlogin','refresh');
		}
	}
	
	public function checkCashBackApplied(){
		if($this->session->userdata('user_data')){
			$response = array();
			$membership_no =  trim($this->input->post('membership',TRUE));
			$latestvalidity = $this->profilemodel->getValidityString($membership_no);
			$isApplied = $this->dashboardmodel->checkCashBackApplied($membership_no,$latestvalidity['VALIDITY_STRING']);
			$response = array(
				"msg_code"=>1,
				"msg_data"=>$isApplied
			);
			header('Content-Type: application/json');
			echo json_encode($response);
			exit();
		}
		else{
			redirect('memberlogin','refresh');
		}
	}
	
	public function processCashBack(){
		if($this->session->userdata('user_data')){
			$response = array();
			$insertArry = array();
			$session = $this->session->userdata('user_data');
			$customerId = trim($this->input->post('member-id',TRUE));
			$customerDtl = $this->profilemodel->getCustomerByCustId($customerId);
			$membership_no = trim($this->input->post('membership-no',TRUE));
			$validity = trim($this->input->post('member-validity',TRUE));
			$cashbackamount = trim($this->input->post('cashback-amount',TRUE));
			$cashbackpoint = trim($this->input->post('cashback-point',TRUE));
			
			$latestvalidity = $this->profilemodel->getValidityString($membership_no);
			// print_r($latestvalidity);

			// change $latestvalidity["validupto"] to $latestvalidity["expiredate"] 01.04.2019
			$checkCashBackEligibility = $this->checkCashBackEligibility($latestvalidity["expiredate"],$customerDtl['CUS_CARD']);

			
			if($checkCashBackEligibility){
				$insertArry = array(
					"member_id" => $customerId,
					"membership_no" => $membership_no,
					"validity_period" => $latestvalidity['VALIDITY_STRING'],
					"apply_date" => date('Y-m-d'),
					"cash_bck_point" => $cashbackpoint,
					"cash_bck_amt" => $cashbackamount,
					"is_approved" => 'N',
					"is_redeemed" => 'N'
				);
				
			
				$status = $this->insertupdatemodel->insertData('cash_back_admin',$insertArry); 
				if($status){
					$response = array(
					"msg_code" => 1,
					"msg_data" => "Cash back applied successfully."
					);
				}
				else{
					$response = array(
					"msg_code" => 2,
					"msg_data" => "There is something error.Please try again later..."
					);
				}
			}
			else{
				$response = array(
					"msg_code" => 0,
					"msg_data" => "You can apply cash back before 10 days from the date of expiry."
				);
			}
			
			header('Content-Type:application/json');
			echo json_encode($response);
			exit;
				
		}
		else{
			redirect('memberlogin','refresh');
		}
	}
	
	private function checkCashBackEligibility($validupto,$cardcode){
		$isApllicable = false;
		//echo "Valid Upto ".$validupto = date('Y-m-d',strtotime($validupto));
		$cardExtDys = $this->dashboardmodel->getCardExtensionDays($cardcode);
		
		$till_apply_days =  date('Y-m-d', strtotime($validupto. ' + '.$cardExtDys .' days'));
		
		$remaing_dys = 300;
		$upto_apply_dys = $remaing_dys+$cardExtDys;
	
		$date = date('Y-m-d');
		
		// Start date of cashback apply 
		$cur_dt=date_create($date);
		$start_date=date_create($validupto);
		$diff=date_diff($cur_dt,$start_date);
		$start_apply_days = $diff->format("%R%a days");
		
	
		/* echo "Start Aplly date ".$start_apply_days;
		exit; */
		
	
		// Till Aplly date cash back 
		$date1=date_create($date);
		$till_date=date_create($till_apply_days);
		
		$diff=date_diff($date1,$till_date);
		$till_apply_days = $diff->format("%R%a days");
		
		//echo "Till Apply date ".$till_apply_days;
		
		
		
			// echo "<br>";
			// echo "Till Apply date ".$till_apply_days;
			// echo "<br>***";
			// echo "<br>";
			// echo "Start Days ".$start_apply_days;
			// echo "</br>";
			
			// echo "<br>";
			// echo "Till Appply Days ".$till_apply_days;
			// echo "</br>";
			
			// echo "<br>";
			// echo "Upto apply days ".$upto_apply_dys;
			// echo "</br>";
			
			
		
		if($start_apply_days>=0 && $start_apply_days<=300 && $till_apply_days<=$upto_apply_dys){
			$isApllicable = true;
		}
		if($start_apply_days>300 && $till_apply_days>$upto_apply_dys){
			$isApllicable = false;
		}
		
	return 	$isApllicable ;
	}
	
	
	public function renewpackage(){
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');


            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);

            $membershipNumber = $this->profilemodel->getMembershipNumber($customerId);
            $latestvalidity = $this->profilemodel->getValidityString($membershipNumber);
            $fromdate = ($latestvalidity["fromdate"] == "" ? "" : $latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"] == "" ? "" : $latestvalidity["validupto"]);
            $customer = $this->profilemodel->getCustomerByCustId($customerId);
            $customer_company_id = $customer["company_id"];
            $this->session->set_userdata('company_id', $customer_company_id);
            //echo($this->session->userdata('company_id'));
            //echo($customer_company_id);
            // $validityString = $fromdate." - ".$todate; //commented on 19.06.2018 by shankha

            $expiry_date = $latestvalidity["expiredate"];
            $grantDays = 0;
            $next_start_dt = "";
            $grantDays = $this->dashboardmodel->getExtensionDays($membershipNumber, $latestvalidity["VALIDITY_STRING"]);

            $validupto = date('Y-m-d', strtotime($todate));
            $validfrom = date('Y-m-d', strtotime($fromdate));
            $actualExpryDt = date('Y-m-d', strtotime($validupto . ' +' . $grantDays . ' days'));
            $validity_pd = date('d-m-Y', strtotime($validfrom)) . " - " . date('d-m-Y', strtotime($actualExpryDt));
            // Next Start Date 
            $plusDay = 1;
            if ($grantDays > 0) {
                $next_start_dt = date('Y-m-d', strtotime($actualExpryDt . ' + ' . $plusDay . ' days'));
            } else {
                $next_start_dt = date('Y-m-d', strtotime($validupto . ' + ' . $plusDay . ' days'));
            }

            $member = $this->profilemodel->getCustomerByCustId($customerId);
            $renewal_rate = $this->dashboardmodel->getRenewalSubscriptionAmount($member['CUS_BRANCH'], $member['CUS_CARD']);
            
            $offer = $this->dashboardmodel->getActiveCashbackOffer($member['CUS_BRANCH'], $member['CUS_CARD']);
            $puja_offer = $this->dashboardmodel->getActiveOthersOffer($member['CUS_BRANCH'], $member['CUS_CARD']);
            
            $validityString = $validfrom . " - " . $validupto; //added on 19.06.2018 by shankha
            $cashbackAmt = $this->dashboardmodel->getApprovedCashBackAmt($membershipNumber, $validityString);


            $result['cgstRateOpt'] = $this->gstmastermodel->getGSTRate('CGST'); // getting CGST Rate Options
			$result['sgstRateOpt'] = $this->gstmastermodel->getGSTRate('SGST'); // getting CGST Rate Options
			
			$cgstRate = $result['cgstRateOpt'][0]['rate']; // Need to change when rate is more than one 
			$cgstRateID = $result['cgstRateOpt'][0]['gstID']; // Need to change when rate is more than one 
			$sgstRate = $result['sgstRateOpt'][0]['rate']; // Need to change when rate is more than one
			$sgstRateID = $result['sgstRateOpt'][0]['gstID']; // Need to change when rate is more than one

          


			//$renewalAmount = $renewal_rate - $cashbackAmt;
			$renewalAmount = $renewal_rate;
            $yearId = $this->profilemodel->getFinancialYear();
            $taxPercentage = $this->dashboardmodel->getTaxPercentage($yearId);
            $taxAmount = $renewalAmount * $taxPercentage / 100;

            $cgstAmt = $cgstRate * $renewalAmount / 100;
            $sgstAmt = $sgstRate * $renewalAmount / 100;
            $totatlTaxableAmt = $cgstAmt + $sgstAmt;

            $totalPayableAmount = $renewalAmount + $totatlTaxableAmt;
			
			// On 11/03/2020

			// New Cash Back Amount
			$new_cashback_amt = 0;
			$cashBackEnable = false;
			$cashback_id =0;

			$cashback_data = $this->commondatamodel->getSingleRowByWhereCls
																("promo_cashbck_assign_to_mem",
																	[
																		"promo_cashbck_assign_to_mem.membership_no"=>$membershipNumber,
																		"promo_cashbck_assign_to_mem.validity_string"=>$latestvalidity["VALIDITY_STRING"],
																		"DATE_FORMAT(promo_cashbck_assign_to_mem.expire_dt,'%Y-%m-%d') >= " => date("Y-m-d"),
																	    "promo_cashbck_assign_to_mem.is_promo" => "N"
																		]
																);
			
			if($cashback_data) {
				$cashBackEnable = true;
				$new_cashback_amt = $cashback_data->amount;
				$cashback_id = $cashback_data->id;
			}

			// Promo Amount
			$promo_datas = $this->walletmodel->getActivePromosDataByMobile($member['CUS_PHONE']);

			$promo_amount = 0;
			$promoEnable = false;
			$promo_id = 0;

			if($promo_datas){
				$promo_amount = $promo_datas->amount;
				$promoEnable = true;
				$promo_id = $promo_datas->id;
			}

			// echo "<pre>";
			// print_r($cashback_data);	
			// echo "</pre>";		
			// exit;		

			$carddetail['cardDtl'] = $this->dashboardmodel->getCardDetailByCode($member['CUS_CARD'],$member['CUS_BRANCH']);
			
			$gateway_info = $this->commondatamodel->getSingleRowByWhereCls("payment_gateway_info",["payment_gateway_info.branch_code"=>$member['CUS_BRANCH']]);

			unset($_SESSION["packagePaymentData"]);
			unset($_SESSION["paymentGeteWayInfo"]);
			unset($_SESSION["order_id"]);



			/* new validity string 30.04.2020 */

			// $card_duration = $this->dashboardmodel->getCardDuration($_SESSION["packagePaymentData"]['cardcode']);

			//modify by anil on 05-06-2020
			$card_duration = $this->dashboardmodel->getCardDuration($carddetail['cardDtl']['card_code']);

						$open_date=$next_start_dt;
						$opening_date = explode("-",$open_date);
						$new_valid_upto = "";
						$new_valid_upto = date('Y-m-d',strtotime('+'.$card_duration.' day',mktime(0,0,0,$opening_date[1],$opening_date[2],$opening_date[0])));
						$newValidityString=date("d-m-Y", strtotime($open_date))." - ".date("d-m-Y", strtotime($new_valid_upto));

			



            

            $result = array(
                "customer_id" => $customerId,
                "membershipno" => $membershipNumber,
                "member_name" => $member['CUS_NAME'],
                "membermobileno" => $member['CUS_PHONE'],
                "memberemail" => $member['CUS_EMAIL'],
                "branchcode" => $member['CUS_BRANCH'],
                "validity_pd" => $validity_pd,
                "expiry_date" => $expiry_date,
                "new_valid_upto" => $newValidityString,
                "subscription" => $renewal_rate,
                "nextstartdate" => $next_start_dt,
                "paymentdate" => date('Y-m-d'),
                "cashbackamount" => $cashbackAmt,
                "renewalamount" => $renewalAmount,
                "taxpercentage" => $taxPercentage,
                "cgstRateOpt" => $result['cgstRateOpt'],
                "sgstRateOpt" => $result['sgstRateOpt'],
                "cgstAmt" => $cgstAmt,
                "sgstAmt" => $sgstAmt,
                "totalTaxableAmt" => $totatlTaxableAmt,
                "netpayable" => $totalPayableAmount,
                "offer"=>$offer,
				"puja_offer"=>$puja_offer,
				"promoEnable"=>$promoEnable,
				"promo_amount"=>$promo_amount,
				"cashBackEnable"=>$cashBackEnable,
				"new_cashback_amt"=>$new_cashback_amt,
				"covid_extension_days"=>$carddetail['cardDtl']['covid_extension_days']
            );

			// echo "<pre>";
			// print_r($result);
			// echo "</pre>";

			$_SESSION["packagePaymentData"] = array(
				"branchcode" => $member['CUS_BRANCH'],
				"cardid" =>  $carddetail['cardDtl']['card_id'],
				"cardcode" => $carddetail['cardDtl']['card_code'],
				"price" => round($renewalAmount,2),
				"cgstRateID" => $cgstRateID,
				"cgstRate" => $cgstRate,
				"sgstRateID" => $sgstRateID,
				"sgstRate" => $sgstRate,
				"cgstAmt" => round($cgstAmt,2),
				"sgstAmt" => round($sgstAmt,2),
				"totalGSTAmt" => round($totatlTaxableAmt,2),
				//"totalPayableAmt" => 1,
				"totalPayableAmt" => round($totalPayableAmount,2),
				"offer"=>$offer,
				"puja_offer"=>$puja_offer,
				"customer_id" => $customerId,
				"nextValidityDate" => $next_start_dt,
				"promoEnable"=>$promoEnable,
				"promo_amount"=>$promo_amount,
				"promo_id"=>$promo_id,
				"cashBackEnable"=>$cashBackEnable,
				"new_cashback_amt"=>$new_cashback_amt,
				"cashback_id"=>$cashback_id,
				);
			
			$_SESSION['paymentGateWayInfo'] = [
				"_accountID" => $gateway_info->vas_account_id,
				"_workingKey" => $gateway_info->working_key,
				"_accessCode" => $gateway_info->access_code
			];
		
			$_SESSION["order_id"] = rand(1000,9999).time();

			// echo "<pre>";
			// print_r($result);
			// echo "</pre>";

			// echo "<pre>";
			// print_r($_SESSION);
			// echo "</pre>";

			// exit;
			$page = 'memberdashboard/renew-package-form';
            $header = "";
            createbody_method($result, $page, $header, $session);
        } else {
            redirect('memberlogin', 'refresh');
        }
    }
	
	/*
	public function processrenewal()
	{
		if($this->session->userdata('user_data'))
		{
			$posts['_POST'] = $this->input->post();
			$page = 'memberdashboard/proceessrenewal';
			$this->load->view($page,$posts);
			
		}
		else
		{
			redirect('memberlogin','refresh');
		}
	}
	*/

	public function processrenewal(){

		// Get MemberInfo
		// echo "<pre>";
		// 	print_r($_SESSION);
		// 	echo "</pre>";
		$netpayable = 0;
			
		$member_info = $this->dashboardmodel->getMember($_SESSION["packagePaymentData"]['customer_id']);

		//$cust_id = $member_info->CUS_ID;
		$name = $member_info->CUS_NAME;
		$mobile_no = $member_info->CUS_PHONE;
		$email = $member_info->CUS_EMAIL; 
		$gender = $member_info->CUS_SEX;
		$dob = $member_info->CUS_DOB;
		$zip = $member_info->CUS_PIN;
		$city = "KOLKATA"; // hardcoded bcoz not storing in db .. 
		$address = $member_info->CUS_ADRESS;
		// $state=$this->servicemodel->getStateById($this->input->post('state'));
		$state = "WEST BENGAL"; // hardcoded bcoz not storing in db .. 
		$country = "India";

		$price = $_SESSION["packagePaymentData"]['price'];
		//$servicetax = trim($this->input->post('service-tax-percent',TRUE));
		$servicetax = 0;

		$cgstRate = $_SESSION["packagePaymentData"]['cgstRate'];
		$cgstRateID = $_SESSION["packagePaymentData"]['cgstRateID'];
		$cgstAmt = $_SESSION["packagePaymentData"]['cgstAmt'];
		$sgstRateID = $_SESSION["packagePaymentData"]['sgstRateID'];
		$sgstRate = $_SESSION["packagePaymentData"]['sgstRate'];
		$sgstAmt = $_SESSION["packagePaymentData"]['cgstAmt'];
		$netpayable = $_SESSION["packagePaymentData"]['totalPayableAmt'];

		$offerType = "NONE";
		$offerAmount = 0;
		$offerID = 0;

		if($this->input->post('choosePromo')) {
			$promoAmount = $_SESSION["packagePaymentData"]['promo_amount'];
			$renewalAmt = $_SESSION["packagePaymentData"]['price'];
			$taxableAmt = $renewalAmt-$promoAmount;
			$cgstAmt = $taxableAmt*$_SESSION["packagePaymentData"]['cgstRate']/100;
			$sgstAmt =  $taxableAmt*$_SESSION["packagePaymentData"]['sgstRate']/100;
			$netpayable = $taxableAmt+$cgstAmt+$sgstAmt;
			//$_SESSION["packagePaymentData"]['totalPayableAmt'] = $netpayable;
			$offerType = "PROMO";
			$offerAmount = $_SESSION["packagePaymentData"]['promo_amount'];
			$offerID = $_SESSION["packagePaymentData"]['promo_id'];
		}
		if($this->input->post('chooseCashback')) {
			$cashbackAmt = $_SESSION["packagePaymentData"]['new_cashback_amt'];
			$renewalAmt = $_SESSION["packagePaymentData"]['price'];
			$taxableAmt = $renewalAmt-$cashbackAmt;
			$cgstAmt = $taxableAmt*$_SESSION["packagePaymentData"]['cgstRate']/100;
			$sgstAmt =  $taxableAmt*$_SESSION["packagePaymentData"]['sgstRate']/100;
			$netpayable = $taxableAmt+$cgstAmt+$sgstAmt;
			//$_SESSION["packagePaymentData"]['totalPayableAmt'] = $netpayable;
			$offerType = "CASHBACK";
			$offerAmount = $_SESSION["packagePaymentData"]['new_cashback_amt'];
			$offerID = $_SESSION["packagePaymentData"]['cashback_id'];
		}
		$_SESSION["packagePaymentData"]['totalPayableAmt'] = $netpayable;


		// echo "<pre>";
		// 	print_r($_SESSION);
		// 	echo "</pre>";
		// 	exit;

		//CardInfo
		$branchcode = $_SESSION["packagePaymentData"]['branchcode'];
		$cardid = $_SESSION["packagePaymentData"]['cardid'];
		$cardcode = $_SESSION["packagePaymentData"]['cardcode'];
		
		$parameter_string = $name."#".$gender."#".$dob."#".$branchcode."#".$cardid."#".$cardcode."#".$price."#".$servicetax."#".$netpayable."#".$cgstRateID."#".$sgstRateID."#".$country."#".$state."#".$offerType."#".$offerAmount."#".$offerID;

		$namestring = $parameter_string;
		$channel = 10;
		$accountid = 250017;
		$secreatekey = '9198beab24537d04cb37bb7b2fc44f91';
		$refrenceno = 1491889093;
		$mode = 'LIVE';
		// $mode = 'TEST';
		$currency = 'INR';
		$description = 'Renew Package';
		//$redirect_url = siteURL().base_url().'memberdashboard/paymentresponse';
		$redirect_url = 'https://mantrahealthclub.com/memberpanel/memberdashboard/paymentresponse';
	

		$country = 'India'; // use short form of country
		$phone = $mobile_no;
		$submitted = $this->input->post('submitted');

		/*----------*/
		$tid=$this->input->post('tid');
		//$merchant_id="250017";
		$merchant_id=$_SESSION['paymentGateWayInfo']['_accountID'];
		
		
		$order_id=$_SESSION["order_id"];
		//$redirect_url="https://www.mantrahealthclub.com/Non_Seamless_kit/ccavResponseHandler.php";
		//$cancel_url="https://www.mantrahealthclub.com/Non_Seamless_kit/ccavResponseHandler.php";


		// check exist data by order ID

		$where = array(
						'order_id' => $order_id, 
						'transaction_id' => $tid
					  );
		$existData=$this->commondatamodel->duplicateValueCheck("online_payment_verification",$where);

		if ($existData) {

			$data = array(						
						"order_id"=>"F-".$order_id,	
						"transaction_id"=>$tid,					
						"status" => 'F', // Payment Failed 
						"paymeny_for" => 'Package Renewal Purchase', 
						"payment_geteway" => 'CCAvenue', 
						"created_on" => date('Y-m-d') 
					);


			// insert failed data
			$insert=$this->commondatamodel->insertSingleTableData('online_payment_verification',$data);

			$page = 'memberdashboard/renewalpaymentconfirmation';
			$header = "";
			$session="";
			createbody_method($data,$page,$header,$session);

		}else{
			//echo "Not Exist";exit;

			// insert pament process Data

			$data = array(						
						"order_id"=>$order_id,	
						"transaction_id"=>$tid,					
						"status" => 'Y', // Payment Failed 
						"paymeny_for" => 'Package Renewal Purchase', 
						"payment_geteway" => 'CCAvenue', 
						"amount" => $netpayable, 
						"created_on" => date('Y-m-d') 
					);

			$insert=$this->commondatamodel->insertSingleTableData('online_payment_verification',$data);


				$post['data'] = array(
				"tid" => $tid,
				"merchant_id" => $merchant_id,
				"order_id" => $order_id,			
				"amount" => $netpayable,
				"currency" => $currency,
				"redirect_url" => $redirect_url,
				"cancel_url" => $redirect_url,
				"language" => 'EN',
				"delivery_name" => $name,
				"delivery_address" => $address,
				"delivery_city" => $city,
				"delivery_state" => 'West Bengal',
				"delivery_zip" => $zip,
				"delivery_country" => $country,
				"delivery_tel" => $mobile_no,

				"mode" => $mode,
				"description" => $description,
				//"return_url" => $return_url,
				"billing_name" => $name,
				"billing_address" => $namestring,
				"billing_city" => $city,
				"billing_state" => $state,
				"billing_zip" => $zip,
				"billing_country" => $country,
				"billing_tel" => $phone,
				"billing_email" => $email,
				
				"submitted" => $submitted
			);

			// echo "<pre>";
			// print_r($post['data']);
			// echo "</pre>";
			// exit;
			$page = 'memberdashboard/paymentprocessrenewal';
			$this->load->view($page,$post);
		} // end of exist else

	}
	
	// public function paymentresponse()
	// {
		
		
		
	// 	if($this->session->userdata('user_data'))
	// 	{
	// 		$posts['_POST'] = $this->input->post();
	// 		$page = 'memberdashboard/paymentresponse';
	// 		$this->load->view($page,$posts);
	// 	}
	// 	else
	// 	{
	// 		redirect('memberlogin','refresh');
	// 	}
	// }

	public function paymentresponse()
	{
		if($this->session->userdata('user_data'))
		{
			$posts['_POST'] = $this->input->post();
			$page = 'memberdashboard/paymentresponse';
			$this->load->view($page,$posts);
		}
		else
		{
			redirect('memberlogin','refresh');
		}
	}
	
	// public function paymentconfirm()
	// {
	// 	if($this->session->userdata('user_data'))
	// 	{
	// 		$posts = $this->input->post();
	// 		$HASHING_METHOD = 'sha512';  
			
	// 		//$hashData = $_SESSION['SECRET_KEY'];
	// 		$hashData = "9198beab24537d04cb37bb7b2fc44f91"; // don't change this secreate key
			
	// 		$response = array();
	// 		ksort($posts);
	// 		foreach ($posts as $key => $value){
	// 			if (strlen($value) > 0 && $key != 'SecureHash') 
	// 			{
	// 				 $hashData .= '|'.$value;
	// 			}
	// 		}
	// 		if (strlen($hashData) > 0) 
	// 		{
	// 			$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
	// 			if($secureHash != $posts['SecureHash']){
	// 				echo '<h1>Error!</h1>';
	// 				echo '<p>Hash validation failed from confirm page</p>';
	// 				exit;
	// 			}
	// 			else 
	// 			{
	// 				$successMsg = $posts['Status'];
					
	// 				if($successMsg=="SUCCESS")
	// 				{
	// 					// Insert array initialize 
	// 					$insertPaymentMaster = array();
	// 					$insertrenewaltable = array();
	// 					$insertOnlinePayment = array();
						
	// 					$msg_to_user = "Your payment is successfully made.";
	// 					$payment_status = "Y";
						
	// 					$grantDays = 0;
	// 					$next_start_dt="";
	// 					$renewal_tag="";
	// 					$curr_date = date("Y-m-d");
	// 					$membershipNumber = $this->profilemodel->getMembershipNumber($posts['customerID']);
	// 					$latestvalidity = $this->profilemodel->getValidityString($membershipNumber);
	// 					$fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
	// 					$todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
	// 					$validityString = $fromdate." - ".$todate;
	// 					$member = $this->profilemodel->getCustomerByCustId($posts['customerID']);
	// 					$grantDays = $this->dashboardmodel->getExtensionDays($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
						
	// 					$validupto = date('Y-m-d',strtotime($todate));
	// 					$validfrom = date('Y-m-d',strtotime($fromdate));
	// 					$actualExpryDt = date('Y-m-d',strtotime($validupto. ' +'.$grantDays.' days'));
	// 					$validity_pd = date('d-m-Y',strtotime($validfrom ))." - ".date('d-m-Y',strtotime($actualExpryDt));
	// 					// Next Start Date 
	// 					$plusDay = 1;
	// 					if($grantDays>0){
	// 						$next_start_dt = date('Y-m-d', strtotime($actualExpryDt. ' + '.$plusDay.' days')); 
	// 					}
	// 					else{
	// 						$next_start_dt = date('Y-m-d', strtotime($validupto. ' + '.$plusDay.' days')); 
	// 					}
	// 					$renewal_rate = $this->dashboardmodel->getRenewalSubscriptionAmount($member['CUS_BRANCH'],$member['CUS_CARD']);
	// 					$cashbackAmt =  $this->dashboardmodel->getApprovedCashBackAmt($membershipNumber,$validityString);
	// 					$renewalAmount = $renewal_rate - $cashbackAmt;
	// 					$yearId = $this->profilemodel->getFinancialYear();
	// 					$taxPercentage = $this->dashboardmodel->getTaxPercentage($yearId);
						
	// 					//$taxAmount = $renewalAmount*$taxPercentage/100;
						
						
	// 					$rowCGSTRate = $this->gstmastermodel->GetGSTRateByIdAndType('CGST',1); // 1 need to change later
	// 					$rowSGSTRate = $this->gstmastermodel->GetGSTRateByIdAndType('SGST',2); // 2 need to change later
						
	// 					$cgstAmt = $rowCGSTRate*$renewalAmount/100;
	// 					$sgstAmt = $rowSGSTRate*$renewalAmount/100;
						
	// 					$totalTaxable = $cgstAmt + $sgstAmt;
						
	// 					$totalPayableAmount = $renewalAmount+$totalTaxable;
	// 					// get Card Duration
	// 					$card_duration = $this->dashboardmodel->getCardDuration($member['CUS_CARD']);
	// 					// getting New Validity String
	// 					//$newValidityString = $this->getNewValidityString($next_start_dt,$card_duration);
	// 					$open_date=$next_start_dt;
	// 					$opening_date = explode("-",$open_date);
	// 					$valid_upto = date('Y-m-d',strtotime('+'.$card_duration.' day',mktime(0,0,0,$opening_date[1],$opening_date[2],$opening_date[0])));
	// 					$newValidityString=$open_date." - ".$valid_upto;
						
						
	// 					if($actualExpryDt>=$curr_date){
	// 						$renewal_tag = "RA"; //RA = Renewal Advance  
	// 					}else{
	// 						$renewal_tag = "R";
	// 					}
	// 					$receiptSerial = $this->dashboardmodel->getReceiptSerialbyBranch($member['CUS_BRANCH'],$yearId);
	// 					$newreceiptSerial = $receiptSerial+1;
	// 					$previousPaymentInfo = $this->dashboardmodel->getPreviousPaymentInfo($membershipNumber,$latestvalidity["VALIDITY_STRING"]); 
						
	// 					$insertrenewaltable = array(
	// 						"customer_id" => $posts['customerID'],
	// 						"renewal_date" => $next_start_dt,
	// 						"BRANCH_CODE" => $member['CUS_BRANCH'],
	// 						"user_id" => 80, // Member self
	// 						"FIN_ID" => $yearId
	// 					);
						
	// 					$insertPaymentMaster = array(
	// 						"MEMBERSHIP_NO" =>$membershipNumber,
	// 						"CARD_CODE" =>$member['CUS_CARD'],
	// 						"FROM_DT" =>$open_date,
	// 						"VALID_UPTO" =>$valid_upto,
	// 						"EXPIRY_DT" =>$valid_upto,
	// 						"ADMISSION" =>0,
	// 						"SUBSCRIPTION" =>$renewal_rate,
	// 						"PRM_AMOUNT" =>$renewalAmount,
	// 						"AMOUNT" => $renewalAmount,
	// 						"MNTN_CHG" =>0,
	// 						"SERVICE_TAX" =>NULL,
	// 						"CGST_RATE_ID" => 1,
	// 						"CGST_AMT" => $cgstAmt,
	// 						"SGST_RATE_ID" => 2,
	// 						"SGST_AMT" => $sgstAmt,
	// 						"TOTAL_AMOUNT" =>$totalPayableAmount,
	// 						"PAYMENT_DT" => date('Y-m-d'),
	// 						"FRESH_RENEWAL" =>$renewal_tag,
	// 						"BRANCH_CODE" => $member['CUS_BRANCH'],
	// 						"RENEW_ID" => NULL,
	// 						"USER_ID" => 80 ,
	// 						"FIN_ID" =>$yearId,
	// 						"RCPT_NO" =>$newreceiptSerial,
	// 						"PAYMENT_MODE" =>'ONP', // ONP = Online Payment
	// 						"CUST_ID" => $posts['customerID'],
	// 						"VALIDITY_STRING" =>$newValidityString,
	// 						"payment_from" =>'REN',
	// 						"collection_at" =>$member['CUS_BRANCH'],
	// 						"company_id"=>$this->session->userdata('company_id')
	// 					);
						
    //                                            // sale cash back offer 
    //                                             $insertSaleCashBack =[
    //                                                 "member_id"=>$posts['customerID'],
    //                                                 "membership_no"=>$membershipNumber,
    //                                                 "validitiy_string"=>$newValidityString,
    //                                                 "cash_back_amt"=>$posts['on-sale-cash'],
    //                                                 "payment_id"=>$posts['PaymentID'],
    //                                                 "trans_date"=> date('Y-m-d H:i:s'),
    //                                                 "type_of_offer"=>1
    //                                                 ];
    //                                             $insertPujaOffer=[
    //                                                 "member_id"=>$posts['customerID'],
    //                                                 "membership_no"=>$membershipNumber,
    //                                                 "validitiy_string"=>$newValidityString,
    //                                                 "cash_back_amt"=>$posts['others-offer'],
    //                                                 "payment_id"=>$posts['PaymentID'],
    //                                                 "trans_date"=> date('Y-m-d H:i:s'),
    //                                                 "type_of_offer"=>2
                                                    
    //                                             ];
                                                
                                                
	// 					$insertOnlinePayment = array(
	// 						"online_payment_id" => $posts['PaymentID'], 
	// 						"transaction_id" => $posts['TransactionID'],
	// 						"payment_master_id" => NULL, // payment master table refrence 
	// 						"payment_status" => $payment_status, 
	// 						"processing_date" => date('Y-m-d'),
	// 						"payment_from" => 'REN'
	// 					);
						
						
	// 					$insertData = $this->dashboardmodel->insertintoTable($insertrenewaltable,$insertPaymentMaster,$insertOnlinePayment,$previousPaymentInfo['PAYMENT_ID'],$insertSaleCashBack,$insertPujaOffer);
						
	// 					if($insertData)
	// 					{
	// 						$data = array(
	// 							"CustomerName" => $member['CUS_NAME'],
	// 							"paidAmt" => $posts['Amount'],
	// 							"status" => $posts['Status'],
	// 							"iscomplete" => 'Y',
	// 							"usermsg" => 'Your payment is successfully made'
	// 						);
							
							
	// 					}
	// 					else
	// 					{
	// 						$data = array(
	// 							"status" => $posts['Status'],
	// 							"iscomplete" => 'N',
	// 							"usermsg" => 'Unexpected error.'
	// 						);
	// 					}
	// 				}
	// 				else{
	// 					$insertOnlinePayment  =array();
	// 					$msg_to_user = "Your transaction has been decline.";
	// 					$payment_status = "N";
						
	// 					$insertOnlinePayment = array(
	// 						"online_payment_id" => $posts['PaymentID'], 
	// 						"transaction_id" => $posts['TransactionID'],
	// 						"payment_master_id" => NULL, // payment master table refrence 
	// 						"payment_status" => $payment_status, 
	// 						"processing_date" => date('Y-m-d'),
	// 						"payment_from" => 'REN'
	// 					);
					
	// 					$insertData = $this->dashboardmodel->insertintoOnlinePayment($insertOnlinePayment);
						
	// 					if($insertData)
	// 					{
	// 						$data = array(
	// 							"status" => $posts['Status'],
	// 							"iscomplete" => 'N',
	// 							"usermsg" => 'Your transaction has been decline.'
	// 						);
	// 					}
	// 					else
	// 					{
	// 						$data = array(
	// 							"status" => $posts['Status'],
	// 							"iscomplete" => 'N',
	// 							"usermsg" => 'Your transaction has been decline.'
	// 						);
	// 					}
	// 				}
					
					
					
	// 				$page = 'memberdashboard/paymentconfirmation';
	// 				$this->load->view($page,$data);
					
	// 			}
	// 		}
	// 		 else 
	// 			{
	// 				echo '<h1>Error!</h1>';
	// 				echo '<p>Invalid response</p>';
	// 				exit;
	// 			}
			
			
	// 	}
	// 	else{
	// 		redirect('memberlogin','refresh');
	// 	}
	// }


	public function paymentconfirmation(){
		
			$posts = $this->input->post();
			$working_key=$_SESSION['paymentGateWayInfo']['_workingKey'];

  
				if(strlen($working_key) > 0) 
				{
					
					if($working_key != $_SESSION["packagePaymentData"]['SecureHash'])
					{
						echo '<h1>Error!</h1>';
						echo '<p>Hash validation failed from confirm page</p>';
						exit;
					}
					else 
					{
						$successMsg = $_SESSION["packagePaymentData"]['Status'];
						
						if($successMsg=="Success" && $_SESSION["packagePaymentData"]['order_id']==$_SESSION["order_id"])
						{
							
							
							$renewal_table = [];
							$payment_insert = [];
							$online_payment = [];
							$onsale_cashback = [];
							$puja_offers = [];
							
							$where_payment_status = array(
									'order_id' => $_SESSION["packagePaymentData"]['order_id'], 
									'tracking_id' => $_SESSION["packagePaymentData"]['tracking_id']
								);

						$existStatusData=$this->commondatamodel->duplicateValueCheck("online_payment_status",$where_payment_status);

						if($existStatusData){
							$insertData=0;
						}
						else{
							


							$customerDtl = explode("#", $_SESSION["packagePaymentData"]['customerID']);
							$cus_name = $customerDtl[0];
							$cus_sex = $customerDtl[1];
							$dob = $customerDtl[2];
							$branchcode = $customerDtl[3];
							$cardid = $customerDtl[4];
							$cardcode = $customerDtl[5];
							$subscriptionAmt = $customerDtl[6];
							$serviceTaxrate = $customerDtl[7];
							$netPayableAmt = $customerDtl[8];
							$cgstRateId = $customerDtl[9];
							$sgstRateId = $customerDtl[10];
							$country = $customerDtl[11];

							$city = $_SESSION["packagePaymentData"]['customerCity'];
							$cus_mobile = $_SESSION["packagePaymentData"]['customerPhone'];
							$cus_email = $_SESSION["packagePaymentData"]['customerEmail'];
							$address = $_SESSION["packagePaymentData"]['customerAddress'];
							
							$state = $customerDtl[12];
							$zip_code = $_SESSION["packagePaymentData"]['customerZipCode'];
							$cus_address = $address;

							$offerType = $customerDtl[13];
							$offerAmount = $customerDtl[14];
							$offerID = $customerDtl[15];
							$cust_id = $_SESSION["packagePaymentData"]["customer_id"];
							
							
						$grantDays = 0;
						$next_start_dt = "";
						$renewal_tag = "";
						$curr_date = date("Y-m-d");
						$membershipNumber = $this->profilemodel->getMembershipNumber($cust_id);
						$latestvalidity = $this->profilemodel->getValidityString($membershipNumber);
						
						$fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
						$todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
						$validityString = $fromdate." - ".$todate;
						$member = $this->profilemodel->getCustomerByCustId($cust_id);
						$grantDays = $this->dashboardmodel->getExtensionDays($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
						
						 $validupto = date('Y-m-d',strtotime($todate));
						 $validfrom = date('Y-m-d',strtotime($fromdate));
						 $actualExpryDt = date('Y-m-d',strtotime($validupto. ' +'.$grantDays.' days'));
						 $validity_pd = date('d-m-Y',strtotime($validfrom ))." - ".date('d-m-Y',strtotime($actualExpryDt));
						// Next Start Date 
					
						$activeValidity = $this->profilemodel->getActiveValidityString($membershipNumber);
						$prv_payment_id = 	$activeValidity['PAYMENT_ID'];
						
						$next_start_dt = $_SESSION["packagePaymentData"]['nextValidityDate'];
						$renewal_rate = $this->dashboardmodel->getRenewalSubscriptionAmount($_SESSION["packagePaymentData"]['branchcode'],$_SESSION["packagePaymentData"]['cardcode']);
						//$cashbackAmt =  $this->dashboardmodel->getApprovedCashBackAmt($membershipNumber,$validityString);
						$cashbackAmt =  $offerAmount;
						$renewalAmount = $renewal_rate - $cashbackAmt;
						$yearId = $this->profilemodel->getFinancialYear();
						$taxPercentage = $this->dashboardmodel->getTaxPercentage($yearId);
						
						//$taxAmount = $renewalAmount*$taxPercentage/100;
						
						
						// $rowCGSTRate = $this->gstmastermodel->GetGSTRateByIdAndType('CGST',1); // 1 need to change later
						// $rowSGSTRate = $this->gstmastermodel->GetGSTRateByIdAndType('SGST',2); // 2 need to change later
						
						$rowCGSTRate = $_SESSION["packagePaymentData"]["cgstRate"];
						$rowSGSTRate = $_SESSION["packagePaymentData"]["sgstRate"];

						$cgstAmt = $rowCGSTRate*$renewalAmount/100;
						$sgstAmt = $rowSGSTRate*$renewalAmount/100;
						
						$totalTaxable = $cgstAmt + $sgstAmt;
						
						$totalPayableAmount = $renewalAmount+$totalTaxable;
						// get Card Duration
						$card_duration = $this->dashboardmodel->getCardDuration($_SESSION["packagePaymentData"]['cardcode']);
						$covid_extension_days = $this->dashboardmodel->getCardDetailByCode($_SESSION["packagePaymentData"]['cardcode'],$_SESSION["packagePaymentData"]['branchcode'])['covid_extension_days'];
						// getting New Validity String
						//$newValidityString = $this->getNewValidityString($next_start_dt,$card_duration);
						$open_date=$next_start_dt;
						$opening_date = explode("-",$open_date);
						$new_valid_upto = "";
						$new_valid_upto = date('Y-m-d',strtotime('+'.$card_duration+$covid_extension_days.' day',mktime(0,0,0,$opening_date[1],$opening_date[2],$opening_date[0])));
						$newValidityString=$open_date." - ".$new_valid_upto;
						
						
						if($actualExpryDt>=$curr_date){
							$renewal_tag = "RA"; //RA = Renewal Advance  
						}else{
							$renewal_tag = "R";
						}
						$receiptSerial = $this->dashboardmodel->getReceiptSerialbyBranch($_SESSION["packagePaymentData"]['branchcode'],$yearId);
						$newreceiptSerial = $receiptSerial+1;
						$previousPaymentInfo = $this->dashboardmodel->getPreviousPaymentInfo($membershipNumber,$latestvalidity["VALIDITY_STRING"]); 

						$renewal_table = [
							"customer_id" => $cust_id,
							"renewal_date" => $next_start_dt,
							"BRANCH_CODE" => $_SESSION["packagePaymentData"]['branchcode'],
							"user_id" => 80, // Member self
							"FIN_ID" => $yearId
						];
						$renewaltbl_id = $this->commondatamodel->insertSingleTableData("renewaltable",$renewal_table);
						$this->commondatamodel->updateSingleTableData("payment_master",["RENEW_ID"=>$renewaltbl_id],["PAYMENT_ID"=>$prv_payment_id]);

						$payment_insert = array(
							"MEMBERSHIP_NO" => $membershipNumber,
							"CARD_CODE" =>$_SESSION["packagePaymentData"]['cardcode'],
							"FROM_DT" =>$open_date,
							"VALID_UPTO" =>$new_valid_upto,
							"EXPIRY_DT" =>$new_valid_upto,
							"ADMISSION" =>0,
							"SUBSCRIPTION" =>$renewal_rate,
							"PRM_AMOUNT" =>$renewalAmount,
							"WALLET_AMT" => $offerAmount,
							"AMOUNT" => $renewalAmount,
							"MNTN_CHG" =>0,
							"SERVICE_TAX" =>NULL,
							"CGST_RATE_ID" => 1,
							"CGST_AMT" => $cgstAmt,
							"SGST_RATE_ID" => 2,
							"SGST_AMT" => $sgstAmt,
							"TOTAL_AMOUNT" =>$totalPayableAmount,
							"PAYMENT_DT" => date('Y-m-d'),
							"FRESH_RENEWAL" =>$renewal_tag,
							"BRANCH_CODE" => $_SESSION["packagePaymentData"]['branchcode'],
							"RENEW_ID" => NULL,
							"USER_ID" => 80 ,
							"FIN_ID" =>$yearId,
							"RCPT_NO" =>$newreceiptSerial,
							"PAYMENT_MODE" =>'ONP', // ONP = Online Payment
							"CUST_ID" => $cust_id,
							"VALIDITY_STRING" =>$newValidityString,
							"payment_from" =>'REN',
							"collection_at" =>$_SESSION["packagePaymentData"]['branchcode'],
							"company_id"=>$this->session->userdata('company_id')
						);

						$payment_master_id = $this->commondatamodel->insertSingleTableData("payment_master",$payment_insert);

						
						 // sale cash back offer 
						 if($_SESSION["packagePaymentData"]['offer']>0){
							$insertSaleCashBack =[
								"member_id"=>$cust_id,
								"membership_no"=>$membershipNumber,
								"validitiy_string"=>$newValidityString,
								"cash_back_amt"=>$_SESSION["packagePaymentData"]['offer'],
								"payment_id"=>$payment_master_id,
								"trans_date"=> date('Y-m-d H:i:s'),
								"type_of_offer"=>1
								];
								$cash_back_mastre_id1 = $this->commondatamodel->insertSingleTableData("on_sale_cash_back_trans",$insertSaleCashBack);
						 }
						
						if($_SESSION["packagePaymentData"]['puja_offer']>0) {
							$insertPujaOffer=[
								"member_id" => $cust_id,
								"membership_no" => $membershipNumber,
								"validitiy_string"=>$newValidityString,
								"cash_back_amt"=>$_SESSION["packagePaymentData"]['puja_offer'],
								"payment_id"=>$payment_master_id,
								"trans_date"=> date('Y-m-d H:i:s'),
								"type_of_offer"=>2
								
							];
							$cash_back_mastre_id2 = $this->commondatamodel->insertSingleTableData("on_sale_cash_back_trans",$insertPujaOffer);
						}

						
							$online_payment = array(
								"tracking_id" => $_SESSION["packagePaymentData"]['tracking_id'], 
								"bank_ref_no" => $_SESSION["packagePaymentData"]['bank_ref_no'],
								"order_id" => $_SESSION["order_id"],
								"payment_geteway" => "CCAvenue",
								"payment_master_id" => $payment_master_id, // payment master table refrence 
								"payment_status" => 'Y', 
								"processing_date" => date('Y-m-d'),
								"payment_from" => 'REN'
								);
								
						
							$insertData = $this->commondatamodel->insertSingleTableData("online_payment_status",$online_payment);

						

						// Promo Cash Back Adjustment
						if($offerType == "PROMO" || $offerType == "CASHBACK" ) {
							// Update tables
							$getPromoDetail = $this->commondatamodel->getSingleRowByWhereCls("promo_cashbck_assign_to_mem",["promo_cashbck_assign_to_mem.id"=>$offerID]);

							$insert_promo = [];
							$insert_promo = [
								"promo_cashback_id" => $getPromoDetail->transaction_id,
								"mobile_no" => $member['CUS_PHONE'],
								"amount" => $offerAmount,
								"payment_id" => $payment_master_id,
								"is_debit" => 'Y',
								"tran_module" => 'REN',
								"tran_date" => date("Y-m-d H:i:s"),
								"promo_cashback_assign_id" => $getPromoDetail->id,
								"case_dtl_type" => "For Renewal through Online Payment",
								"member_acc_code" => $member['ACC_CODE'],
								"attendance_month" => NULL,
								"membership_no" => $membershipNumber,
								"validity_string" => $newValidityString,
								"expire_dt" => $new_valid_upto,
								"description" => NULL
							];
							$promo_or_cash_back = $this->commondatamodel->insertSingleTableData("promo_cashbck_pmnt_dtl",$insert_promo);

							// Update Cash Back Or Promo
							$promoOrgBalance = 0;
							$remaningBalance = 0;
							$remaningBalance = $promoOrgBalance - $offerAmount;

							$update_balance = $this->commondatamodel->updateSingleTableData("promo_cashbck_assign_to_mem",["promo_cashbck_assign_to_mem.amount"=>$remaningBalance],["promo_cashbck_assign_to_mem.id"=>$offerID]);

						}

						
						}// end of else exist data


							if($insertData)
							{
							
								$getmemberinfo = $this->commondatamodel->getSingleRowByWhereCls("payment_master",["payment_master.PAYMENT_ID"=>$payment_master_id]);
								
								$data = array(
									"membershipno" => $getmemberinfo->MEMBERSHIP_NO,
									"validity_string" => $getmemberinfo->VALIDITY_STRING,
									"order_id" => $_SESSION["order_id"],
									"tracking_id" => $_SESSION["packagePaymentData"]['tracking_id'], 
									"bank_ref_no" => $_SESSION["packagePaymentData"]['bank_ref_no'],
									"Amount" => $_SESSION["packagePaymentData"]['Amount'],
									"status" => 'Y' // Successfully registered
								);
								
								//$sendSMS = $this->SendSMS($cus_mobile,$membership_no);
							}
							else
							{
								
								$data = array(
								
									"order_id" => $_SESSION["order_id"],
									"tracking_id" => $_SESSION["packagePaymentData"]['tracking_id'], 
									"bank_ref_no" => $_SESSION["packagePaymentData"]['bank_ref_no'],
									"Amount" => $_SESSION["packagePaymentData"]['Amount'],
									"status" => 'N' // Unexpected error when isnerting into database 
								);
								
							}
							
							
							
						}
						else
						{
							// Failed Status Coding
					
							
							$online_payment = array(
								"tracking_id" => $_SESSION["packagePaymentData"]['tracking_id'], 
								"bank_ref_no" => $_SESSION["packagePaymentData"]['bank_ref_no'],
								"order_id" => $_SESSION["order_id"],
								"payment_geteway" => "CCAvenue",
								"payment_master_id" => NULL, // payment master table refrence 
								"payment_status" => 'N', 
								"processing_date" => date('Y-m-d'),
								"payment_from" => 'REN'
								);

							$insertData =$this->commondatamodel->insertSingleTableData("online_payment_status",$online_payment);
							
							
							if($insertData)
							{
								$data = array(						
								
									"order_id" => $_SESSION["order_id"],				
									"status" => 'N' // Payment Failed and Registration not done
								);
							}
							else
							{
								$data = array(
									
									"order_id" => $_SESSION["order_id"],
									"status" => 'else U' // Unexpected error when isnerting into database 
								);
							}
							
							
						}
						
					
						$page = 'memberdashboard/renewalpaymentconfirmation';
						$header = "";
						$session="";
						createbody_method($data,$page,$header,$session);
						// $this->load->view($page,$data);			
						
						
					}

				}


		
	}
	
	/*private function getNewValidityString($next_start_dt,$card_duration)
	{
		$open_date=$next_start_dt;
		$opening_date = explode("-",$open_date);
		$valid_upto = date('Y-m-d',strtotime('+'.$card_duration.' day',mktime(0,0,0,$opening_date[1],$opening_date[2],$opening_date[0])));
		$valid_string=$open_date." - ".$valid_upto;
		return $valid_string;
	}*/
	
	
	
	public function attendancedetail()
	{
		if($this->session->userdata('user_data'))
		{
			$session = $this->session->userdata('user_data');
			
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'memberdashboard/member-attendence-view';
            $membershipNumber = $this->profilemodel->getMembershipNumber($customerId);
           
            // $latestvalidity = $this->profilemodel->getValidityString($membershipNumber);/* commented on 17.05.2019 */
            $latestvalidity = $this->profilemodel->getActiveValidityString($membershipNumber);

            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
			$validityString =date('Y-m-d',strtotime($fromdate))." - ".date('Y-m-d',strtotime($todate)); // 2017-07-03 - 2017-10-04
			$header ="";
			$result['memberid']=$customerId;
			$result['membershipNumber']=$membershipNumber;
			$result['validityString']=$validityString;
			
			
			$result['memberAttendance'] = $this->dashboardmodel->getMemberAttendanceByMonth($membershipNumber,$validityString);
			
			
			
			createbody_method($result, $page, $header, $session);
		}
		else
		{
			redirect('memberlogin','refresh');
		}
	}
	
	public function attendancedetailbymonth()
	{
		if($this->session->userdata('user_data'))
		{
			$session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'memberdashboard/member-attendence-detail-view';
            $membershipNumber = $this->profilemodel->getMembershipNumber($customerId);
          
             // $latestvalidity = $this->profilemodel->getValidityString($membershipNumber);/* commented on 17.05.2019 */
            $latestvalidity = $this->profilemodel->getActiveValidityString($membershipNumber);

			$fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
			
			
			$validityString =date('Y-m-d',strtotime($fromdate))." - ".date('Y-m-d',strtotime($todate)); // 2017-07-03 - 2017-10-04
			$header ="";
			$result['memberid']=$customerId;
			$result['membershipNumber']=$membershipNumber;
			$result['validityString']=$validityString;
			
			$month = $this->uri->segment(3);
			$year = $this->uri->segment(4);
			
			
			$result['memberAttDetail'] = $this->dashboardmodel->getMemberAttendanceDetailByMonthAndYear($membershipNumber,$validityString,$month,$year);
			$result['month'] = $month;
			$result['year'] = $year;
			
			createbody_method($result, $page, $header, $session);
		}
		else
		{
			redirect('memberlogin','refresh');
		}
	}
	
	
	public function defaultopener()
	{
		if($this->session->userdata('user_data'))
		{
			$navFrom = $this->input->post('fromNav');
			
			$result['navFrom'] = $navFrom;
			$display = $this->load->view('memberdashboard/default-nav-opner-view',$result);
			echo $display ;
		}
		else
		{
			redirect('memberlogin','refresh');
		}
	}
	

	public function welcomeletter()
	{
		if($this->session->userdata('user_data'))
		{	$session = $this->session->userdata('user_data');
			//echo "welcome letter";
			$customerId = $this->input->post('cus_id',TRUE);
			
			$result["rowMember"] = $this->dashboardmodel->getMember($customerId);
			$branch_code=$result["rowMember"]->CUS_BRANCH;	
			$card_code=	$result["rowMember"]->CUS_CARD;	
			$where_card_code = array(
					"card_master.CARD_CODE" => $result["rowMember"]->CUS_CARD
				);
			
			$result["rowCard"] = $this->insertupdatemodel->getSingleRowByWhereCls('card_master',$where_card_code);
			$card_desc=$result["rowCard"]->CARD_DESC;
		    $cardID=$result["rowCard"]->CARD_ID;

			if ($branch_code=="CM")
				{
					$result["mobile"]="9007763533";
				}

			if ($branch_code=="BP")
				{
					$result["mobile"]="9748488321";
				}

			if ($branch_code=="SN")
				{
					$result["mobile"]="9007605628";
				}

	   		
       $result['workoutDtl'] =  $this->dashboardmodel->getWorkOutFacility($cardID,$branch_code);
       $result['complDtl'] =  $this->dashboardmodel->getComplFacilityDetailByBranch($cardID,$branch_code);

     

       $health_group=[];
       $healthandfitness=[];
       $p=0;

       $health_group[0]= array('group' => "GEN MED",'group_name' => "GENERAL MEDICAL ASSESSMENT");
       $health_group[1]= array('group' => "GEN FIT",'group_name' => "GENERAL FITNESS ASSESSMENT");
       $health_group[2]= array('group' => "ORTHO",'group_name' => "ORTHOPEDIC SCREENING");
       $health_group[3]= array('group' => "BODY COMP",'group_name' => "BODY COMPOSITION ASSESSMENT");
       $health_group[4]= array('group' => "BLOOD TEST",'group_name' => "BLOOD TEST");

       foreach ($health_group as $health_group) {

      // echo "<br>".$health_group['group'];
      // echo "<br>".$health_group['group_name'];
       	$row_health_result=$this->dashboardmodel->getHealthAndFitnessFacility($cardID,$branch_code,$health_group['group']);

	       if (sizeof($row_health_result)>0) {
		       	foreach ($row_health_result as $health_result) {
		       		 $qty=$health_result['HF_qty'];
		       		 $HF_coupon_title=$health_result['HF_coupon_title'];
		       		
		       	}

		         //	echo "<br>".$qty;
		       	//echo "<br>".$health_group['group_name'];

		       	$healthandfitness[$p]= array('qty' => $qty,'group_name' => $health_group['group_name']);
		       	$p++;
	       }

     
       }

        $result["healthandfitness"]=$healthandfitness;
       
		 	

			/*echo "<pre>";
			print_r($result["healthandfitness"]);
			//print_r($healthandfitness);
			echo "</pre>";
			exit;*/
			

			$page = 'memberdashboard/welcome_letter';
			$display = $this->load->view($page,$result);
			echo $display;

			
			



		}
		else
		{
			redirect('memberlogin','refresh');
		}
	}
	
//***************************** Receipt Gst ******************************	
	public function receiptgst()
	{
		if($this->session->userdata('user_data'))
		{	$session = $this->session->userdata('user_data');
			//echo "Receipt Gst";
			 $customerId = $this->input->post('cus_id',TRUE);
			 $membership = $this->input->post('membership',TRUE);
			 $payment_id = $this->input->post('payment_id',TRUE);

			$where_paymentid = array(
					"payment_master.PAYMENT_ID" => $payment_id
				);
			
		    $result["rowPayment"] = $this->insertupdatemodel->getSingleRowByWhereCls('payment_master',$where_paymentid);

		    $paymentID=$result["rowPayment"]->PAYMENT_ID;
		    $result['corporate_comp_id'] = $result["rowPayment"]->corporate_comp_id;
		    $comp = $result["rowPayment"]->company_id;
		    $result['brn']=$brn=$result["rowPayment"]->BRANCH_CODE;
			$pybl_amt=$result["rowPayment"]->PRM_AMOUNT;
			$basic_amt=$result["rowPayment"]->AMOUNT;
		    $tax_rate=$result["rowPayment"]->SERVICE_TAX;
		    $tot_amt=$result["rowPayment"]->TOTAL_AMOUNT;
			//$tax_amt=($tot_amt-$basic_amt);
		    $result['pmt_dt']=date("d-m-Y",strtotime($result["rowPayment"]->PAYMENT_DT));
			$pack_cd=$result["rowPayment"]->CARD_CODE;
		    $chq_no=$result["rowPayment"]->CHQ_NO;
		    $chq_dt=$result["rowPayment"]->CHQ_DT;
		    $bank=$result["rowPayment"]->BANK_NAME;
			
			$due_amt=$result["rowPayment"]->DUE_AMOUNT;
			$paid_by = $result["rowPayment"]->PAYMENT_MODE;
			$userId = $result["rowPayment"]->USER_ID;
			$valid_string=$result["rowPayment"]->VALIDITY_STRING;

	       $result['valid_str_prn']="(".date("d-m-Y",strtotime($result["rowPayment"]->FROM_DT)) . " - " . date("d-m-Y",strtotime($result["rowPayment"]->VALID_UPTO)).")";

		    $result["rowMember"] = $this->dashboardmodel->getMember($customerId);
		    $result['mem_no']=$mem_no=$result["rowMember"]->MEMBERSHIP_NO;
            $result['mem_nm']=$result["rowMember"]->CUS_NAME;
            $result['memName']=$result["rowMember"]->CUS_NAME;
	        $result['add']=$result["rowMember"]->CUS_ADRESS;
		    $gender = $result["rowMember"]->CUS_SEX;
		    $maritalStatus=$result["rowMember"]->CUS_MS;

		    $result['title_tag'] = "";
			if($gender=="M")
			{
				$result['title_tag'] = "Mr.";
			}

			if($gender=="F")
			{
				if($maritalStatus=="M")
				{
				$result['title_tag'] = "Mrs.";
				}
				if($maritalStatus=="S")
				{
				$result['title_tag'] = "Ms.";
				}
			}


			 $pack_cd=$result["rowPayment"]->CARD_CODE;

			$where_card_code = array(
					"card_master.CARD_CODE" => $pack_cd
				);
			
			$result["rowCard"] = $this->insertupdatemodel->getSingleRowByWhereCls('card_master',$where_card_code);
		    $result['card_desc']=$card_desc=$result["rowCard"]->CARD_DESC;
		    $cardID=$result["rowCard"]->CARD_ID;
		    $total_days = $result["rowCard"]->CARD_ACTIVE_DAYS;

			$rowCgstRate = $this->dashboardmodel->getGSTRateByID('CGST',$result["rowPayment"]->CGST_RATE_ID);
	
			foreach($rowCgstRate as $row_cgst)
			{
				$cgstRate = $row_cgst->rate;
			}
			$cgstAMT = $result["rowPayment"]->CGST_AMT;

			$rowSgstRate = $this->dashboardmodel->getGSTRateByID('SGST',$result["rowPayment"]->SGST_RATE_ID);

			foreach($rowSgstRate as $row_sgst)
			{
				$sgstRate = $row_sgst->rate;
			}
			$sgstAMT = $result["rowPayment"]->SGST_AMT;

			if($cgstAMT>0 && $sgstAMT>0)
			{
				$invoice_hd = "Tax Invoice";
				$result['invoice_hd']=$invoice_hd;
			}
			else
			{
				$invoice_hd = "Invoice";
				$result['invoice_hd']=$invoice_hd;
			}


           //echo "<br>".$invoice_hd;

			if($result['corporate_comp_id']>0)

			{		
				$where_corporate_comp_id = array(
					"corporate_company.id" => $result['corporate_comp_id']

				);
				$rowCorpComp = $this->insertupdatemodel->getSingleRowByWhereCls('corporate_company',$where_corporate_comp_id);
				
				
					$result['mem_nm'] = $corp_comp->company_name;
					$result['add'] = $corp_comp->gistn_no;
					$result['addTitle'] = "GISTN";
				
				$result['title_tag'] = "";
			}
			else
			{
				$result['addTitle'] = "Add";
			}

			/**Company Info***/
			$where_comany_id = array(
					"company_master.comany_id" => $comp
				);

			$rowCompany =  $this->insertupdatemodel->getSingleRowByWhereCls('company_master',$where_comany_id);
			
			$company_name=$rowCompany->company_name;
			$result['gistn_NO']=$rowCompany->GISTN_no;

			/********USER INFO*********/
			$where_user_id = array(
					"employee_master.empl_id" => $userId

				);

			$rowUser = $this->insertupdatemodel->getSingleRowByWhereCls('employee_master',$where_user_id);
		    $user_name = $rowUser->empl_name;


		    $where_payment_id = array(
					"payment_master.PAYMENT_ID" => $paymentID

				);

			$rowRcpt=$this->insertupdatemodel->getSingleRowByWhereCls('payment_master',$where_payment_id);

              $rcpt_no=$rowRcpt->RCPT_NO;
              $result['rcpt_no_str']=$this->gen_rcpt_no_pad($rcpt_no,$brn);

              


		

			$rowPaid=$this->dashboardmodel->getPaymentByValidity($mem_no,$valid_string);

			$tot_paid = 0;


			foreach($rowPaid as $row_paid)
			{
				$tot_paid=$tot_paid+$row_paid->AMOUNT;
			}



			//-------------------------------------------------------------


			
		  $subscriptionAmt = $result["rowPayment"]->PRM_AMOUNT;
			
			//$rowCard = $obj_reg_inc->GetCardByCode($row_pmt['CARD_CODE']);
			
				
					//$card_desc = $row_card['CARD_DESC'];
					//$total_days = $row_card['CARD_ACTIVE_DAYS'];
		     $result['cgst_amt']= $result["rowPayment"]->CGST_AMT;
		     $result['sgst_amt']= $result["rowPayment"]->SGST_AMT;
		     $result['total_amt']= $result["rowPayment"]->TOTAL_AMOUNT;

					
			$result['amount_for_dy'] =$this->getPackagePaymentForDay($subscriptionAmt,$result["rowPayment"]->AMOUNT,$total_days);
				
			$result['rate'] = $result["rowPayment"]->AMOUNT+$result["rowPayment"]->DISCOUNT_CONV+$result["rowPayment"]->DISCOUNT_OFFER+$result["rowPayment"]->DISCOUNT_NEGO+$result["rowPayment"]->CASHBACK_AMT;
			$result['disc'] = $result["rowPayment"]->DISCOUNT_CONV+$result["rowPayment"]->DISCOUNT_OFFER+$result["rowPayment"]->DISCOUNT_NEGO+$result["rowPayment"]->CASHBACK_AMT; 
			
		    $fig_in_words =$this->no_to_words($result["rowPayment"]->TOTAL_AMOUNT);
		   // $fig_in_words =$this->convert_number($result["rowPayment"]->TOTAL_AMOUNT);
			
			$result['fig_in_words'] = rtrim($fig_in_words,' & ');
			//-------------------------------------------------------------


			
		    /*echo "<pre>";
			print_r($result["rowPayment"]);
			echo "</pre>";*/
			
    
			

			$page = 'memberdashboard/receipt_gst';
			$display = $this->load->view($page,$result);
			echo $display;

			
			



		}
		else
		{
			redirect('memberlogin','refresh');
		}
	}
//***********************************************************	



	
	
	
	/*
	public function getMacAddress()
	{
		ob_start(); 
		system('ipconfig /all');
		$mac = ob_get_contents();
		ob_clean();
		
		
		$name = "Physical";
		$pmac = strpos($mac,$name);
		$macAddress = substr($mac,($pmac+36),17);
		//echo "Mac Address<br>";
		//echo $mac;
		
		//echo "****fdf****<br>";
		//echo $pmac+36;
		
		//echo "********<br>";
		echo $macAddress;
	}*/

/*----------------------------Functions For Payment Recept-------------------*/
	   public function gen_rcpt_no_pad($srl,$brn)
				{
					$srl_len=strlen($srl);
				    $rem_len=8-$srl_len;

				    for ($i=1; $i<=$rem_len; $i++)
				    {
					    $zero=@$zero."0";
				    }
					if($brn=="LT")
					{
					    $mSrl_no="SM".$zero.$srl;
					}
					else
					{
					    $mSrl_no="MH".$zero.$srl;
					}
				   	return $mSrl_no;
				}


	public function getPackagePaymentForDay($subsAmt,$amtpaid,$ttldys)
	{
		$payment_for_days = 0;
		$payment_for_days = ($ttldys*$amtpaid)/$subsAmt;
		$payment_for_days = ceil($payment_for_days);
		return $payment_for_days;
	}
	
	public function no_to_words($no) {
		
        $words = array('0' => '', 
            '1' => 'one',
            '2' => 'two', 
            '3' => 'three', 
            '4' => 'four', 
            '5' => 'five', 
            '6' => 'six', 
            '7' => 'seven', 
            '8' => 'eight', 
            '9' => 'nine', 
            '10' => 'ten', 
            '11' => 'eleven',
            '12' => 'twelve', 
            '13' => 'thirteen', 
            '14' => 'fourteen', 
            '15' => 'fifteen', 
            '16' => 'sixteen', 
            '17' => 'seventeen', 
            '18' => 'eighteen', 
            '19' => 'nineteen', 
            '20' => 'twenty', 
            '30' => 'thirty', 
            '40' => 'fourty', 
            '50' => 'fifty', 
            '60' => 'sixty',
            '70' => 'seventy', 
            '80' => 'eighty', 
            '90' => 'ninty',
            '100' => 'hundred &', 
            '1000' => 'thousand', 
            '100000' => 'lakh', 
            '10000000' => 'crore');
        if ($no == 0)
            return ' ';
        else {
            $novalue = '';
            $highno = $no;
            $remainno = 0;
            $value = 100;
            $value1 = 1000;
            while ($no >= 100) {
                if (($value <= $no) && ($no < $value1)) {
                    $novalue = $words["$value"];
                    $highno = (int) ($no / $value);
                    $remainno = $no % $value;
                    break;
                }
                $value = $value1;
                $value1 = $value * 100;
            }
            if (array_key_exists("$highno", $words))
                return $words["$highno"] . " " . $novalue . " " .$this->no_to_words($remainno);
            else {
                $unit = $highno % 10;
                $ten = (int) ($highno / 10) * 10;
                return $words["$ten"] . " " . $words["$unit"] . " " . $novalue . " " .$this->no_to_words($remainno);
            }
        }
    }


	public function getCalorieHistory(){
		if($this->session->userdata('user_data')){
			$response = [];
			
			$session = $this->session->userdata('user_data');
			$mem_acccode = trim($this->input->post('membership',TRUE));
			$type = trim($this->input->post('type',TRUE));
			//$mem_acccode = 'M009602';
			$currdate = date("Y-m-d");
			$wkID = $this->dashboardmodel->getWeekByDate($currdate)->id;
			//$wkID = 33;
			
			
			$month_start_dt = date('01-m-Y'); 
			$month_end_dt  = date('t-m-Y');
			
			
			if($type == "DAILY"){
				$dataResult = $this->dashboardmodel->getDailyCalorieConsumedHistory($mem_acccode,$month_start_dt,$month_end_dt);	
			}
			else if($type == "WEEKLY"){
				$fromDate = $this->getDateByMonth(date("Y-m-d"),4);
				$newDate = date("d-m-Y",strtotime("01-".$fromDate));
				$dataResult = $this->dashboardmodel->getWeeklyCalorieConsumedHistory($mem_acccode,$newDate,$month_end_dt);
			}
			else{
				$fromDate = $this->getDateByMonth(date("Y-m-d"),4);
				$newDate = date("d-m-Y",strtotime("01-".$fromDate));
				$dataResult = $this->dashboardmodel->getMonthlyCalorieConsumedHistory($mem_acccode,$newDate,$month_end_dt);
			}
			
			

		
			$caloriGivenValue = $this->dashboardmodel->getTargetCalorieGivenValue($mem_acccode,$wkID);
			$weeklyCalorie = $this->dashboardmodel->getCurrWkCalorieConsumed($mem_acccode,$wkID);
		
			$response = [
				"result" => $dataResult,
				"calorieGivenValue" => $caloriGivenValue,
				"weeklycalorie" => $weeklyCalorie,
				"dateFrom" => $this->getDateByModeAndDays($currdate,"SUB",3),
				"dateTo" => $this->getDateByModeAndDays($currdate,"ADD",4)

			];
			
			header('Content-Type:application/json');
			echo json_encode($response);
			exit;
				
		}
		else{
			redirect('memberlogin','refresh');
		}
	}
	
	
	
	private function getDateByMonth($date,$monthduration){
		$newdate = date("m-Y", strtotime("-".$monthduration." months"));
		return $newdate;
	}


	private function getDateByModeAndDays($date,$mode,$dayno){
		$date_detail = [];

		
		if($mode == "ADD") {
			$newDate =  date('Y-m-d', strtotime($date. ' + '.$dayno.' days'));
		}
		else{
			$newDate =  date('Y-m-d', strtotime($date. ' - '.$dayno.' days'));
		}
		$date_detail = [
			"YEAR" => date('Y',strtotime($newDate)),
			"MONTH" => date('n',strtotime($newDate)),
			"DAY" => date('d',strtotime($newDate))
		];
		return $date_detail;
	}

 public function walletdetails(){   // added by anil on 12.09.2019

 	if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'wallet/wallet-details-view';
            $header ="";

            $mobileNumber = $this->walletmodel->getMobileNumber($customerId);
           
            $result['promoamount'] = $this->walletmodel->getPromocash($mobileNumber['CUS_PHONE']);

            $result['cashback'] = $this->walletmodel->getCashBack($mobileNumber['CUS_PHONE']);

           $result['totalwalletcash'] = $this->walletmodel->gettotalwalletcash($mobileNumber['CUS_PHONE']);
           
             $result['promodetails'] = $this->walletmodel->getpromodetails($mobileNumber['CUS_PHONE']);
            //print_r($result['promodetails'])  ;exit;
           
			
			
			createbody_method($result, $page, $header, $session);
			
		}else{
			redirect('memberlogin','refresh');
		}

 }
 
 




 
/*-----------------------------------------------*/

 /*
* @param1 : Plain String
* @param2 : Working key provided by CCAvenue
* @return : Decrypted String
*/
public function encrypt($plainText,$key)
{
	$encryptionMethod = "AES-128-CBC";
	$secretKey        = $this->hextobin(md5($key));
	$initVector       = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
	$encryptedText    = openssl_encrypt($plainText, $encryptionMethod, $secretKey, OPENSSL_RAW_DATA, $initVector);
	return bin2hex($encryptedText);

}

/*
* @param1 : Encrypted String
* @param2 : Working key provided by CCAvenue
* @return : Plain String
*/
public function decrypt($encryptedText,$key)
{
	$encryptionMethod 	= "AES-128-CBC";
	$secretKey 		=  $this->hextobin(md5($key));
	$initVector 		=  pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
	$encryptedText  	=  $this->hextobin($encryptedText);
	$decryptedText 		=  openssl_decrypt($encryptedText, $encryptionMethod, $secretKey, OPENSSL_RAW_DATA, $initVector);
	return $decryptedText;
}

public function hextobin($hexString) 
{ 
	$length = strlen($hexString); 
	$binString="";   
	$count=0; 
	while($count<$length) 
	{       
		$subString =substr($hexString,$count,2);           
		$packedString = pack("H*",$subString); 
		if ($count==0)
		{
			$binString=$packedString;
		} 
		else 
		{
			$binString.=$packedString;
		} 
		$count+=2; 
	} 
	return $binString; 
}


/* call from sms renewal */

    public function smsrenew() {
			$this->load->library('session');
		 
			if($this->uri->segment(3) == TRUE){
				$custID =  $this->uri->segment(3);
				$result =  $this->memberloginmodel->checkMemberByCusID($custID);
				$this->session->set_userdata("user_data",$result);
			}
			else{
				$custID = 0;
			}
			
		
        if($this->session->userdata('user_data') && $custID > 0) {
			
            $session = $this->session->userdata('user_data');
		//	print_r($session);
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            
			$packageExpmsg="";
            $page = 'memberdashboard/memberdashboard_second';
            $membershipNumber = $this->profilemodel->getMembershipNumber($customerId);
           // $latestvalidity = $this->profilemodel->getValidityString($membershipNumber);/* commented on 17.05.2019 */
            $latestvalidity = $this->profilemodel->getActiveValidityString($membershipNumber);
            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
            
            $validityString = $fromdate." - ".$todate;
            $grantDays = $this->dashboardmodel->getExtensionDays($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
            $validupto = date('Y-m-d',  strtotime($todate));
            $validfrom = date('Y-m-d',  strtotime($fromdate));
            $totalExtentiondate = date('Y-m-d',strtotime($validupto. ' +'.$grantDays.' days'));
			$currentDate =date('Y-m-d');
			if($currentDate < $totalExtentiondate){
				$packageExpmsg = "Days left for expired";
			}
			else{
					$packageExpmsg = " Package Expired";
			}
			
            $date1 = DateTime::createFromFormat('Y-m-d', $totalExtentiondate);
            $date2 = DateTime::createFromFormat('Y-m-d', $currentDate);

            $diffDays = $date2->diff($date1)->format("%a");
			
            $subscriptionamount = $this->profilemodel->getSubscriptionAmountOfMember($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
            $paidAmount = $this->profilemodel->getPaidAmount($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
            
            
          //  getAttendanceRate($fromDate,$validUpto,$memberNo)
            $customer = $this->profilemodel->getCustomerByCustId($customerId);
			$customermobile=$customer["CUS_PHONE"];
			$member_Acc_code = $customer["ACC_CODE"];
			
			
			$profilepic = array(
						"gender" => $customer['CUS_SEX'],
						"profile_image" => $customer['image_name']
						);
            
			
            
            $header = "";
            
            $result["cashbackdata"] = $this->dashboardmodel->getMemberCashBackPoint($membershipNumber,$validityString);
           //$result['totalwalletcash'] = $this->walletmodel->gettotalwalletcash($customermobile);
             //$result['totalwalletcash'] = $this->walletmodel->gettotalwalletcashByMemberaccCode($member_Acc_code);

            $result['promoamount'] = $this->walletmodel->getPromocashByMemberaccCode($member_Acc_code);
            $result['cashback'] = $this->walletmodel->getCashBackByMemberaccCode($member_Acc_code);
            $result['totalwalletcash'] = $result['cashback'] + $result['promoamount'];

            $result["packagExpirystatus"]=$packageExpmsg;
            $result["remain"]=$diffDays;
            $result["validupto"]=$todate;
            $result["attpercentage"]=  $this->dashboardmodel->getAttendanceRate($validfrom,$validupto,$membershipNumber);
            $result["paymentdue"] = ($subscriptionamount - $paidAmount);
            $result["packagehistory"] = $this->dashboardmodel->getPackageHistory($customermobile,$latestvalidity["VALIDITY_STRING"]);  
			$result["activePackages"] = $this->dashboardmodel->getActivepackages($customermobile);
			$result["advancePackage"] = $this->dashboardmodel->getAdvancepackages($customermobile);
			$result["havdata"]=$this->healthassetvaluemodel->getLatestHAVdata($membershipNumber,$validityString);
			$result['profile_img'] = $profilepic;
			$result['memacccode'] = $member_Acc_code; // added by mkr on 09.08.2019
			
           
			

			/* qrcode creations */

			$qrtext = $customermobile;
			if(isset($qrtext))
			{
	
				//file path for store images
				$SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'];
				
			//	$SERVERFILEPATH = base_url().'application/images/memberQrcode/';
			
				//local
			//	$SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/MantraproNew/memberpanel/application/images/memberQrcode/';

				//server
			$SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/memberpanel/application/images/memberQrcode/';
			   
				$text = $qrtext;
				
				$text1= substr($text, 0,9);
				
				$folder = $SERVERFILEPATH;
				$file_name1 = $text1. ".png";
				$file_name = $folder.$file_name1;
				QRcode::png($text,$file_name,"L",8,4);
				
				$result['qrcode_img']=$file_name1;
			}

		 redirect('memberdashboard/renewpackage', 'refresh');
            
            createbody_method($result, $page, $header, $session);
            //($body_content_data = '',$body_content_page = '',$body_content_header='',$data,$heared_menu_content='')
        } else {
			//echo "exit block";
            redirect('memberlogin', 'refresh');
        }
    }







}
?>