<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('webimages/logos/favicon.png') }}"><!-- Favicon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/invoice.css') }}">
    </head>
    <body>
        <div class="invoice">
            <div class="table-responsive">
                <span class="title">@yield('title')</span>
                <table id="TableList" class="table table-bordered table-striped custom-list">
                    <thead>
                        <tr>
                            @yield('table-titles')
                        </tr>
                    </thead>
                    <tbody>
                        @yield('table-content')
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>

