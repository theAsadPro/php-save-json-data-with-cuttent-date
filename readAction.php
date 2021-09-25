<?php

if ( isset( $_GET['file_id'] ) ) {
    $file_id = $_GET['file_id'];
}

$path = 'data/';
$files = scandir( $path );
if ( is_array( $files ) ) {
    $files = array_slice( $files, 2 );
}

$the_file = $files[$file_id];
$the_file = $path . '/' . $the_file;

$read_file = fopen( $the_file, 'r' ) or die( 'File can\'t be open' );
$fileContent = fread( $read_file, filesize( $the_file ) );
fclose( $read_file );

/*
echo '<pre>';
print_r( $fileContent );
echo '</pre>';
 */
$fileContent = json_decode( $fileContent );

echo '<pre>';
print_r( $fileContent );
echo '</pre>';

/*
$read = file_get_contents( $path . $the_file );
$read_json = json_decode( $read );

echo '<pre>';
print_r( $read_json );
echo '</pre>';
 */