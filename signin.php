<?php 
include ('headre.php');

?>

<body style=" background-image: url('img/cloude.jpg');  
            background-size: cover;  
            background-position: center; ">
			
<div class="container" style=" display: flex;
            justify-content: center;
            align-items: center;
            height:100vh;" >
			
 <div class="custom-form" style="width: 420px;  
            padding: 20px;
            border: 1px solid none;
            border-radius: 10px;  
          
			background-color: rgba(0,234,255, 0.12);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
			max-width: 400px;
			padding: 20px; ">
       
       <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="inputPhone">Phone Number</label>
                <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="Phone Number" maxlength="10" minlength="10">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" maxlength="8" minlength="8">
            </div>
            <div class="form-group">
                <label for="inputGender">Gender</label>
                <select id="inputGender" class="form-control" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btn" value = "SingUp">Sign up</button>
        </form>
		</div>
		</div>
</body>
 

<?php
include ('footer.php');
?>
 
<?php
 session_start();

function alter_action_done($work){
	echo '<div class="alert alert-success" role="alert" style="
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999;
        ">';
        echo "$work";
		
		// close button
		echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
		echo '<span aria-hidden="true">&times;</span>';
		echo '</button>';
        
		echo '</div>';
}
function alter_action_not_done($work){
	echo '<div class="alert alert-warning" role="alert" style="
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999;
        ">';
        echo "$work";
		
		// close button
		echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
		echo '<span aria-hidden="true">&times;</span>';
		echo '</button>';
        
		echo '</div>';
}

if(isset($_POST["btn"])){
	   $missing_fields = array();

    if(empty($_POST['name'])) {
        $missing_fields[] = "Name";
    }

    if(empty($_POST['phone'])) {
        $missing_fields[] = "Phone";
    }

    if(empty($_POST['email'])) {
        $missing_fields[] = "Email";
    }

    if(empty($_POST['password'])) {
        $missing_fields[] = "Password";
    }

    if(empty($_POST['gender'])) {
        $missing_fields[] = "Gender";
    }

    if(!empty($missing_fields)) {
        $missing_fields_str = implode(', ', $missing_fields);
        echo '<div class="alert alert-warning" role="alert" style="
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999;
        ">';
        echo "Please fill in the following fields: $missing_fields_str.";
		
		// close button
		echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
		echo '<span aria-hidden="true">&times;</span>';
		echo '</button>';
        
		echo '</div>';
    }
	else{
		
	
$name = $_POST['name'];
$number = $_POST['phone'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);;
$gender = $_POST['gender'];

	$dbname = "admin.db";
	
	$db = new SQLite3($dbname);
	
	 
	if(!$db){
		alter_action_not_done(" Database not Connected..");
	}else{
		// echo " conncted";
		// alter_action_done(" Database Connected successfully..");
	} 
	
	
	$query =  "CREATE TABLE IF NOT EXISTS users (
					id INTEGER PRIMARY KEY, 
					name TEXT NOT NULL,
					email TEXT NOT NULL UNIQUE,
					password TEXT NOT NULL,
					gender TEXT,
					number Text(10) NOT NULL UNIQUE
				)";
	$runQ = $db->exec($query);
		
	if(!$runQ){
		 alter_action_not_done(" Table not created ..");
		 
	}else{
		 // alter_action_done(" Table created Sucssesfully....");
	}
	
	
	
$email = $_POST['email'];
$phone = $_POST['phone'];

// emil db cahking 

$emailQuery = $db->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
$emailQuery->bindValue(':email', $email, SQLITE3_TEXT);
$emailResult = $emailQuery->execute();
$emailExists = $emailResult->fetchArray()[0] > 0;

$phoneQuery = $db->prepare("SELECT COUNT(*) FROM users WHERE number = :phone");
$phoneQuery->bindValue(':phone', $phone, SQLITE3_TEXT);
$phoneResult = $phoneQuery->execute();
$phoneExists = $phoneResult->fetchArray()[0] > 0;
 
if ($emailExists && $phoneExists) {
    alter_action_not_done("Email and phone number are already taken.");
} 
elseif ($emailExists) {
    alter_action_not_done("Email is already taken.");
} 
elseif ($phoneExists) {
    alter_action_not_done("Phone number is already taken.");
    
} 
else {
	//insert data querry
	$insertQ = "INSERT INTO users (name, email, password, gender,number) 
				VALUES ('$name', '$email', '$password', '$gender','$number')";
	$instRunQ = $db->exec($insertQ);
	
	if(!$instRunQ){
		 // alter_action_not_done("Data not inserted");
		 echo "Data not inserted";
	}else{
	 $_SESSION['email'] = $email;
    header("Location: main.php");
    exit();
	}
  }
	}
} 
?>
