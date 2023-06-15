<?php 
    class manageAssets{
        public static function css(){
            $cssUrl = BASE_URL ."/assets/css/";
            return array(
                'admin-min' => $cssUrl.'admin-min.css',
                'ht-qrcode' => $cssUrl.'ht-qrcode.css',
            );
        }
        
        public static function js(){
            $jsUrl = BASE_URL ."/assets/js/";
            return array(
                'admin-min' => $jsUrl.'admin-min.js',
                'easy.qrcode.min' => $jsUrl.'easy.qrcode.min.js',
                'qrcode-custom' => $jsUrl.'qrcode-custom.js',
            );
        }
    }
?>