<?php
include 'phpqrcode/qrlib.php';


$qrCodeImage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $url = $_POST['url'];
 
    $tempFile = 'temp_qrcode.png';

    QRcode::png($url, $tempFile, QR_ECLEVEL_L, 4);

    $qrCodeImage = $tempFile;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>QR Generator</title>
</head>
<body>
    <div class="card">
    <div class="search">
        <form action=""  method="POST">
        <input type="text" name="url" placeholder="Enter URL" spellcheck="false"> 
        <button>Generate</button>
        </form>
     </div>
     <?php if ($qrCodeImage): ?>
        <h3>Scan this QR Code</h3>
        <img src="<?php echo $qrCodeImage; ?>" alt="QR Code">
    <?php endif; ?>

    </div>     
 </body>

</html>