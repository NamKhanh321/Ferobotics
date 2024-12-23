<?php
    class Database
    {
        public static $connect;
        protected $severName = "mypham-server.mysql.database.azure.com";
        protected $userName = "gkphkwttoo";
        protected $passWord = "Nam123456";
        protected $dbName = "mypham";

        function __construct()
        {
            self::$connect = mysqli_init();
            mysqli_ssl_set(self::$connect,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
            mysqli_real_connect(self::$connect, $this->severName, $this->userName, $this->passWord, $this->dbName,3306,NULL,MYSQLI_CLIENT_SSL);
            mysqli_select_db(self::$connect,$this->dbName);
            mysqli_query(self::$connect, "SET NAMES 'utf8'");
        }
    }
?>