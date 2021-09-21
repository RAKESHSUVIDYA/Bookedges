<footer class="footer_mn">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="col-md-4 footer_left">
               <img src="{{url('/storage/')}}/{{setting('site.footer_logo')}}" alt="logo" style="max-width: 225px;margin-top: 15px;">
               <p> {{setting('site.description')}} 
               </p>
               <h3>PAYMENTS</h3>
               <img src="{{asset('images/cd.png')}}" alt="">
            </div>
            <div class="col-md-8 search_mn">
               <h3>Refer and get free services</h3>
               <div class="col-md-9 row cmm4">
                  <div class="form-group">
                     <label class="sr-only" for="location">Location</label>
                     <input type="email" class="form-control httb5" id="location" placeholder="Search for a service ">
                  </div>
               </div>
               <div class="col-md-3 cmm5">
                  <button type="submit" class="btn btn-default btn-primary serc1" style=" background: #8eb921;"><i class="fa fa-search"></i> Search</button>
               </div>
               <div class="search_mn_pic">
                  <ul>
                     <li>  
                        <a href="#"><img src="{{asset('images/googlepay.png')}}" alt=""></a>
                     </li>
                     <li>
                        <a href="#"><img src="{{asset('images/aap.png')}}" alt=""></a>
                     </li>
                  </ul>
               </div>
               <div class="link_mn">
                  <div class="col-md-6 row">
                     <div class="link_tex">
                        <h3>QUICK LINKS</h3>
                        <hr>
                        <div class="link_tex2">
                           <ul>
                           {{menu('footer_menu','partials.footer-menu-list')}}
                              
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 row">
                     <div class="link_tex3">
                        <h3>CONTACTS US</h3>
                        <hr>
                        <div class="link_tex3">
                           <ul>
                              <li>                        
                                 <a href="#"><i class="fa fa-envelope-o"> </i> Mail id: {{setting('contact.email')}}</a>
                              </li>
                              <li>                        
                                 <a href="#"><i class="fa fa-phone"></i> Number: {{setting('contact.phone')}}</a>
                              </li>
                              <li style="line-height: 30px;">                        
                                 <a href="#"><i class="fa fa-map-marker"></i>  Address: {{setting('contact.location')}}</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
<div class="footer-bottom">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-6 col-xs-12 cptex">
            <p>{{setting('site.footer_text')}}</p>
         </div>
         <div class="col-md-6 col-sm-6 col-xs-12 cptex">
            <ul>
               <li>Follow Us:</li>
               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/ace-responsive-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('js/owl.carousel.min.js')}}" type="text/javascript"></script>
<!-- Datatables JS -->
    <script src="/frontend/assets/js/datatables.min.js"></script>
    
    <script src="/frontend/vendor/popper.js/dist/umd/popper.min.js"></script>
    
    <script src="/frontend/vendor/headroom.js/dist/headroom.min.js"></script>
<!--Plugin Initialization-->
<script>
   function up(max) {
    alert("hello");
    console.log($(this).parent().parent().html());
    $(this).parent().closest('.fmwd').val($(this).parent().closest('.fmwd').val() + 1);
    if ($(this).parent().closest('.fmwd').val() >= parseInt(max)) {
        $(this).parent().closest('.fmwd').val(max);
    }
   }
   function down(min) {
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
    if (document.getElementById("myNumber").value <= parseInt(min)) {
        document.getElementById("myNumber").value = min;
    }

   }

   var minVal = 1, maxVal = 20; // Set Max and Min values
// Increase product quantity on cart page
$(".increaseQty").on('click', function(){
    var $parentElm = $(this).parents(".qtySelector");
    $(this).addClass("clicked");
    setTimeout(function(){
      $(".clicked").removeClass("clicked");
    },100);
    var value = $parentElm.find(".qtyValue").val();
    if (value < maxVal) {
      value++;
    }
    $parentElm.find(".qtyValue").val(value);
    var end_val=$('#val_i').val();
    var qty=[];
    var id=[];
    var proid=[];

    for(var i=0;i<end_val;i++){
      qty[i]=$('#qty'+(i+1)).val();
      id[i]=$('#id'+(i+1)).val();
      proid[i]=$('#proid'+(i+1)).val();
    }
    
    $.ajax({
      type: "post",
      url: '/cart/update',
      data: { 'id': id, 'qty': qty,'proid': proid},
      success: function () {
         window.location.reload();
      },
      error: function (data) {
        alert('Error');
        console.log(data);
      }
    });
});
// Decrease product quantity on cart page
$(".decreaseQty").on('click', function(){
    var $parentElm = $(this).parents(".qtySelector");
    $(this).addClass("clicked");
    setTimeout(function(){
      $(".clicked").removeClass("clicked");
    },100);
    var value = $parentElm.find(".qtyValue").val();
    if (value > 1) {
      value--;
    }
    $parentElm.find(".qtyValue").val(value);
    var end_val=$('#val_i').val();
    var qty=[];
    var id=[];
    var proid=[];

    for(var i=0;i<end_val;i++){
      qty[i]=$('#qty'+(i+1)).val();
      id[i]=$('#id'+(i+1)).val();
      proid[i]=$('#proid'+(i+1)).val();
    }
    
    $.ajax({
      type: "post",
      url: '/cart/update',
      data: { 'id': id, 'qty': qty,'proid': proid},
      success: function () {
        // window.location.reload();
      },
      error: function (data) {
        alert('Error');
        console.log(data);
      }
    });
  });
