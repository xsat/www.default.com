<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Back Layout</title>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/admin.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url(['for': 'home-admin']) }}">
                        Home
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    {{ partial('partials/menu/default') }}
                </div>
            </div>
        </nav>
        <div class="container main">
            {{ content() }}
            <footer class="footer">
                © {{ date('Y') }} Default, Inc.
            </footer>
        </div>
        <script src="/js/jquery-3.1.0.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/admin.js"></script>
    </body>
</html>