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
<html>
    <head>

    </head>
    <body>
        <p>Xin chaooooooooooooo</p>
    </body>
</html>

