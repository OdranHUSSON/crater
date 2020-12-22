<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style type="text/css">
        body {
            font-family: "DejaVu Sans";
        }

        html {
            margin: 0px;
            padding: 0px;
        }
        table {
            border-collapse: collapse;
        }

        .header-line {
            color:rgba(0, 0, 0, 0.2);
            position: absolute;
            top: 80px;
            left: 0px;
            right: -70px;
            width: 100%;
        }

        hr {
            color:rgba(0, 0, 0, 0.2);
            border: 0.5px solid #EAF1FB;
        }

        .items-table-hr{
            margin: 0 30px 0 30px;
        }


        .header-left {
            padding-top: 45px;
            padding-bottom: 45px;
            padding-left: 30px;
            display:inline-block;
            width:30%;
        }
        .header-table {
            position: absolute;
            width: 100%;
            height: 160px;
            left: 0px;
            top: -60px;
        }
        .header-logo {
            position: absolute;
            height: 50px;
            text-transform: capitalize;
            color: #817AE3;
        }
        .header-right {
            display:inline-block;
            position: absolute;
            right:0;
            padding: 15px 30px 15px 0px;
            float: right;
        }

        .header-right h1 {
            margin: 10px 0;
            font-size: 40px;
        }
        .inv-flex{
            display:flex;
        }
        .inv-data{
            text-align:right;
            margin-right:120px;
        }
        .inv-value{
            text-align:left;
            margin-left:160px;
        }
        .header {
            font-size: 20px;
            color: rgba(0, 0, 0, 0.7);
        }

        .TextColor1 {
            font-size: 16px;
            color: rgba(0, 0, 0, 0.5);
        }

        @page {
            margin-top: 60px !important;
        }
        .wrapper {
            display: block;
            padding-top: 50px;
            padding-bottom: 20px;
        }

        .address {
            display: inline-block;
            padding-top: 90px;
        }

        .bill-add {
            display: block;
            float:left;
            width:40%;
            padding: 0 0 0 30px;
        }
        .company {
            padding-left: 30px;
            display: inline;
            float:left;
            width:30%;
        }

        .company h1 {
            font-style: normal;
            font-weight: bold;
            font-size: 18px;
            line-height: 22px;
            letter-spacing: 0.05em;
        }

        .company-add {
            text-align: left;
            font-style: normal;
            font-weight: normal;
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            margin: 0px;
        }

        .company-add a {
            color:#7900D8;
            text-align: left;
        }

        /* -------------------------- */
        /* shipping style */
        .ship-to {
            padding-top: 5px;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 18px;
            margin-bottom: 0px;
        }

        .ship-user-name {
            padding: 0px;
            font-style: normal;
            font-weight: normal;
            font-size: 15px;
            line-height: 22px;
            margin: 0px;
        }

        .ship-user-address {
            font-style: normal;
            font-weight: normal;
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            margin: 0px;
            width: 160px;
        }

        .ship-user-phone {
            font-style: normal;
            font-weight: normal;
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            margin: 0px;
        }

        /* -------------------------- */
        /* billing style */
        .bill-to {
            padding-top: 5px;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 18px;
            margin-bottom: 0px;
        }

        .bill-user-name {
            padding: 0px;
            font-style: normal;
            font-weight: normal;
            font-size: 15px;
            line-height: 22px;
            margin: 0px;
        }

        .bill-user-address {
            font-style: normal;
            font-weight: normal;
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            margin:0px;
            width: 160px;
        }

        .bill-user-phone {
            font-style: normal;
            font-weight: normal;
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            margin: 0px;
        }


        .job-add {
            display: block;
            float: right;
            padding: 20px 30px 0 0;
        }
        .amount-due {
            background-color: #f2f2f2;
        }

        .textRight {
            text-align: right;
        }

        .textLeft {
            text-align: left;
        }

        .textStyle1 {
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 18px;
        }

        .textStyle2 {
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 18px;
            text-align: right;
        }

        .main-table-header th {
            background: #7900D8!important;
            color: #FFF!important;
        }
        .main-table-header td {
            padding: 10px;
        }
        .main-table-header {
            border-bottom: 1px solid red;
        }
        tr.main-table-header th {
            font-style: normal;
            font-weight: 600;
            font-size: 12px;
            line-height: 18px;
        }
        tr.item-details td {
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 18px;
        }
        .table2 {
            padding: 0px 30px 10px 30px;
            page-break-before: avoid;
            page-break-after: auto;
        }

        .table2 hr {
            height:0.1px;
        }

        .ItemTableHeader {
            font-size: 13.5;
            text-align: center;
            color: rgba(0, 0, 0, 0.85);
            padding: 5px;
        }

        .items {
            font-size: 13;
            color: rgba(0, 0, 0, 0.6);
            text-align: center;
            padding: 5px;
        }

        .note-header {
            font-size: 13;
            color: rgba(0, 0, 0, 0.6);
        }

        .note-text {
            font-size: 10;
            color: rgba(0, 0, 0, 0.6);
        }

        .padd8 {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .padd2 {
            padding-top: 2px;
            padding-bottom: 2px;
        }

        .table3 {
            border: 1px solid #EAF1FB;
            border-top: none;
            box-sizing: border-box;
            width: 630px;
            page-break-inside: avoid;
            page-break-before: auto;
            page-break-after: auto;
        }

        .text-per-item-table3 {
            border: 1px solid #EAF1FB;
            border-top: none;
            padding-right: 30px;
            box-sizing: border-box;
            width: 260px;
            /* height: 100px; */
            position: absolute;
            right: -25;
        }

        td.invoice-total1 {
            text-align:left;
            padding: 15px 0 15px 10px;
            font-size:12px;
            line-height: 18px;
            color: #55547A;
            border-bottom:1px solid #E8E8E8;
            border-top:1px solid #E8E8E8;
            border-left:1px solid #E8E8E8;
        }

        td.invoice-total2 {
            font-weight: 500;
            text-align: right;
            font-size:12px;
            line-height: 18px;
            padding: 15px 10px 15px 0;
            color: #5851DB;
            border-bottom:1px solid #E8E8E8;
            border-top:1px solid #E8E8E8;
            border-right:1px solid #E8E8E8;
        }

        .inv-item {
            border-color: #d9d9d9;
        }

        .no-border {
            border: none;
        }
        .desc {
            font-weight: 100;
            text-align: justify;
            font-size: 10px;
            margin-bottom: 15px;
            margin-top:7px;
            color:rgba(0, 0, 0, 0.85);
        }
        .company-details h1 {
            margin:0;
            font-style: normal;
            font-weight: bold;
            font-size: 15px;
            line-height: 22px;
            letter-spacing: 0.05em;
            text-align: left;
            max-width: 220px;
        }
        .company-details h4 {
            margin:0;
            font-style: normal;
            font-weight: 100;
            font-size: 18px;
            line-height: 25px;
            text-align: right;
        }
        .company-details h3 {
            margin-bottom:1px;
            margin-top:0;
        }
        tr.total td {
            border-bottom:1px solid #E8E8E8;
            border-top:1px solid #E8E8E8;
        }

        .notes {
            font-style: normal;
            font-weight: 300;
            font-size: 12px;
            color: #595959;
            margin-top: 15px;
            margin-left: 30px;
            width: 442px;
            text-align: left;
            page-break-inside: avoid;
        }

        .notes-label {
            font-style: normal;
            font-weight: normal;
            font-size: 15px;
            line-height: 22px;
            letter-spacing: 0.05em;
            color: #040405;
            width: 108px;
            height: 19.87px;
            padding-bottom: 10px;
        }


        table.stripped {
            width:100%!important;
        }

        table.stripped tr {
            height: 50px!important;
        }
        table.stripped tr:nth-child(even) {
            background: #FFF;
        }
        table.stripped tr:nth-child(odd) {
            background: #EFEFEF;
        }


        table.payment {
            border-top:1px solid #EFEFEF;
            width: 100%;
            text-align: center;
            font-weight: 200;
            color:#AFB0B0;
        }

        table.payment p {
            font-size:10px;
            line-height: 10px;
            margin:0!important;
        }

        table.payment p.small {
            line-height: 8px;
        }

        table.payment a {
            color:#7900D8;
        }

        table.payment th {
            font-size:18px;
            font-weight: thin;
            letter-spacing: 4px;
            padding-bottom:10px;
            color:#4C4B4C;
            text-transform: uppercase;
        }

        img.payment {
            width: 60px;
            margin:0;
        }

        #footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            width: 100%;
        }

        #footer-text {
            position: fixed;
            bottom: 3cm;
            left: 0cm;
            right: 0cm;
            height: 3.5cm;
            color:#4C4B4C;

            width: 100%;
        }
    </style>
