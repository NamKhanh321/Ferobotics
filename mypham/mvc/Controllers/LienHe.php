<?php
    class LienHe extends controller
    {
        function show()
        {
            self::view("master",[
                "page" => "LienHe",
                "title" => "Liên hệ"
            ]);
        }
    }
