<?php
// .allowed_ip
// 192.168.0.1
// 192.168.1.0/24
// 192.168.2.1-192.168.2.254

class ip_check {
    const ALLOWED_IP_FILE = '.allowed_ip';
    public function get_remote_ip() {
        $remote_addr = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
        if ( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
            $forwarded_ips = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );
            $remote_addr = $forwarded_ips[0];
            unset( $forwarded_ips );
        }
        return $remote_addr;
    }
    public function get_allowed_ip( $file_name = '' ) {
        if ( empty($file_name) )
            $file_name = dirname(__FILE__) . '/' . self::ALLOWED_IP_FILE;
        if ( !file_exists($file_name) )
            return false;
        $allowed_ips = explode("\n", file_get_contents( $file_name ));
        return $allowed_ips;
    }
    public function is_allowed_ip( $file_name = '' ) {
        $remote_addr = $this->get_remote_ip();
        if ( ($allowed_ips = $this->get_allowed_ip($file_name)) && is_array($allowed_ips) ) {
            foreach( $allowed_ips as $allowed_ip ) {
                if ( empty($allowed_ip) )
                    continue;
                if ( $this->is_ip_range($remote_addr, $allowed_ip) )
                    return true;
            }
        }
        return false;
    }
    public function is_ip_range( $ip, $range ) {
        $ip    = trim($ip);
        $range = trim($range);
        if ( !($ip = ip2long($ip)) )
            return false;
        if( strchr($range, '/') ){
            list($net, $mask) = split('/', $range);
            if ( !($net = ip2long($net)) )
                return false;
            if ( is_numeric($mask) )
                $mask = long2ip(bindec(str_repeat('1', $mask) . str_repeat('0', 32 - $mask)));
            if ( !($mask = ip2long($mask)) )
                return false;
            return ( ($ip & $mask) === ($net & $mask) ) ? true : false;
        } elseif ( strchr($range, '-') ) {
            $range = split('-', $range);
            if ( !($range[0] = ip2long($range[0])) )
                return false;
            if ( !($range[1] = ip2long($range[1])) )
                return false;
            return ( $range[0] <= $ip && $ip <= $range[1] ) ? true : false;
        } elseif ( $range = ip2long($range) ) {
            return ( $range === $ip ) ? true : false;
        }
        return false;
    }
}
