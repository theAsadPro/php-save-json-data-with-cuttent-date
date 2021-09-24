<?php
$myDetails = array(
    'firstname' => 'Asad',
    'lastname'  => 'Srj',
    'email'     => 'asad123.srj@gmail.com',
    'country'   => 'Asad',
    'address'   => array(
        'village'  => 'Jagoatganti',
        'post'     => 'Koyelgati',
        'postcode' => 6700,
        'state'    => 'Rajshahi',
        'family'   => array(
            'father' => 'Awal',
            'mother' => 'Mother',
            'child'  => array(
                'child1' => 'Abrar',
                'child2' => 'Ahmad',
                'child3' => 'Adam',
            ),

        ),
    ),
);

?>
<pre>
    <?php print_r( $myDetails )?>
</pre>

<?php

$myJsonDetails = json_encode( $myDetails );
?>
<pre>
    <?php print_r( $myJsonDetails )?>
</pre>

<?php

$myJsonDecode = json_decode( $myJsonDetails );
?>
<pre>
    <?php print_r( $myJsonDecode )?>
</pre>

<?php
if ( !is_dir( 'data' ) ) {
    mkdir( 'data' );
}

function file_newname( $path, $filename ) {
    if ( $pos = strrpos( $filename, '.' ) ) {
        $name = substr( $filename, 0, $pos );
        $ext = substr( $filename, $pos );
    } else {
        $name = $filename;
    }

    $newpath = $path . '/' . $filename;
    $newname = $filename;
    $counter = 0;
    while ( file_exists( $newpath ) ) {
        $newname = $name . '_' . $counter . $ext;
        $newpath = $path . '/' . $newname;
        $counter++;
    }

    return $newname;
}

$path = "data/";
$files = scandir( $path );
$file_name = 'data' . '-' . date( 'd-M-Y' ) . '.json';
$file_name = file_newname( $path, $file_name );

$myfile = fopen( $path . $file_name, 'w' ) or die( 'Unable to save data' );
fwrite( $myfile, $myJsonDetails );
fclose( $myfile );

$files = scandir( $path );
?>
<pre>
    <?php print_r( $files )?>
</pre>