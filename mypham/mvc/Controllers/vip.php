
<?php
    class vip extends controller
    {
        function show()
        {
            self::view("master",[
                "page" => "vip",
                "title" => "Điều Kiện Vip"
            ]);
        }
    }
