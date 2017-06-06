<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>智能点餐网</title>

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
    </style>

    <script type="text/javascript">
        'use strict';

        function ajaxLog(s) {
            var txt = $('#div1');
            // txt.text('');
            txt.text(txt.text() + '\n' + s);
        }

        $('#div1').text('');
        function ajaxLoad(url)
        {
            // $("#div1").load(url);
            var jqxhr = $.getJSON(url, {
                dataType: 'json'
                }).done(function (data) {
                    ajaxLog('成功, 收到的数据: ' + data['2']);
                }).fail(function (xhr, status) {
                    ajaxLog('失败: ' + xhr.status + ', 原因: ' + status);
                }).always(function () {
                    ajaxLog('请求完成: 无论成功或失败都会调用');
                });
        }
    </script>
</head>
<body>
<!-- <div class="container">
    <button type="button" onclick="ajaxLoad('/test2')">test</button>
    <div id="show"></div>
</div> -->
<div id="div1"><h2>使用 jQuery AJAX 修改文本内容</h2></div>
<button onclick="ajaxLoad('/test2')">获取外部内容</button>
</body>
</html>