</head>
<body>
<div class="header-table">
    <table width="100%">
        <tr>
            @if($logo)
                <td class="header-left">
                    <img class="header-logo" src="{{ $logo }}" alt="Company Logo">
            @else
                @if($invoice->user->company)
                    <td class="header-left">
                    <img class="header-logo" src="https://webforger.fr/images/logo.svg" alt="Webforger.fr"/>
                @endif
            @endif
                    </td>
                    <td class="header-right company-details">
                        <h1 style="text-transform: uppercase; font-size:28px; letter-spacing: 12px; font-weight:bolder;">Facture</h1>
                        @include('app.pdf.invoice.partials.company-address')
                    </td>
        </tr>
    </table>
</div>

<hr class="header-line">

<div class="wrapper">
    <div class="address">
        <div class="bill-add">
            <div style="float:left;">
                @include('app.pdf.invoice.partials.billing-address')
            </div>
            @if($invoice->user->billingaddress)
                <div style="float:right;">
                    @else
                        <div style="float:left;">
                            @endif
                            @include('app.pdf.invoice.partials.shipping-address')
                        </div>
                        <div style="clear: both;"></div>
                </div>

                <div class="job-add">
                    <table>
                        <tr>
                            <td class="textStyle1" style="text-align: left; color: #55547A">Facture N°</td>
                            <td class="textStyle2"> &nbsp;{{$invoice->invoice_number}}</td>
                        </tr>
                        <tr>
                            <td class="textStyle1" style="text-align: left; color: #55547A">Date </td>
                            <td class="textStyle2"> &nbsp;{{$invoice->formattedInvoiceDate}}</td>
                        </tr>
                        <tr>
                            <td class="textStyle1" style="text-align: left; color: #55547A">Paiement avant</td>
                            <td class="textStyle2"> &nbsp;{{$invoice->formattedDueDate}}</td>
                        </tr>
                    </table>
                </div>
                <div style="clear: both;"></div>
        </div>


        <table width="100%" class="table2 stripped" cellspacing="0" border="0">
            <tr class="main-table-header">
                <th width="2%" class="ItemTableHeader" style="text-align: right; color: #55547A; padding-right: 20px">#</th>
                <th width="40%" class="ItemTableHeader" style="text-align: left; color: #55547A; padding-left: 0px">Article</th>
                <th class="ItemTableHeader" style="text-align: right; color: #55547A; padding-right: 20px">Quantité</th>
                <th class="ItemTableHeader" style="text-align: right; color: #55547A; padding-right: 20px">Prix</th>
                @if($invoice->discount_per_item === 'YES')
                    <th class="ItemTableHeader" style="text-align: right; color: #55547A; padding-left: 10px">Promotion</th>
                @endif
                <th class="ItemTableHeader" style="text-align: right; color: #55547A;">Total</th>
            </tr>
            @php
                $index = 1
            @endphp
            @foreach ($invoice->items as $item)
                <tr class="item-details">
                    <td
                            class="inv-item items"
                            style="text-align: right; color: #040405; padding-right: 20px; vertical-align: top;"
                    >
                        {{$index}}
                    </td>
                    <td
                            class="inv-item items"
                            style="text-align: left; color: #040405;padding-left: 0px"
                    >
                        <span>{{ $item->name }}</span><br>
                        <span style="text-align: left; color: #595959; font-size: 9px; font-weight:300; line-height: 12px;">{!! nl2br(htmlspecialchars($item->description)) !!}</span>
                    </td>
                    <td
                            class="inv-item items"
                            style="text-align: right; color: #040405; padding-right: 20px"
                    >
                        {{$item->quantity}}
                    </td>
                    <td
                            class="inv-item items"
                            style="text-align: right; color: #040405; padding-right: 20px"
                    >
                        {!! format_money_pdf($item->price, $invoice->user->currency) !!}
                    </td>
                    @if($invoice->discount_per_item === 'YES')
                        <td class="inv-item items" style="text-align: right; color: #040405; padding-left: 10px">
                            @if($item->discount_type === 'fixed')
                                {!! format_money_pdf($item->discount_val, $invoice->user->currency) !!}
                            @endif
                            @if($item->discount_type === 'percentage')
                                {{$item->discount}}%
                            @endif
                        </td>
                    @endif
                    <td
                            class="inv-item items"
                            style="text-align: right; color: #040405;"
                    >
                        {!! format_money_pdf($item->total, $invoice->user->currency) !!}
                    </td>
                </tr>
                @php
                    $index += 1
                @endphp
            @endforeach
        </table>

        <hr class="items-table-hr">

        <table width="100%" cellspacing="0px" style="margin-left:420px; margin-top: 10px" border="0" class="table3 @if(count($invoice->items) > 12) page-break @endif">
            <tr>
                <td class="no-border" style="color: #55547A; padding-left:10px;  font-size:12px;">Sous-Total</td>
                <td class="no-border items padd2"
                    style="padding-right:10px; text-align: right;  font-size:12px; color: #040405; font-weight: 500;">{!! format_money_pdf($invoice->sub_total, $invoice->user->currency) !!}</td>
            </tr>

            @if ($invoice->tax_per_item === 'YES')
                @for ($i = 0; $i < count($labels); $i++)
                    <tr>
                        <td class="no-border" style="padding-left:10px; text-align:left; font-size:12px;  color: #55547A;">
                            {{$labels[$i]}}
                        </td>
                        <td class="no-border items padd2" style="padding-right:10px; font-weight: 500; text-align: right; font-size:12px;  color: #040405">
                            {!! format_money_pdf($taxes[$i], $invoice->user->currency) !!}
                        </td>
                    </tr>
                @endfor
            @else
                @foreach ($invoice->taxes as $tax)
                    <tr>
                        <td class="no-border" style="padding-left:10px; text-align:left; font-size:12px;  color: #55547A;">
                            {{$tax->name.' ('.$tax->percent.'%)'}}
                        </td>
                        <td class="no-border items padd2" style="padding-right:10px; font-weight: 500; text-align: right; font-size:12px;  color: #040405">
                            {!! format_money_pdf($tax->amount, $invoice->user->currency) !!}
                        </td>
                    </tr>
                @endforeach
            @endif

            @if ($invoice->discount_per_item === 'NO')
                <tr>
                    <td class="no-border" style="padding-left:10px; text-align:left; font-size:12px; color: #55547A;">
                        @if($invoice->discount_type === 'fixed')
                            Promotion
                        @endif
                        @if($invoice->discount_type === 'percentage')
                            Promotion ({{$invoice->discount}}%)
                        @endif
                    </td>
                    <td class="no-border items padd2" style="padding-right:10px; font-weight: 500; text-align: right; font-size:12px;  color: #040405">
                        @if($invoice->discount_type === 'fixed')
                            {!! format_money_pdf($invoice->discount_val, $invoice->user->currency) !!}
                        @endif
                        @if($invoice->discount_type === 'percentage')
                            {!! format_money_pdf($invoice->discount_val, $invoice->user->currency) !!}
                        @endif
                    </td>
                </tr>
            @endif
            <tr>
                <td style="padding:3px 0px"></td>
                <td style="padding:3px 0px"></td>
            </tr>
            <tr style="background: #7900D8; color:#FFF;">
                <td class="no-border total-border-left"
                    style="padding-left:10px; padding-bottom:10px; text-align:left; padding-top:20px; font-size:12px; "
                >
                    <label class="total-bottom"> Total </label>
                </td>
                <td
                        class="no-border total-border-right items padd8"
                        style="padding-right:10px; font-weight: 500; text-align: right; font-size:12px;  padding-top:20px; color: #FFF"
                >
                    {!! format_money_pdf($invoice->total, $invoice->user->currency)!!}
                </td>
            </tr>
        </table>

        @include('app.pdf.invoice.partials.notes')


    </div>

    <footer id="footer-text">
        <table class="payment">
            <tr>
                <th colspan="2">Méthodes de paiements</th>
                <td>
                    <p><img class="payment" src="assets/img/bank.svg" /></p>
                    <p class="small">HUSSON Odran Alex - Caisse d'Épargne Grand Est Europe</p>
                    <p>IBAN : FR76 1513 5005 0008 0047 7323 470</p>
                    <p>BIC/SWIFT : CEPAFRPP513</p>
                </td>
            </tr>
        </table>

        @if($siret)
            <p style="display: block; width: 100%; color:#000; text-align: center; font-size:8px;"><span style="text-transform: capitalize">{{ $estimate->user->company->name }}</span> / Odran HUSSON est une société enregistre avec le numéro de siret {{$siret}} <br>
        @endif
    </footer>
    <img id="footer" src="assets/img/invoice4footer.png" />
</body>
</html>
