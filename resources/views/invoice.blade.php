<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
        <meta charset="utf-8">
        <title>Invoice</title>
        <style>
            .body{
                max-width: 55%;
                padding: 3%;
                border: 1px solid black;
            }
        </style>
</head>
<body style="margin-left: 12cm">

    <h1 style="padding-left: 5.5cm">Payment Invoice</h1>


<div class="body">
        <div style="text-align: center">
            <h3 style="margin: 0;">DHAMMA SCHOOL</h3>
            <h5 style="margin: 0;">example@example.comhhaa</h5>
        </div>
        <div class="content">
            <div style="margin: -2px;">
                <div style="float: left;">
                    <p>Invoice Number:- TWC-111111 </p>
                </div>
                <div style="float: right;">
                    <p style="margin-right: 20px;">
                        Date: {{$date}}
                    </p>
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="centre" style="text-align: center;">
                <h3>Invoice</h3>
            </div>
            <div>
                <p>Name: chamika</p>
            </div>
            <hr/>
            <div style="padding: 30px 0px 30px 0px;">
                <p class="amount">glass
                    <span style="float: right;"> {{$amount}}</span>
                </p>
            </div>
            <hr/>
            <p>Payment with Stripe</p>
        </div>

</div><br>

<a class="btn btn-success " href="{{url('/export_pdf')}}"><button>download</button> </a>
<a class="btn btn-success " href="{{url('/')}}"><button>home</button> </a>

</body>
</html>