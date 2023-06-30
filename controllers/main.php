<?php

if( !defined( 'ABSPATH' ) ) exit;

require_all_file();

function require_all_file( $path = '' ) {
    $path = !empty( $path ) ? $path : dirname( __FILE__ );
    $scan_dir = scandir( $path );

    if(empty( $scan_dir )) return;

    foreach( $scan_dir as $scan_dir_single ) {
        if( in_array( $scan_dir_single, ['.', '..'] ) ) continue;

        $temp_path = $path.'/'.$scan_dir_single;
        if( is_dir( $temp_path ) ) {
            require_all_file( $temp_path );
            continue;
        }

        require_once( $temp_path );
    }
}
