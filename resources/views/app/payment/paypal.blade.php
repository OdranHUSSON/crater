
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

        <div class="container">

            <section class="top-margin">
                <div class="row">
                    <div class="col-lg-5">
                        <h1>Invoice {{ $invoice->invoice_number }}</h1>
                    </div>
                    <div class="col-lg-7">
                        <a class="pay-now btn btn-primary" href="">Payer maintenant</a>
                    </div>
                </div>
            </section>

            <div class="hero-wrap js-fullheight fh">
                <div class="row">
                    <div class="col-lg-12">
                        <iframe src="/invoices/pdf/{{ $invoice->unique_hash }}" ></iframe>
                    </div>
                </div>
            </div>

            <section>
                <div class="row">
                    <div class="col-lg-5">
                        <p>À payer avant {{$invoice->due_date }}</p>
                    </div>
                    <div class="col-lg-7">
                        <a class="pay-now btn btn-primary" href="">Payer maintenant</a>
                    </div>
                </div>
            </section>

        </div>

    </body>
</html>
