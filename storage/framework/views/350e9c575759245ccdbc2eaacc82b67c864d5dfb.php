<?php
header('Content-Type: image/png');

use Endroid\QrCode\QrCode;


require_once '../../ereceptionhub/vendor/autoload.php';

if(isset($_GET['text'])){

    $size = isset($_GET['size']) ? $_GET['size'] : 200;

    $qr = new QrCode();

    $qr->setText($_GET['text']);
    $qr->setSize($size);
    echo $qr->writeString();
    
} ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/qr-code.blade.php ENDPATH**/ ?>