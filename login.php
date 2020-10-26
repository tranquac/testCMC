<?php
	include 'inc/header.php';
?>

<?php 
		$login_check = Session::get('customer_login');
		if($login_check){
			header('Location:index.php');
		}
?>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) { 
        //$cs = new customer();
        $insertCustomer = $cs->insert_customer($_POST);
    } 
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])) { 
        //$cs = new customer();
        $login = $cs->login($_POST);
    } 
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
			<p>Sign in with the form below.</p>
			<?php if(isset($login)){
				echo $login;
			}?>
        	<form action="" method="POST" id="member">
                	<input name="email" type="text"  class="field" placeholder="Enter Email..." >
                    <input name="password" type="password"  class="field" placeholder="Enter Password...">
                 
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
					<div class="buttons"><div><input type="submit" name="login" value="Sign in"></div></div>
					</form>
                    </div>
    	<div class="register_account">

			<h3>Register New Account</h3>
			<?php 
				if(isset($insertCustomer)){
					echo $insertCustomer;
				}
			?>
    		<form method="POST" action="">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" value="" placeholder="Enter name...">
							</div>
							
							<div>
							   <input type="text" name="city" value="" placeholder="Enter City...">
							</div>
							
							<div>
								<input type="text" name="zipcode" value="" placeholder="Enter Zip-Code...">
							</div>
							<div>
								<input type="text" name="email" value="" placeholder="Enter E-Mail...">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" value="" placeholder="Enter Address...">
						</div>
						<div>
							<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
								<option value="null">Select a Country</option>         
								<option value="VN">Việt Nam</option>
							</select>
						</div>		        
	
						<div>
						<input type="text" value="" name="phone" placeholder="Enter Phone..." >
						</div>
						<div>
							<input type="text" name="password" value="" placeholder="Enter Password..." >
						</div>
		    	</td>
		    </tr> 
			</tbody>
		</table> 
		   <div class="search"><div><input type="submit" name="submit" value="Create Account"></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
 ?>