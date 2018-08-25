<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utils {
    public  static function hash($algo, $data, $salt) {
        $context = hash_init($algo, HASH_HMAC, $salt); 
        hash_update($context, $data);
        return hash_final($context);
    }
    
    public static function no_cache() {
        $ci = & get_instance();
        $ci->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0,pre-check=0");
        $ci->output->set_header("Pragma: no-cache");
    }
}
?>


