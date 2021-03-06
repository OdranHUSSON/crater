
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webforger - Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://webforger.fr/css/app.css">
    <link rel="icon" type="image/png" href="https://webforger.fr/images/favicon.png" />
    <style>
        body {
            height:100%;
            min-height: 100%;
        }


        .top-margin {
            margin-top:100px;
        }

        iframe {
            border-radius: 8px;
            height: 700px;
            width: 100%;
        }

        .pay-now {
            position: absolute;
            right: 0;
            margin-top: 10px;
        }

    </style>
    <style>
        .bg {
            background-color: #6c7bee;
            width: 100%;
            overflow: hidden;
            margin: 0 auto;
            box-sizing: border-box;
            padding: 40px;
            font-family: 'Roboto';
            margin-top: 40px;
        }
        .card {
            background-color: #fff;
            width: 100%;
            float: left;
            margin-top: 40px;
            border-radius: 5px;
            box-sizing: border-box;
            padding: 80px 30px 25px 30px;
            text-align: center;
            position: relative;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }
        .card__success {
            position: absolute;
            top: -50px;
            left: 145px;
            width: 100px;
            height: 100px;
            border-radius: 100%;
            background-color: #60c878;
            border: 5px solid #fff;
        }

        .card__success img {
            width: 80%;
            margin-top:10px;
        }

        .card__success i {
            color: #fff;
            line-height: 100px;
            font-size: 45px;
        }
        .card__msg {
            text-transform: uppercase;
            color: #55585b;
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 5px;
        }
        .card__submsg {
            color: #959a9e;
            font-size: 16px;
            font-weight: 400;
            margin-top: 0px;
        }
        .card__body {
            background-color: #f8f6f6;
            border-radius: 4px;
            width: 100%;
            margin-top: 30px;
            float: left;
            box-sizing: border-box;
            padding: 30px;
        }
        .card__avatar {
            width: 50px;
            height: 50px;
            border-radius: 100%;
            display: inline-block;
            margin-right: 10px;
            position: relative;
            top: 7px;
        }
        .card__recipient-info {
            display: inline-block;
        }
        .card__recipient {
            color: #232528;
            text-align: left;
            margin-bottom: 5px;
            font-weight: 600;
        }
        .card__email {
            color: #838890;
            text-align: left;
            margin-top: 0px;
        }
        .card__price {
            color: #232528;
            font-size: 70px;
            margin-top: 25px;
            margin-bottom: 30px;
        }
        .card__price span {
            font-size: 60%;
        }
        .card__method {
            color: #d3cece;
            text-transform: uppercase;
            text-align: left;
            font-size: 11px;
            margin-bottom: 5px;
        }
        .card__payment {
            background-color: #fff;
            border-radius: 4px;
            width: 100%;
            height: 100px;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card__credit-card {
            width: 50px;
            display: inline-block;
            margin-right: 15px;
        }
        .card__card-details {
            display: inline-block;
            text-align: left;
        }
        .card__card-type {
            text-transform: uppercase;
            color: #232528;
            font-weight: 600;
            font-size: 12px;
            margin-bottom: 3px;
        }
        .card__card-number {
            color: #838890;
            font-size: 12px;
            margin-top: 0px;
        }
        .card__tags {
            clear: both;
            padding-top: 15px;
        }
        .card__tag {
            text-transform: uppercase;
            background-color: #f8f6f6;
            box-sizing: border-box;
            padding: 3px 5px;
            border-radius: 3px;
            font-size: 10px;
            color: #d3cece;
        }

    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark navbar-light" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img id="logo" src="https://webforger.fr/images/logo.svg" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/webforger.fr" class="nav-link">Go back to webforger.fr</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container top-margin">
    <div class="bg">

        <div class="card">

            <span class="card__success"><img src="/assets/img/shield-check.svg"/></span>

            <h1 class="card__msg">Paiement accepté</h1>
            <h2 class="card__submsg">Merci pour votre paiement</h2>

            <div class="card__body">

                <h1 class="card__price"><span>€</span>{{ $total }}<span>.{{ $cents }}</span></h1>

                <p class="card__method">Payment method</p>
                <div class="card__payment">
                    <img src="/assets/img/paypal.svg" class="card__credit-card">
                    <div class="card__card-details">
                        <p class="card__card-type">Paypal</p>
                    </div>
                </div>

            </div>

            <div class="card__tags">
                <span class="card__tag">completed</span>
                <span class="card__tag">#{{ $invoice->invoice_number }}</span>
                <span class="card__tag">{{ $invoice->unique_hash }}</span>
            </div>
        </div>
    </div>
</div>

</body>
</html>
