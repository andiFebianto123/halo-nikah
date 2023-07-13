<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Hello Nikah - Struk Pembelian</title>
    <style>
        .page-break {
            page-break-after: always;
        }
        body {
            /* background-color: salmon; */
            font-family: Arial, Helvetica, sans-serif;
        }
        #header {
            /* overflow: hidden; */
        }
        #header .logo {
            float:left;
            height: 60px;
            width: 100%;
        }

        #tgl {
            margin-top: 30px;
        }

        table {
            margin-top: 12px;
            border-collapse: collapse;
            width: 100%:
        }

        table tr th, td {
            border:1px solid black;
            padding-top: 7px;
            padding-bottom: 7px;
        }
        
        #information {
            width: 40%;
            padding-left: 8px;
            padding-bottom: 8px;
            border: 1px solid gray;
            margin-top: 20px;
        }

        #information h3 {
            /* padding-top: 8px; */
        }
        #description {
            margin-top: 8px;
        }

    </style>
</head>
<body>
    <div id="header">
        <div class="logo">
            <center>
                <img src="{{ public_path("assets/images/logo/HELLOGO.jpg") }}" alt="" style="height:60px;"/>
            </center>
        </div>
    </div>
    <div style="margin-top: 53pt;">
        <center>
            <h2>INVOICE</h2>
        </center>
    </div>
    <div id="tgl">
        <span>Senin, 23 Oktober 2023</span>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th style="width:40px;">No</th>
                    <th style="width: 230px;">Product Name</th>
                    <th style="width: 160px;">Price</th>
                    <th style="width: 70px;">Qty</th>
                    <th style="width: 160px;">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;  
                    $total_amount = 0;
                @endphp
                @foreach ($carts as $item)
                @php
                    $total_price = (int) $item['qty'] * (int) $item['price'];
                    $total_amount += $total_price;
                @endphp
                <tr>
                    <td><center>{{ $no }}</center></td>
                    <td>{{ $item['name'] }}</td>
                    <td><center>{{ price_format($item['price'])  }}</center></td>
                    <td><center>{{ $item['qty'] }}</center></td>
                    <td><center>{{ price_format($total_price) }}</center></td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
                <tr>
                    <td colspan="3">Total Amount</td>
                    <td colspan="2">
                        <center>
                            <strong>{{ price_format($total_amount) }}</strong>
                        </center>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="information">
        <h3>Contact Custommer Service :</h3>
        <span>Puji Rahayu (087588988493)</span><br>
        <span>Alvin Gandhi (087588988493)</span>
    </div>
    <div id="description">
        <span>
            <i>*) Silahkan hubungi customer service diatas 
            guna melakukan proses lebih lanjut serta melakukan pembayarannya. 
            Terima Kasih</i>
        </span>
    </div>
</body>
</html>