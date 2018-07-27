<!doctype html>
<html lang="en" ng-app="cmsDG">
    <head>
        <base href="/">
        <meta charset="UTF-8">
        <title>CMS DG</title>
        <script type="application/javascript" src="{{ elixir('js/all.js')}}"></script>
        <link rel="stylesheet" href="{{ elixir('css/app.css')}}"/>
        <link rel="stylesheet" href="{{ elixir('css/all.css')}}"/>
        <link rel="stylesheet" href="{{ elixir('fonts/css/all.css')}}"/>
        <link rel="stylesheet" href="{{ elixir('css/bootstrap.css')}}"/>
    </head>
    <body ng-controller="MainController" ng-init="getAuthenticatedUser()">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">CMS DG</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Dashboard</a></li>
                    <li><a href="#">Modules</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li ng-if="!authenticatedUser" ng-class="{active:isActive('/auth/signup')}"><a href="/auth/signup"><i class="fa fa-user"></i> Sign Up</a></li>
                    <li ng-if="!authenticatedUser" ng-class="{active:isActive('/auth/login')}"><a href="/auth/login"><i class="fa fa-sign-in-alt"></i> Login</a></li>
                    <li ng-if="authenticatedUser" ng-class="{active:isActive('/users/view/' + authenticatedUser.id)}">
                        <a ng-href="/users/view/@{{authenticatedUser.id}}">
                            @{{authenticatedUser.username}}
                        </a>
                    </li>
                    <li ng-if="authenticatedUser" ng-click="logout()">
                        <a ng-href="#">
                            Log out
                        </a>
                    </li>
                </ul>
            </div>
        </nav> 
        <div class="container">
            <div ng-view>
            </div>
        </div>
    </body>
</html>
