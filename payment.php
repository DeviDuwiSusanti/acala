<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Options</title>
    <!-- Link to your CSS file -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #85848b;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .payment-method {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .payment-method:hover {
            transform: translateX(5px);
        }

        .payment-method img {
            width: 50px;
            margin-right: 15px;
        }

        .payment-method-info {
            flex-grow: 1;
        }

        .payment-method-info h3 {
            margin-bottom: 5px;
            font-size: 1.1rem;
            color: #333;
        }

        .payment-method-info p {
            font-size: 0.9rem;
            color: #777;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="payment-options">
            <h2>Select Payment</h2>
            <br></br>
            <div class="payment-methods">
                <div class="payment-method" onclick="redirectToPayment('ATM/Bank Transfer')">
                    <img src="img/atm.png" alt="ATM/Bank Transfer">
                    <div class="payment-method-info">
                        <h3>ATM/Bank Transfer</h3>
                        <p>Pay from ATM Bar, Internet Banking, or Mobile Banking.</p>
                    </div>
                </div>
                <div class="payment-method">
                    <img src="img/gopay.png" alt="Gopay">
                    <div class="payment-method-info">
                        <h3>Gopay</h3>
                        <p>Pay with Gopay, your mobile wallet.</p>
                    </div>
                </div>
                <div class="payment-method">
                    <img src="img/ovo.jpeg" alt="OVO">
                    <div class="payment-method-info">
                        <h3>OVO</h3>
                        <p>Pay with OVO, your digital wallet.</p>
                    </div>
                </div>
                <div class="payment-method">
                    <img src="img/dana.jpeg" alt="DANA">
                    <div class="payment-method-info">
                        <h3>DANA</h3>
                        <p>Pay with DANA, your digital wallet.</p>
                    </div>
                </div>
                <div class="payment-method">
                    <img src="img/bri.png" alt="BRI">
                    <div class="payment-method-info">
                        <h3>BRI</h3>
                        <p>Pay with BRI, your bank account.</p>
                    </div>
                </div>
                <div class="payment-method">
                    <img src="img/bca1.png" alt="BCA">
                    <div class="payment-method-info">
                        <h3>BCA</h3>
                        <p>Pay with BCA, your bank account.</p>
                    </div>
                </div>
                <div class="payment-method">
                    <img src="img/alfa.jpeg" alt="Alfamart">
                    <div class="payment-method-info">
                        <h3>Alfamart</h3>
                        <p>Pay at Alfamart convenience store.</p>
                    </div>
                </div>
                <div class="payment-method">
                    <img src="img/indo.png" alt="Indomaret">
                    <div class="payment-method-info">
                        <h3>Indomaret</h3>
                        <p>Pay at Indomaret convenience store.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function redirectToPayment(method) {
            window.location.href = "payment.php?method=" + method;
        }
    </script>
</body>
</html>
