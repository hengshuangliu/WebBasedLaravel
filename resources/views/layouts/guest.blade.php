<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/pic/diandian.ico" media="screen" />
    <title>点点网</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: 'Raleway';
            margin-top: 25px;
        }

        .fa-btn {
            margin-right: 6px;
        }

        .table-text div {
            padding-top: 6px;
        }
        .copyRight {
            color: #828282;
            text-align: center;
        }

    </style>

    <script type="text/javascript">
        'use strict';

        function ajaxLog(data) {
            var tbody = $('#for-current-dishes');
            var lable =  $('#total');
            if ($('#orderDish-'+data['orderDish']).length == 0)
            {
                var txt0 = "<tr id=\"orderDish-";
                var txt1 = "\"> <td class='table-text'><div>";
                var txt2 = "</div></td><td class='table-text'><div>";
                var txt3 = "</div></td>";
                var txt4 = "<td class=\"table-text\"><div for=\'amount\'>";
                var txt5 = "</div></td>";
                var txt6 = "<td><button onclick=\"dishDel(\'/guest/destroy/orderDish/";
                var txt7 = "\')\" class=\'btn\'><i class=\'fa fa-btn fa-trash\'></i>删除</button></td></tr>";
                tbody.append(txt0 + data["orderDish"] + txt1 + data['name'] + txt2 + data['price'] + txt3 + txt4 + data["amount"] + txt5 + txt6 + data["orderDish"] + txt7);
                tbody.append($('#orderDish-'+data['orderDish']));
            }
            else
            {
                var amount = $('#orderDish-'+data['orderDish']+" div[for=amount]");
                amount.text('');
                amount.text(data['amount']);
            }

            lable.text('');
            lable.text('Total: ' + data['total']);

        }

        $('#for-current-dishes').text('');
        $('#total').text('');
        function ajaxLoad(url)
        {
            var jqxhr = $.getJSON(url, {
                dataType: 'json'
                }).done(function (data) {
                    ajaxLog(data);
                }).fail(function (xhr, status) {
                    alert('失败: ' + xhr.status + ', 原因: ' + status);
                })
        }


        function ajaxDel(data) {
            var lable =  $('#total');
            if (data["amount"]=="0")
            {
                var orderDish = $("#orderDish-"+data["orderDish"]);
                orderDish.remove();
            }
            else
            {
                var amount = $('#orderDish-'+data['orderDish']+" div[for=amount]");
                amount.text('');
                amount.text(data["amount"]);
            }
            lable.text('');
            lable.text('Total: ' + data['total']);

        }
        function dishDel(url)
        {
            // alert(url);
            var jqxhr = $.getJSON(url, {
                dataType: 'json'
                }).done(function (data) {
                    ajaxDel(data);
                }).fail(function (xhr, status) {
                    alert('失败: ' + xhr.status + ', 原因: ' + status);
                })
        }
    </script>

</head>

<body>
        <div class="row clearfix" style="background-color:#00B2EE;color:#fff;">
        <div class="col-md-12 column">
            <div class="page-header" >
                <h3 style="text-align: center;">
                    点点网
                </h3>
            </div>
        </div>
    </div>
<div class="container">
@yield('content')
        <div class="col-md-12 column" >
            <div id="footer">
                <div class="copyRight">
                    Copyright ©2010-2017ELAC 实验室 版权所有
                </div>
            </div>

        </div>
    </div>

</body>
</html>


<div class="container">

</div>