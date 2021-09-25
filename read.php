<?php
function file_name( $name ) {
    $only_name = strpos( $name, '.' );
    $the_name = substr( $name, 0, $only_name );
    return $the_name;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div class="scan-files">
            <?php
$path = 'data/';
$files = scandir( $path );
if ( is_array( $files ) ) {
    $files = array_slice( $files, 2 );
}
foreach ( $files as $file => $name ):
    $name = file_name( $name );
    ?>
            <ul>
                <li><a href="readAction.php?file_id=<?php echo $file; ?>"><?php echo $name; ?></a></li>
            </ul>
            <?php endforeach;?>
        </div>
    </div>
    <div class="var-dump" style="position: absolute;bottom:0;left:0;width:100%;z-index:10;">
        <?php

echo '<pre>';
var_export( $files );
echo '</pre>';
?>
    </div>
</body>

</html>