</script>
<script type="text/javascript">
   $(document).ready(function () {
       $("#respMenu").aceResponsiveMenu({
           resizeWidth: '800', // Set the same in Media query       
           animationSpeed: 'fast', //slow, medium, fast
           accoridonExpAll: false //Expands all the accordion menu on click
       });
   });
</script>
<!-- logo slider -->
<script>
   $('.brand-carousel').owlCarousel({
     loop:true,
     margin:10,
     autoplay:true,
     responsive:{
       0:{
         items:2
       },
       600:{
         items:4
       },
       1000:{
         items:5
       }
     }
   })
   
</script>
<!-- logo slider -->
<script>
   $('.owl-carousel').owlCarousel({
     loop: false,
     rewind:true,
     margin: 10,
     dots: false,
     nav: true,
     navText: [
       "<i class='fa fa-caret-left'></i>",
       "<i class='fa fa-caret-right'></i>"
     ],
     autoplay: true,
     autoplayHoverPause: true,
     responsive: {
       0: {
         items: 1
       },
       600: {
         items: 2
       },
       1000: {
         items: 4
       }
     }
   })
   
</script>
<script>
   $(function() {
       
       var $formLogin = $('#login-form');
       var $formLost = $('#lost-form');
       var $formRegister = $('#register-form');
       var $divForms = $('#div-forms');
       var $modalAnimateTime = 300;
       var $msgAnimateTime = 150;
       var $msgShowTime = 2000;
   
       /*$("form").submit(function () {
           switch(this.id) {
               case "login-form":
                   var $lg_username=$('#login_username').val();
                   var $lg_password=$('#login_password').val();
                   if ($lg_username == "ERROR") {
                       msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                   } else {
                       msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
                   }
                   return false;
                   break;
               case "lost-form":
                   var $ls_email=$('#lost_email').val();
                   if ($ls_email == "ERROR") {
                       msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Send error");
                   } else {
                       msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-ok", "Send OK");
                   }
                   return false;
                   break;
               case "register-form":
                   var $rg_username=$('#register_username').val();
                   var $rg_email=$('#register_email').val();
                   var $rg_password=$('#register_password').val();
                   if ($rg_username == "ERROR") {
                       msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Register error");
                   } else {
                       msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "success", "glyphicon-ok", "Register OK");
                   }
                   return false;
                   break;
               default:
                   return false;
           }
           return false;
       });*/
       
       $('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
       $('#register_login_btn').click( function () { modalAnimate($formRegister, $formLogin); });
       $('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
       $('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });
       $('#lost_register_btn').click( function () { modalAnimate($formLost, $formRegister); });
       $('#register_lost_btn').click( function () { modalAnimate($formRegister, $formLost); });
       
       function modalAnimate ($oldForm, $newForm) {
           var $oldH = $oldForm.height();
           var $newH = $newForm.height();
           $divForms.css("height",$oldH);
           $oldForm.fadeToggle($modalAnimateTime, function(){
               $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                   $newForm.fadeToggle($modalAnimateTime);
               });
           });
       }
       
       function msgFade ($msgId, $msgText) {
           $msgId.fadeOut($msgAnimateTime, function() {
               $(this).text($msgText).fadeIn($msgAnimateTime);
           });
       }
       
       function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
           var $msgOld = $divTag.text();
           msgFade($textTag, $msgText);
           $divTag.addClass($divClass);
           $iconTag.removeClass("glyphicon-chevron-right");
           $iconTag.addClass($iconClass + " " + $divClass);
           setTimeout(function() {
               msgFade($textTag, $msgOld);
               $divTag.removeClass($divClass);
               $iconTag.addClass("glyphicon-chevron-right");
               $iconTag.removeClass($iconClass + " " + $divClass);
     		}, $msgShowTime);
       }
   });
   	  
</script>
<!-- Custom JS -->
    <script src="{{url('frontend/assets/js/custom.js')}}"></script>