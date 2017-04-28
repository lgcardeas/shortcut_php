<?php
    
    
    class ShortUrl {
        protected static $chars = "123456789bcdfghjkmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ";
        protected static $checkUrlExists = true;
        
        
        public static function urlToShortCode($url) {
            if (empty($url)) {
                apologize("No URL was supplied.");
            }
    
            if (self::validateUrlFormat($url) == false) {
                apologize("URL does not have a valid format.");
            }
    
            if (self::$checkUrlExists) {
                if (!self::verifyUrlExists($url)) {
                    apologize("URL does not appear to exist.");
                }
            }
    
            $shortCode = self::urlExistsInDb($url);
            
            if ($shortCode == false) {
                $shortCode = self::createShortCode($url);
            }
    
            return $shortCode;
        }

        public static function validateUrlFormat($url) {
            return filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED);
        }
        
        public static function verifyUrlExists($url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
    
            return (!empty($response) && $response != 404);
        }
        
        public static function urlExistsInDb($url) {
             $result  = CS50::query("SELECT * FROM url WHERE url_oficial = ?",$url);
            return (empty($result)) ? false : $result[0]["url_shortened"];
        }
        
        //Test this function to see if works
        public static function createShortCode($url) {
            $id_table = CS50::query("SELECT id 
                               FROM url 
                               ORDER BY id DESC
                               LIMIT 1");
                               
            if (empty($id_table)){
                $id = 0;
            } else {
                $id = intval($id_table[0]["id"]);
            }
            $shortCode = self::convertIntToShortCode($id);
            if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
                $query = CS50::query("SELECT * FROM users WHERE id = ?",
                                 $_SESSION['id']) ;
                CS50::query("INSERT INTO url (url_shortened, url_oficial, counter, date, user_email) VALUES(?, ?, 0, ?, ?)",
                                $shortCode, 
                                $url,
                                 date("Y-m-d h:m:sa"),
                                 $query[0]['email']) ;
            } else {
                CS50::query("INSERT INTO url (url_shortened, url_oficial, counter, date, user_email) VALUES(?, ?, 0, ?, ?)",
                                $shortCode, 
                                $url,
                                 date("Y-m-d h:m:sa"),
                                 "admin@gmail.com") ;
            }
            return $shortCode;
        }
        
        public static function convertIntToShortCode($id) { //Check all this code
            $id = intval($id);
            if ($id < 0) {
                apologize(
                    "The ID is not a valid integer");
            }
    
            $length = strlen(self::$chars);
            // make sure length of available characters is at
            // least a reasonable minimum - there should be at
            // least 10 characters
            if ($length < 10) {
                apologize("Length of chars is too small");
            }
    
            $code = "";
            while ($id > $length - 1) {
                // determine the value of the next higher character
                // in the short code should be and prepend
                $code = self::$chars[intval(fmod($id, $length))] .
                    $code;
                // reset $id to remaining value to be converted
                $id = floor($id / $length);
            }
    
            // remaining value of $id is less than the length of
            // self::$chars
            $code = self::$chars[intval($id)] . $code;
    
            return $code;
        }
        
        //Decode the code
        public static function shortCodeToUrl($code, $increment = true) {
            if (empty($code)) {
                apologize("No short code was supplied.");
            }
    
            if (self::validateShortCode($code) == false) {
                apologize(
                    "Short code does not have a valid format.");
            }

            $urlRow = self::getUrlFromDb($code);
            if (empty($urlRow)) {
                apologize(
                    "Short code does not appear to exist.");
            }

            if ($increment == true) {
                self::incrementCounter($urlRow["id"]);
            }

            return $urlRow["url_oficial"];
        }

        public static function validateShortCode($code) {
            return preg_match("|[" . self::$chars . "]+|", $code);
        }

        public static function getUrlFromDb($code) {
            $query = CS50::query("SELECT * FROM url WHERE url_shortened = ? LIMIT 1", $code);
            
            return (empty($query)) ? false : $query[0];
        }
    
        public static function incrementCounter($id) {
            $query = CS50::query("UPDATE url SET counter = counter + 1 WHERE id = ?", $id);
        }
        
    }
?>