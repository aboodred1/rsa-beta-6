<?php

	class DBVariables
	{
		public static $mysql_hostname = "localhost";
		public static $mysql_username = "root";
		public static $mysql_password = "";
		public static $mysql_database = "rsa_beta";

		function __construct()
		{
			
		}
	}

	/*************************************************************************/
	
	class DBConnection
	{
		var $link;
		var $errors = array();
		var $debug = false;
		
		function __construct()
		{
			
		}
		
		function connect($host,$name, $pass, $db)
		{
			$link = @mysql_connect($host,$name,$pass,$db);
			if(!$link)
			{
				$this->setError("Couldn't connect to database server");
				return false;
			}
			
			if(!@mysql_select_db($db,$link))
			{
				$this->setError("Couldn't select database");
				return false;
			}
			
			$this->link = $link;
			return true;
		}
		
		function getResource()
		{
			return $this->link;
		}
		
		function getError()
		{
			if($this->debug) 
				return $this->errors[count($this->errors)-1];
				
			return "";
		}
		
		function setError($str)
		{
			array_push($this->errors,$str);
		}
		
		function disConnect()
		{
			mysql_close($this->link);
		}
		
		function __destruct()
		{
			
		}
	}
	
	/*************************************************************************/

	class DataLayer
	{
		var $link;
		var $errors = array();
		var $debug = false;
		
		function __construct($link)
		{
			$this->link = $link;
		}
		
		function DataLayer($link)
		{
			$this->link = $link;
		}
		
		/**********************************************/
		
		function setConnect($link)
		{
			$this->link = $link;
		}
		
		/**********************************************/
		
		function getResource()
		{
			return $this->link;
		}
		
		/**********************************************/
		
		function getError()
		{
			return $this->errors[count($this->errors)-1];
		}
		
		/**********************************************/
		
		function setError($str)
		{
			array_push($this->errors,$str);
		}
		
		/**********************************************/
		
		function _query($query)
		{
			if(!$this->link)
			{
				$this->setError("No Active db Connection");
				return false;
			}
			$result = mysql_query($query,$this->link);
			

			
			if(!$result)
			{
				$this->setError("error: ".mysql_error());
				return false;
			}
			
			return $result;
		}
		
		/**********************************************/
		
		function setQuery($query)
		{
			if(!$result = $this->_query($query))
			{
				return false;
			}
			
			return mysql_affected_rows($this->link);
		}
		
		/**********************************************/
		
		function getQuery($query)
		{
			$query_return = array();

			if(!$result = $this->_query($query))
			{
				return false;
			}
			
			while ($query_return[] = mysql_fetch_array($result));

			mysql_free_result($result);
			
			return $query_return;
		}
		
		/**********************************************/
		
		
		function select($query,$condition,$order,$limit)
		{
			$sql = $query;
			$sql .= $this->_makeWhereList($condition);
			$sql .= $this->_makeOrderBy($order);
			$sql .= $this->_makeLimit($limit);
			//$sql .= ";";
			
			$this->debug($sql);
			
			return $this->getQuery($sql);
		}
		
		/**********************************************/
		
		function insert($table, $add_array)
		{
			$add_array = $this->_quota_vals($add_array);
			$keys = implode(", ",array_keys($add_array));
			$values = implode(", ",array_values($add_array));
			
			$query = "insert into $table($keys) values($values)";
			$this->debug($query);
			
			return $this->setQuery($query);
		}
		
		/**********************************************/
		
		function update($table, $update_array,$condition="")
		{
			$query = "update $table set ";
			
			if(is_array($update_array))
			{
				$update_paris = array();
				
				foreach($update_array as $field=>$val)
				{
					array_push($update_paris, "$field=".$this->_quota_val($val));
				}
				
				$query .= implode(", ",$update_paris);
			}
			elseif(is_string($update_array) && !empty($update_array))
			{
				$query .= $update_array;
			}
			
			$query .= $this->_makeWhereList($condition);
			$this->debug($query);

			return $this->setQuery($query);
		}
		
		/**********************************************/

		function delete($table, $condition="")
		{
			$query = "delete from $table";
			$query .= $this->_makeWhereList($condition);
			$this->debug($query);
			
			return $this->setQuery($query);
		}
		
		/**********************************************/
		
		function debug($msg)
		{
			if($this->debug)
			{
				print "$msg<br>";
			}
		}
		
		/**********************************************/
		
		function _makeWhereList($condition)
		{
			if(empty($condition))
			{
				return "";
			}
			
			$retstr = " where ";
			if(is_array($condition))
			{
				$cond_pairs = array();
				foreach($condition as $field=>$val)
				{
					array_push($cond_pairs,"$field=".$this->_quota_val($val));
				}
				
				$retstr .= implode(" and ", $cond_pairs);
			}
			elseif(is_string($condition) && !empty($condition))
			{
				$retstr .= $condition;
			}
			
			return $retstr;
		}
		
		/**********************************************/
		function _makeOrderBy($order)
		{
			if(empty($order))
			{
				return "";
			}
			
			$retstr = " order by ";
			if(is_array($order))
			{
				$order_pairs = array();
				foreach($order as $field=>$val)
				{
					array_push($order_pairs,"$field $val");
				}
				
				$retstr .= implode(", ", $order_pairs);
			}
			elseif(is_string($order) && !empty($order))
			{
				$retstr .= $order;
			}
			
			return $retstr;
		}
		
		/**********************************************/
		function _makeLimit($limit)
		{
			if(empty($limit))
			{
				return "";
			}
			
			$retstr = " limit ";
			if(is_array($limit))
			{
				$limit_pairs = array();
				foreach($limit as $field=>$val)
				{
					array_push($limit_pairs,$val);
				}
				
				$retstr .= implode(",",$limit_pairs);
			}
			elseif(is_string($limit) && !empty($limit))
			{
				$retstr .= $limit;
			}
			
			return $retstr;
		}
		
		/**********************************************/
		function _quota_val($val)
		{
			$val = mysql_real_escape_string($val);
			
			if(is_numeric($val))
			{
				return $val;
			}
			
			return "'".addcslashes($val,"/")."'";
		}
		
		/**********************************************/
		
		function _quota_vals($array)
		{
			foreach($array as $key=>$val)
			{
				$rets[$key] = $this->_quota_val($val);
			}
			
			return $rets;
		}

		
		
		function __destruct()
		{
			
		}
		
	}

?>