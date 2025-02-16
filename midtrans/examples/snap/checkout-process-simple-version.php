<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

use mysqli;

require_once dirname(__FILE__) . '/../../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-YaQmlOxts2o-xcPI4su1higv';
Config::$clientKey = 'SB-Mid-client-MiaGfuzbAuB5n-2v';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

include 'koneksi.php';
// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;
$order_id = $_GET['id_booking'];

$sql = "SELECT * FROM booking INNER JOIN paket ON booking.id_paket= paket.id_paket WHERE booking.id_booking = '$order_id'";
$query = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($query);
// Required
$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $row['total_harga'], // no decimal allowed for creditcard
);
// Optional
$item_details = array (
    array(
        'id' => $row['id_paket'],
        'price' => $row['harga_paket'] ,
        'quantity' => $row['jumlah_orang'],
        'name' => $row['nama_paket']
    ),
  );
// Optional
$customer_details = array(
    'first_name'    => $row['nama'],
    'email'         => $row['email'],
    'phone'         => $row['hp'],
);
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
}
catch (\Exception $e) {
    echo $e->getMessage();
}
echo "snapToken = ".$snap_token;

function printExampleWarningMessage() {
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
        die();
    } 
}

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--=============== BOXICONS ===============-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../../../assets/css/style.css" />
        <!--=============== SWIPER CSS ===============-->
        <!-- <link rel="stylesheet" href="css/swiper-bundle.min.css"/> -->
    <title>Detail Package</title>
  </head>
  <body>
    <!--==================== MAIN ====================-->
    <main class="main">
      <!--==================== HOME ====================-->
      <section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <!--========== ISLANDS 1 ==========-->
            <section class="islands swiper-slide">
              <img src="../../../assets/img/widodaren.jpg" alt="" class="islands__bg" />

              <div class="islands__container container">
                <div class="islands__data">
                  <h2 class="islands__subtitle">Explore</h2>
                  <h1 class="islands__title"><?= $row['nama_paket'] ?></h1><br><br>
                  <button class="button button-booking" id="pay-button">Lakukan Pembayaran!</button>
                    <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
                    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey;?>"></script>
                    <script type="text/javascript">
                        document.getElementById('pay-button').onclick = function(){
                            // SnapToken acquired from previous step
                            snap.pay('<?php echo $snap_token?>');
                        };
                    </script>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
  </body>
</html>
