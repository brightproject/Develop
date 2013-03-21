<?php 

require_once('MysqlDB.php');

Class Ajax_Interface extends MySqlDB { 
	
	/** constructor: connect to db */
	function Ajax_Interface($db, $dbLoc, $dbUser, $dbPw) {

		$this->dblink = $this->connect($dbLoc, $dbUser, $dbPw);
		mysql_select_db($db);	
	
		}	
	/** fetch products records from the database */
	function get_records() { 
		
		$query = "SELECT * from product LIMIT 3";
		$this->result = $this->query($query, $this->dblink) or die($this->return_error($query, mysql_error()));
		$this->rs = $this->fetch_assoc($this->result);
				
		}
	/** get individual record for editing */	
	function get_item($pID) { 
		
		$query = "SELECT * FROM product WHERE product_id = ".$pID;
		$result = $this->query($query);
		$rs = $this->fetch_assoc($result);
		
		$output = '<pID>'.$rs['product_id'].'</pID>'.
		'<value>'.$rs['name'].'</value>';
		
		return $output;
		
	}
		
	function save() { 
		
			 $query = 'update product SET name="'.$_GET['content'].'"
			  where product_id = '.$_GET['product_id'].' LIMIT 1';
			 
			 $this->query($query); 
			 $output = '<pID>'.$_GET['product_id'].'</pID>.
			 <value>'.$_GET['content'].'</value>';
			 
			 return $output;
		}

	/** print out select menu on the index page */
	function select_menu() { 	
			
		$this->get_records();
		$products = $this->rs;		
		
		?>Select By Product ID:<br>
		<select name="products" id="products" onchange="SelectProduct()">
		<option selected value=""></option>
		<?php echo "\n"; do { ?>
			<option value="<?php echo $products['product_id'] ?>"><?php echo $products['product_id'] ?>
			</option>
		<?php	echo "\n";	} while ($products = $this->fetch_array($this->result));		
		echo $this->num_rows($this->result);
		?> </select> <?php echo "\n";
		}	

	function print_records() {
		
		$this->get_records();
		$products = $this->rs;	
		$id = $products['product_id'];
		$name = $products['name'];

		do 	{ 
			
			$id = $products['product_id'];
			$name = $products['name'];
			$field = 'field_'.$id;
			
			echo '<input type="text" name"?" id="'.$id.'" value="'.$name.'" onClick="changeClass(\''.$id.'\', \'show\')" onBlur="changeClass(\''.$id.'\', \'hide\')" onKeyPress="checkLength(this)" class="text" maxlength="60" readonly />';
			echo "\n";
			
			} while ($products = $this->fetch_array($this->result));	
	}

	/** echo out query error info */
	function return_error($query, $mysql_error) { 
		
		echo "###########################<br>
		DB QUERY ERROR<br>
		<b>query: </b>".$query."<br>
		<i>mysql reports:</i><br>".$mysql_error."<br>
		###########################<br><br>";		
		
	}
	
} 


?>