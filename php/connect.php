<?php
// $userName = $_POST['userName'];
// $password = $_POST['password'];
// echo "$userName";
// $conn = new mysqli('localhost','root','','test');
// if($conn -> connect_error){
//     die('connection Failed : '.$conn->connect_error);
// }
// else {
//     $stmt =$conn ->prepare(" insert into registeration(userName,password)values(? ,?)");
//     $stmt->bind_param("ss",$userName,$password);
//     $stmt-> execute();
//     echo "registration Successfully....";
//     $stmt ->close();
//     $conn ->close();
// }

$userName = filter_input(INPUT_POST,'userName');
$password = filter_input(INPUT_POST,'password');
if(!empty($userName)){
    if(!empty($password)){
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "test";

        $conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);

        if(mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }
        else{
            $sql = "INSERT INTO account(username,password)
            values ('$userName','$password')";
            if($conn->query($sql)){
                echo "New record is inserted sucessfully";
            }
            else{
                echo "Error: ".$sql."<br>".$conn->error;
            }
            $conn->close();
        }

    }
    else{
    echo "Password should not be empty";
    die();
    }

}
else{
    echo "Username should not be empty";
    die();
}
?>  



