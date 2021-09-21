@extends('layouts.app')

@section('title', 'Contact')

@section('content')
  <!-- Hero -->
  <div class="best_mn">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1>Contact Us</h1>
                 
               </div>
            </div>
         </div>
      </div>
	  
	  
	  <div class="contact-page-area spc-equal">
            <div class="container">
                <div class="row">
        		<div class="col-sm-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>	
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif 
        			<div class="google-map">
        				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22569053.99236624!2d-5.337722996144012!3d46.329466435436565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited+Kingdom!5e0!3m2!1sen!2sbd!4v1505474067899" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen=""></iframe>
        			</div>
        			<div class="contact-middle">
        				<div class="row">
        					<div class="col-md-4 col-sm-4 col-xs-12">
        						<div class="inner-add">
        							<i class="fa fa-map-marker" aria-hidden="true"></i>
        							<h5>Address</h5>
        							<p> Address: Street address name, 0123 City 
                                       Nmae, 0123456</p>
        						</div>
        					</div>
        					<div class="col-md-4 col-sm-4 col-xs-12">
        						<div class="inner-phn">
        							<i class="fa fa-phone" aria-hidden="true"></i>
        							<h5>Phone number</h5>
        							<p><a href="tel:+3453-909-6565"> +01 234 567890</a></p>
        							<p><a href="tel:+3453-909-6565"> +01 234 567890</a></p>
        						</div>
        					</div>
        					<div class="col-md-4 col-sm-4 col-xs-12">
        						<div class="inner-email">
        							<i class="fa fa-envelope-o" aria-hidden="true"></i>
        							<h5>Email Address</h5>
        							<p><a href="mailto:infoname@gmail.com">Shizen@gmail.com</a></p>
        							<p><a href="www.yourname.com">www.Shizen.com</a></p>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="contact-area">
                        	<div id="form-messages"></div>
                            <form action="{{route('contact.post')}}" method="post">
                        @csrf
        					<fieldset>
        						<div class="row">                                      
        							<div class="col-md-6 col-sm-6 col-xs-12">
        								<div class=".css')}}"">
        									<label>Fast Name*</label>
        									<input type="text" id="firstNameLabel" name="name" class="form-control">
        								</div>
        							</div>
        							<div class="col-md-6 col-sm-6 col-xs-12">
        								<div class=".css')}}"">
        									<label>Last Name*</label>
        									<input type="text" id="lname" name="lname" class="form-control">
        								</div>
        							</div>
        						</div>
        						<div class="row">
        							<div class="col-md-6 col-sm-6 col-xs-12">
        								<div class=".css')}}"">
        									<label>Email*</label>
        									<input type="email" id="EmailLabel" name="email" class="form-control">
        								</div>
        							</div>
        							<div class="col-md-6 col-sm-6 col-xs-12">
        								<div class=".css')}}"">
        									<label>Subject</label>
        									<input class="form-control" id="lastNameLabel" placeholder="Subject" type="text" name="subject" required>
        								</div>
        							</div>
        						</div>
        						<div class="row"> 
        							<div class="col-md-12 col-sm-12 col-xs-12">    
        								<div class=".css')}}"">
        									<label>Message*</label>
        									<textarea cols="40" rows="10" id="message" name="message" class="textarea form-control"></textarea>
        								</div>
        							</div>
        							<div class="col-md-12 col-sm-12 col-xs-12">         
        								<div class=".css')}}" bottom-btn">
        									<button class="btn-send" type="submit">Submit Now</button>
        								</div>
        							</div>
        						</div>    
        					</fieldset>
        				</form>
        			</div>
        		</div>
                </div>
            </div>      
        </div>

@include('sections.brand')          
@endsection


