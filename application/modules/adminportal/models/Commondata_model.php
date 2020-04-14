<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Commondata_model extends CI_Model{

	public function __construct()
	{
        parent::__construct();
        $this->load->model('adminportal/Auth_model', '_authModel',TRUE);
    }
	
	public function insertSingleTableData($table,$data){
            $lastinsert_id = 0;
        try {
            $this->db->trans_begin();

            $this->db->insert($table, $data);
           
            $lastinsert_id = $this->db->insert_id();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $lastinsert_id=0;
                return $lastinsert_id;
            } else {
                $this->db->trans_commit();
                return $lastinsert_id;
            }
        } catch (Exception $err) {
            echo $err->getTraceAsString();
        }
    }
    
    public function updateSingleTableData($table,$data,$where){

        
        try {
            $this->db->trans_begin();
            //$this->db->where($where);
			$this->db->update($table, $data,$where);
			//$affectedRow = $this->db->affected_rows();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                
                return FALSE;
            } else {
                $this->db->trans_commit();
                
                return TRUE;
            }
        } catch (Exception $exc) {
             return FALSE;
        }
    }
    
    public function deleteTableData($table,$where)
    {
        $this->db->delete($table, $where); 
    }

	/* 
		@insertMultiTableData('name of table array','insert value as array')
		@date 14.11.2017
		@By Mithilesh
	*/
	
	public function insertMultiTableData($tblnameArry,$insertArray){
		try{
            $this->db->trans_begin();
			
			for($i=0;$i<sizeof($insertArray);$i++)
			{
				 $this->db->insert($tblnameArry[$i], $insertArray[$i]);
				 
			}
			if($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
		catch (Exception $err) {
            echo $err->getTraceAsString();
        }
	}
	
	
	public function checkExistanceData($table,$where)
	{
		
		$this->db->select('*')
				->from($table)
				->where($where);
		$query = $this->db->get();
		// echo $this->db->last_query();
		 //exit;
		// echo "<br>";
		if($query->num_rows()>0){
			return TRUE;
		}
		else
		{
			return FALSE;
		}
		
	}
	
	public function getAllDropdownData($table)
	{
		$data = array();
		$this->db->select("*")
				->from($table);
		$query = $this->db->get();
		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
			{
				$data[] = $rows;
            }
            return $data;
             
        }
		else
		{
             return $data;
         }
	}
	
	public function getSingleRowByWhereCls($table,$where)
	{
		$data = array();
		$this->db->select("*")
				->from($table)
				->where($where)
				->limit(1);
		$query = $this->db->get();
		
		// echo $this->db->last_query();
		// echo "<br>";
		
		if($query->num_rows()> 0)
		{
           $row = $query->row();
           return $data = $row;
             
        }
		else
		{
            return $data;
        }
	}
	
	
	public function getAllRecordWhere($table,$where)
	{
		$data = array();
		$this->db->select("*")
				->from($table)
				->where($where);
		$query = $this->db->get();
		#echo $this->db->last_query();

		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
			{
				$data[] = $rows;
            }
            return $data;
             
        }
		else
		{
             return $data;
         }
	}


		
	public function getAllRecordWhereNotIn($table,$ignorarray=[])
	{  
		$data = array();
		$this->db->select("*")
				->from($table)
				->where_not_in('id',$ignorarray);
		$query = $this->db->get();
		#echo $this->db->last_query();

		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
			{
				$data[] = $rows;
            }
            return $data;
             
        }
		else
		{
             return $data;
         }
	}

	public function getAllRecordWhereIN($table,$wherecol,$inarray=[])
	{  
		$data = array();
		$this->db->select("*")
				->from($table)
				->where_in($wherecol,$inarray);
		$query = $this->db->get();
		//echo $this->db->last_query();

		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
			{
				$data[] = $rows;
            }
            return $data;
             
        }
		else
		{
             return $data;
         }
	}

	public function getAllRecordWhereOrderBy($table,$where,$orderby)
	{
		$data = array();
		$this->db->select("*")
				->from($table)
				->where($where)
				->order_by($orderby);
		$query = $this->db->get();
		//echo $this->db->last_query();

		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
			{
				$data[] = $rows;
            }
            return $data;
             
        }
		else
		{
             return $data;
         }
	}

	public function getAllRecordOrderByLike($table,$likecolumn,$likeStr,$orderby,$ordertag)
	{
		$data = array();
		$this->db->select("*")
				->from($table)
				->like($likecolumn,$likeStr,'after')
				->order_by($orderby,$ordertag);
		$query = $this->db->get();
		//echo $this->db->last_query();

		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
			{
				$data[] = $rows;
            }
            return $data;
             
        }
		else
		{
             return $data;
         }
	}


	public function getAllRecordOrderByLikeWhere($table,$where,$likecolumn,$likeStr,$orderby,$ordertag)
	{
		$data = array();
		$this->db->select("*")
				->from($table)
				->where($where)
				->like($likecolumn,$likeStr,'after')
				->order_by($orderby,$ordertag);
		$query = $this->db->get();
		//echo $this->db->last_query();

		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
			{
				$data[] = $rows;
            }
            return $data;
             
        }
		else
		{
             return $data;
         }
	}

	public function getAllRecordOrderBy($table,$orderby,$orderTag)
	{
		$data = array();
		$this->db->select("*")
				->from($table)
				->order_by($orderby,$orderTag);
		$query = $this->db->get();
		//echo $this->db->last_query();

		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
			{
				$data[] = $rows;
            }
            return $data;
             
        }
		else
		{
             return $data;
         }
	}

	public function getAllWhereOrderByLimitTo($table,$where,$orderby,$orderTag,$limit)
	{
		$data = array();
		$this->db->select("*")
				->from($table)
				->where($where)
				->order_by($orderby,$orderTag)
				->limit($limit);
		$query = $this->db->get();
		//echo $this->db->last_query();

		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
			{
				$data[] = $rows;
            }
            return $data;
             
        }
		else
		{
             return $data;
         }
	}

	/*
	@updateData_WithUserActivity('update table name','update table data','update table where condition','user activity table name','user activity table data');
	*/
	public function updateData_WithUserActivity($upd_tbl_name,$upd_data,$upd_where,$user_actvty_tbl,$user_actvy_data)
	{
		 try {
            $this->db->trans_begin();
			$this->db->where($upd_where);
            $this->db->update($upd_tbl_name,$upd_data);
         //   echo $this->db->last_query();
			$this->db->insert($user_actvty_tbl, $user_actvy_data);
			
			
				
            if($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
		catch (Exception $err) {
            echo $err->getTraceAsString();
        }
	}


	/* fetching Data For All type of document from any module
	*  @getDocumentDetailData('where upload_from_module_id,upload_from_module');
	*  On 23.01.2018
	*  By Mithilesh
	*/

	public function getDocumentDetailData($where)
	{

		$data = array();
		$this->db->select("*")
				->from('document_upload_all')
				->join('document_type','document_type.id = document_upload_all.document_type_id','INNER')
				->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();

		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
			{
				$data[] = $rows;
            }
            return $data;
             
        }
		else
		{
             return $data;
         }

	}


	public function rowcount($table)
	{
		
		$this->db->select('*')
				->from($table);

		$query = $this->db->get();
		$rowcount = $query->num_rows();
	
		if($query->num_rows()>0){
			return $rowcount;
		}
		else
		{
			return 0;
		}
		
	}
        /**
         * @author Abhik
         * @param type $table
         * @param type $column
         * @param type $dataType
         * @return boolean
         */
        
        public function duplicateValueCheck($table="",$where="")
        {
            
            $query = $this->db->select("*")->from($table)->where($where)->get();
            #echo $this->db->last_query();
            if($query->num_rows()>0){
			return TRUE;
		}
		else
		{
			return FALSE;
		}
            
            
        }


        public function insertSingleTableDataRerurnInsertId($table,$data){
		
			$this->db->insert($table, $data);
		    $insert_ID = $this->db->insert_id();
            return $insert_ID;
	    }
	

		/**
		 * @By = Mithilesh on 11/11/2019
		 * @module = "action module"
		 * @desc = "activity_desc"
		 * @action = "action type EDIT,VIEW,INSERT,DELETE,LOGIN_SUCCESS,LOGIN_FAILED,INSERT_ERROR"
		 * 
		 */

		function insertUserActivityData($module,$desc=null,$action,$masterid=0)
		{
			$userid = 0;
			if($this->_authModel->logged_user_info()['userid']>0) {
				$userid = $this->_authModel->logged_user_info()['userid'];
			};

			$activity = [];
			
			$activity = [
				"activity_url" => getCurrentUrl(),
				"activity_module" => $module,
				"activity_desc" => $desc,
				"activity_action" => $action,
				"master_id" => $masterid,
				"ip" => getUserIPAddress(),
				"browser" => getUserBrowserName(),
				"platform" => getUserPlatform(),
				"user_id" => $userid
			];      
			
			try{
				$this->db->trans_begin();
				$this->db->insert('activity_log', $activity);
				if($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
					return false;
				} else {
					$this->db->trans_commit();
					return true;
				}
			}
			catch (Exception $err) {
				echo $err->getTraceAsString();
			}
		}
	
		
		/**
		 * @By Mithilesh
		 * @On 25.11.2019
		 * @Method getmultiTableDataByJoin
		 * @param Desc
		 * @1stParam table = TYPE: String , Desc= name of table for from table EX: SELECT * FROM test_table
		 * @2ndParam join_tables = TYPE: Array , Desc = provide tables array for joining in form of array
		 * @3rdParam join_condition = TYPE: Array , Desc = provide joining condition in form of array 
		 * @4thParam join_type = TYPE: Array , Desc = provide joining type in form of array 
		 * @5thParam where = TYPE: Array , Desc = provide where conditions in form of array
		 */
		public function getmultiTableDataByJoin($table_from,$join_tables,$join_condition,$join_type,$where) {
		
			$this->db->select("*");
			$this->db->from($table_from);
			for($i=0;$i<count($join_tables);$i++) {
				$this->db->join($join_tables[$i],$join_condition[$i],$join_type[$i]);
			}
			$this->db->where($where);
			$query = $this->db->get();
			//echo $this->db->last_query();
			if($query->num_rows()> 0)
			{
				foreach ($query->result() as $rows)
				{
					$data[] = $rows;
				}
				return $data;
				
			}
			else
			{
				return $data;
			}
		}


		public function getmultiTableDataByJoinOrderBy($table_from,$join_tables,$join_condition,$join_type,$where,$order_by) {
			$data = [];
			$this->db->select("*");
			$this->db->from($table_from);
			for($i=0;$i<count($join_tables);$i++) {
				$this->db->join($join_tables[$i],$join_condition[$i],$join_type[$i]);
			}
			$this->db->where($where);
			$this->db->order_by($order_by);
			$query = $this->db->get();
		//	echo $this->db->last_query();
			if($query->num_rows()> 0)
			{
				foreach ($query->result() as $rows)
				{
					$data[] = $rows;
				}
				
				
			}
			
				return $data;
			
		}
		public function getmultiTableDataByJoinOrderByAliasSelect($table_from,$join_tables,$join_condition,$join_type,$where,$order_by,$alias_columns=null) {
			$data = [];
			$this->db->select("*");
			if($alias_columns){
				$this->db->select($alias_columns);
			}
			
			$this->db->from($table_from);
			for($i=0;$i<count($join_tables);$i++) {
				$this->db->join($join_tables[$i],$join_condition[$i],$join_type[$i]);
			}
			$this->db->where($where);
			$this->db->order_by($order_by);
			$query = $this->db->get();
		//	echo $this->db->last_query();
			if($query->num_rows()> 0)
			{
				foreach ($query->result() as $rows)
				{
					$data[] = $rows;
				}
				
				
			}
			
				return $data;
			
		}

		public function getmultiTableDataByJoinOrderByLimitTo($table_from,$join_tables,$join_condition,$join_type,$where,$order_by,$limit) {
			$data = [];
			$this->db->select("*");
			$this->db->from($table_from);
			for($i=0;$i<count($join_tables);$i++) {
				$this->db->join($join_tables[$i],$join_condition[$i],$join_type[$i]);
			}
			$this->db->where($where);
			$this->db->order_by($order_by);
			$this->db->limit($limit);
			$query = $this->db->get();
		//	echo $this->db->last_query();
			if($query->num_rows()> 0)
			{
				foreach ($query->result() as $rows)
				{
					$data[] = $rows;
				}
			}
			return $data;
			
		}
	
}