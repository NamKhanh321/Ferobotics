<?php
$con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($con, "mypham-server.mysql.database.azure.com", "gkphkwttoo", "Nam123456", "mypham",3306,NULL,MYSQLI_CLIENT_SSL);

if ($con->connect_error) {
    echo "Ket noi that bai";
    die("Connection failed: " . $con->connect_error);
  }
else {
    echo "Ket noi thanh cong";
}

$sql = "SELECT ID, IDKH FROM binhluan";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["ID"]. " - Name: " . $row["IDKH"]. "<br>";
  }
} else {
  echo "0 results";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Create an account</h2>
        <form action="#" method="post">
            <div class="section">
                <h3>Your personal details</h3>
                <div class="form-content">
                    <label for="firstName">First Name <span>*</span></label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
                
                <div class="form-content">
                    <label for="lastName">Last Name <span>*</span></label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>

                <div class="form-content">
                    <label for="email">Email <span>*</span></label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>

            <div class="section">
                <h3>Your password</h3>
                <div class="form-content">
                    <label for="password">Password <span>*</span></label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <div class="form-content">
                    <label for="confirmPassword">Confirm password <span>*</span></label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                </div>
                
            </div>

            <div class="buttons">
                <button type="submit" class="create-account">Create an account</button>
                <button type="button" class="cancel">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>


