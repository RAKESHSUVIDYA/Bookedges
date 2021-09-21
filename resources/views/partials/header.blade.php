<!-- Bootstrap -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<link href="{{asset('css/ace-responsive-menu.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<div class="header_top">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="col-md-2 hdr_top"><a href="{{url('/')}}"><img src="{{url('/storage/')}}/{{setting('site.logo')}}" alt="logo" style="max-width: 225px;margin-top: 15px;"></a></div>
            <form class="" action="{{route('shop.search',['query'=>request()->input('query')])}}">
            <div class="col-md-7 ipt_mn2">
               
               <div class="input-group custom-search-form">
                
                  <input type="text" name="query" class="form-control inpt2" placeholder="Search for products...">
                  <span class="input-group-btn">
                     <button type="submit" class="btn btn-default bttsrc" type="button">
                        <span class="glyphicon glyphicon-search">
                           <p>Search</p>
                        </span>
                     </button>
                  </span>
                
               </div>
               
            </div>
            </form>
            <div class="col-md-3">
               <div class="cart_mn">
                  <a href="{{url('cart')}}">
                  <img src="{{asset('images/spg.png')}}" alt=""> Cart
                  @if(count(Cart::getcontent())>0)
                  <span class="item-count">{{count(Cart::getcontent())}}</span>
                  @endif
                  </a>   
                  @auth
                  <a href="/dashboard">Dashboard</a>
                  @else
                  <a href="#" role="button" data-toggle="modal" data-target="#login-modal">
                  <img src="{{asset('images/user1.png')}}" alt=""> Sign In</a>
                  @endauth
               </div>
            </div>
            <!-- Modal4 side  -->				  
            
            <!-- Modal4 side  -->				  
            <!-- BEGIN # MODAL LOGIN -->
            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header" align="center">
                        <h2>Sign In</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove cencl" aria-hidden="true"></span>
                        </button>
                     </div>
                     <!-- Begin # DIV Form -->
                     <div id="div-forms">
                        <!-- Begin # Login Form -->
                        <form id="login-form">
                           <div class="modal-body">
                              <input id="login_username" class="form-control" type="text" placeholder="Email Address" required>
                              <input id="login_password" class="form-control" type="password" placeholder="Password" required>
                              <div class="checkbox">
                                 <label>
                                 <input type="checkbox"> Remember me
                                 </label>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <div>
                                 <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                              </div>
                              <div>
                                 <button id="login_register_btn" type="button" class="btn btn-link"> Forgot your password?</button>
                              </div>
                           </div>
                        </form>
                        <!-- End # Login Form -->
                        <!-- Begin | Lost Password Form -->
                        <form id="lost-form" style="display:none;">
                           <div class="modal-body">
                              <div id="div-lost-msg">
                                 <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                 <span id="text-lost-msg">Type your e-mail.</span>
                              </div>
                              <input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
                           </div>
                           <div class="modal-footer">
                              <div>
                                 <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                              </div>
                              <div>
                                 <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                                 <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                              </div>
                           </div>
                        </form>
                        <!-- End | Lost Password Form -->
                        <!-- Begin | Register Form -->
                        <form id="register-form" style="display:none;">
                           <div class="modal-body">
                              <input id="register_username" class="form-control" type="text" placeholder="Number" required>
                              <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                              <input id="register_password" class="form-control" type="password" placeholder="Password" required>
                           </div>
                           <div class="modal-footer">
                              <div>
                                 <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                              </div>
                              <div>
                                 <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                                 <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                              </div>
                           </div>
                        </form>
                        <!-- End | Register Form -->
                     </div>
                     <!-- End # DIV Form -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<header class="header2_mn" >
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-2 col-md-12 right_nav">
            <nav>
               <!-- Menu Toggle btn-->
               <div class="menu-toggle" style="display: none;">
                  <h3>Menu</h3>
                  <button type="button" id="menu-btn">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
               </div>
               <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
               {{menu('header_menu','partials.header-menu')}}
               <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown" aria-controls="pages_submenu" aria-expanded="false" aria-label="Toggle pages menu item">
                                <span class="nav-link-inner-text">{{Auth::user()?Auth::user()->name:'My account'}}</span>
                                
                            </a>
                            <ul class="dropdown-menu" id="pages_submenu">
                                @if (Auth::user())
                                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="#" id="logout-btn">Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form> 
                                @else
                                    <li><a class="dropdown-item" href="/login">Login</a></li>
                                    <li><a class="dropdown-item" href="/register">Register</a></li> 
                                @endif
                            </ul>
                        </li>
              
                  
               </ul>
            </nav>
         </div>
      </div>
   </div>
</header>
<!--count no-->
<script>
   function up(max) {
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
    if (document.getElementById("myNumber").value >= parseInt(max)) {
        document.getElementById("myNumber").value = max;
    }
   }
   function down(min) {
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
    if (document.getElementById("myNumber").value <= parseInt(min)) {
        document.getElementById("myNumber").value = min;
    }
   }
</script>
<!--count no-->