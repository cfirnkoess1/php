<html>
<head>

</head>
 <?php
 session_start();
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 
 echo "<pre>";
print_r($_POST);
echo "</pre>";
include "db_connect.php";

echo "Received values: ";
var_dump($_POST);

$user_name = $_POST['user_name'];
$password = $_POST['password'];

echo "User_name: $user_name, Password: $password";

$stmt = $mysqli->prepare("SELECT user_id, user_name, password FROM users WHERE user_name = ?");
        $stmt->bind_param("s", $user_name);
        $stmt->execute();
        $stmt->store_result();

        
                echo " pw matches<br>";        
                echo "<p>Login success</p>";         
                $_SESSION['user_name'] = $user_name;
           

echo "Session variable = ";
print_r($_SESSION);

echo "<br>";

echo "<a href='index.php'>Return to main page</a>";
?>

</html>
