<?php
// require("header.php");
include ('headre.php');
?>

  <body>
 <div id="saurabh" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
      
    <div class="form-container" style="max-width: 400px; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);">
       
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
          <label for="InputEmail">Email address</label>
          <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        </div>
				
        <div class="form-group">
          <label for="InputPassword">Password</label>
          <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password" maxlength="8" minlength="8">
        </div>
        <button type="submit" class="btn btn-primary" name="btn">Login</button>
      </form>
      <div class="mt-2 text-center">
        <span>Don't have an account? </span><a href="/signin.php" class="btn btn-link">Sign In</a>
      </div>
    </div>
  </div>
  
  
  
</body>


<?php
ob_start(); 
session_start(); // Start the session

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



//chackiing db for rmil and password
function checkCredentials($email, $password, $db) {
    // Construct SQL query with parameters embedded
    $sql = "SELECT email, password FROM users WHERE email = '$email'";
    
    // Execute the query
    $result = $db->query($sql);

    if ($result === false) {
        // Query execution failed
        return "query_failed";
    }

    // Fetch the result
    $row = $result->fetchArray(SQLITE3_ASSOC);

    if ($row) {
        // Email found in the database
        $storedEmail = $row['email'];
        $storedPasswordHash = $row['password'];

        // Verify the password
        if (password_verify($password, $storedPasswordHash)) {
            // Password is correct, return the email
            return $storedEmail;
        } else {
            // Password is incorrect
            return "password";
        }
    } else {
        // Email not found in the database
        return "email";
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        // For security, you should hash the password before comparing it with the stored hashed password
        $storedEmail = 'example@example.com'; // Replace with the email fetched from the database
        $storedPasswordHash = 'hashed_password'; // Replace with the hashed password fetched from the database
    }
}

if(isset($_POST["btn"])){
    $missing_fields = array();

    if(empty($_POST['email'])) {
        $missing_fields[] = "Email";
    }

    if(empty($_POST['password'])) {
        $missing_fields[] = "Password";
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

        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';

        echo '</div>';
    } else {
      $email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$dbname = "admin.db";
$db = new SQLite3($dbname);

if(!$db){
    // echo ;
	alter_action_not_done("Database not connected.");
    exit();
}

// Check if email and password are provided
if(empty($email) || empty($password)) {
    // echo ;
	alter_action_not_done("Email and password are required.");
    exit();
}

// Check credentials
$validationResult = checkCredentials($email, $password, $db);

    // Email not found in the database
if ($validationResult === "email") {
   
	alter_action_not_done("Email not found in the database.");
} elseif ($validationResult === "password") {
    // Password is incorrect
	alter_action_not_done("Password is incorrect.");
    
} elseif ($validationResult === "query_failed") {
    // Query execution failed
	alter_action_not_done("An unexpected error occurred.");
    
}else{
	$_SESSION['email'] = $email;
    header("Location: main.php");
    exit();
}

// $db->close();
    }
}
ob_end_flush(); 
?>

</html>



<?php
// require("header.php");
include ('footer.php');
?>