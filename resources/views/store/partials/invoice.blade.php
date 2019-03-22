<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('webimages/logos/favicon.png') }}"><!-- Favicon -->
        <style>
            
            @font-face {
                font-family: 'Roboto', sans-serif,
                src: url({{ asset('/fonts/Roboto-Regular.ttf') }});
            }


            body { 
                font-family: Verdana, Geneva, sans-serif;
                font-size: 12px
            }
            .softhr { border-top: 1px solid #E4E4E4 }
            
            .invoice-ticket {
                padding: 20px;
                border: 1px solid #f9f9f9;
            }
            .header {
                background: #dbdbdb;
                padding: 15px;
                margin-bottom: 20px;
                position: relative
            }
            .header .right {
                position: absolute;
                right: 10px;
                top: 15px
            }

            .top-text {
                padding: 10px;
                border: 1px solid #dbdbdb;
                margin-bottom: 20px;
                
            }

            .content {
                margin-top: 20px
            }

            .bottom-data td {
                border-top: 1px solid #ccc;
                padding-top: 10px
            }

            .txtR { text-align: right }

            table {
                width: 100%;
                border: 1px solid #ccc;
                padding: 5px;
            }

            table thead {
                background-color: #dbdbdb;
            }
            table thead tr th {
                padding: 0 5px;
                height: 25px;
            }

            table tbody tr td {
                padding: 2px 5px;
            }
            
            table tbody tr.content {
                background: #f9f9f9
            }

            .footer {
                background: #f9f9f9;
                padding: 15px;
                margin-top: 20px;
                position: relative
            }
        </style>
    </head>
    <body>
        <div class="invoice">
            @yield('content')
        </div>
    </body>
</html>

