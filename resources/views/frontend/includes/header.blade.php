<div class="header">
    <div class="header-top">
        <div class="container">
             <div class="top-left">
                <a href="{{ '/' }}"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
            </div>
            <div class="top-right">
            <ul>
                <li><a href="#">Checkout</a></li>
                @if (auth()->check())
                <li><a href="#" class="badge badge-danger">{{auth()->user()->name }}</a></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @else
                <li><a href="{{ url('/user/login')  }}">User Login</a></li>
                <li><a href="{{ url('/user/register') }}">User register </a></li>
                @endif
                @if (session()->has('vendorId'))
                <li><a href="{{ url('/vendor/deshboard') }}" class="badge badge-danger"> {{ session()->get('vendorName') }}</a></li>
                <li><a href="{{ url('/vendor/logout') }}">Logout </a></li>
                @else
                <li><a href="{{ url('/vendor/login')  }}">Vendor Login</a></li>
                <li><a href="{{ url('/vendor/register') }}">Vendor Register </a></li>
                @endif
            </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="heder-bottom">
        <div class="container">
            <div class="logo-nav">
                <div class="logo-nav-left">
                    <h1><a href="{{ '/' }}">New Shop <span>Shop anywhere</span></a></h1>
                </div>
                <div class="logo-nav-left1">
                    <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{ '/' }}" class="act">Home</a></li>
                            <!-- Mega Menu -->
                            @foreach ($categories as $category)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name}}<b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        <div class="col-sm-3  multi-gd-img">
                                            @foreach ($category->Subcategory as $subcategory )

                                            <ul class="multi-column-dropdown">
                                                <h6>Submenu1</h6>
                                                <li><a href="products.html">{{$subcategory->name }}</a></li>
                                            </ul>
                                            @endforeach

                                        </div>
                                        <div class="col-sm-3  multi-gd-img">
                                                <a href="products.html"><img src="{{ asset('frontend/assets/') }}/images/woo.jpg" alt=" "/></a>
                                        </div>
                                        <div class="col-sm-3  multi-gd-img">
                                                <a href="products.html"><img src="{{ asset('frontend/assets/') }}/images/woo1.jpg" alt=" "/></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            @endforeach


                        </ul>
                    </div>
                    </nav>
                </div>
                <div class="header-right2">
                    <div class="cart box_1">
                        <a href="checkout.html">
                            <h3> <div class="total">
                                <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
                                <img src="images/bag.png" alt="" />
                            </h3>
                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
