<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>BEST_R SYSTEM</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    {{ Html::style('assets/css/bootstrap.min.css') }}

    {{ Html::style('assets/css/animate.min.css') }}

    {{ Html::style('assets/css/paper-dashboard.css') }}

    {{ Html::style('http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css') }}

    {{ Html::style('https://fonts.googleapis.com/css?family=Muli:400,300') }}

    {{ Html::style('assets/css/themify-icons.css') }}

    {{ Html::style('assets/css/style.css') }}
</head>
<body>

<div class="wrapper">
@include('admin.layouts.sidebar')
    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!--button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button-->
                    <a class="navbar-brand" href="#">@yield('page')</a> <!--Dashboard Tittle-->
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-settings"></i>
                            
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/admin/logout') }}" class="logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>

{{ Html::script('assets/js/jquery-1.10.2.js') }}
{{ Html::script('assets/js/bootstrap.min.js') }}
{{ Html::script('assets/js/script.js') }}


</html>
