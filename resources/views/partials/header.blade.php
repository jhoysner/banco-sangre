<header class="main-header">
    <a href="" class="logo" style="height: 69px;padding-top:10px">
        <span class="logo-mini"><b>BS</b></span>
        <span class="logo-lg">                               
             <img src="{{asset('images/logo.jpeg')}}" alt="" width="30%"  style="border-bottom:1px solid black;">
        </span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="botones">
            {{-- <a href="/" style="color: black;" class="btn btn-default" >
                4GSERVER.COM
            </a>   
            <a href="https://theimei.com/THE1218/main.php" style="color: black;" class="btn btn-default" target="_blank">
                THEIMEI.COM
            </a> --}}
        </div>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <span style="color:white;margin-right:2em;">
                        
                        {{auth()->user()->name}}   {{auth()->user()->apellidos}}
                    </span>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cogs"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Salir
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>                                                
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
