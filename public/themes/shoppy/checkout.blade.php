@extends('shoppy.layout')

@section('title','Checkout')

@section('style')
   
@endsection


@section('content')
   <nav aria-label="breadcrumb" class="breadcrumb-nav">
         <div class="container">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
               <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
         </div><!-- End .container -->
   </nav>

   <div class="container">

         <ul class="checkout-progress-bar">
            <li class="active" id="shipping">
               <span>Shipping</span>
            </li>
            <li class="" id="review">
               <span>Review</span>
            </li>
            <li class="" id="payment">
               <span>Payments</span>
            </li>
         </ul>


         <div class="row">
            <div class="col-lg-8">

               <ul class="checkout-steps">
          
                  <li> 
                     @if(!Auth::user())
                     <!-- Login section if not loggedin -->
                     <div class="login-box">
                        <h2 class="step-title">Shipping Address</h2>
                        <form action="#">
                              <div class="form-group required-field">
                                 <label>Email Address </label>
                                 <div class="form-control-tooltip">
                                    <input type="email" class="form-control" required>
                                    <span class="input-tooltip" data-toggle="tooltip" title="We'll send your order confirmation here." data-placement="right"><i class="icon-question-circle"></i></span>
                                 </div><!-- End .form-control-tooltip -->
                              </div><!-- End .form-group -->

                              <div class="form-group required-field">
                                 <label>Password </label>
                                 <input type="password" class="form-control" required>
                              </div><!-- End .form-group -->
                              
                              <p>You already have an account with us. Sign in or continue as guest.</p>
                              <div class="form-footer">
                                 <button type="submit" class="btn btn-primary">LOGIN</button>
                                 <a href="forgot-password.html" class="forget-pass"> Forgot your password?</a>
                              </div><!-- End .form-footer -->
                        </form>
                     </div><!-- Login section if not loggedin -->
                     @endif

                     <div class="contact-box" style="display:none">
                        <form action="#">
                              <div class="form-group required-field">
                                 <label>First Name </label>
                                 <input type="text" class="form-control input-small" required>
                              </div><!-- End .form-group -->

                              <div class="form-group required-field">
                                 <label>Last Name </label>
                                 <input type="text" class="form-control" required>
                              </div><!-- End .form-group -->

                              <div class="form-group">
                                 <label>Company </label>
                                 <input type="text" class="form-control">
                              </div><!-- End .form-group -->

                              <div class="form-group required-field">
                                 <label>Street Address </label>
                                 <input type="text" class="form-control" required>
                                 <input type="text" class="form-control" required>
                              </div><!-- End .form-group -->

                              <div class="form-group required-field">
                                 <label>City  </label>
                                 <input type="text" class="form-control" required>
                              </div><!-- End .form-group -->

                              <div class="form-group">
                                 <label>State/Province</label>
                                 <div class="select-custom">
                                    <select class="form-control">
                                          <option value="CA">California</option>
                                          <option value="TX">Texas</option>
                                    </select>
                                 </div><!-- End .select-custom -->
                              </div><!-- End .form-group -->

                              <div class="form-group required-field">
                                 <label>Zip/Postal Code </label>
                                 <input type="text" class="form-control" required>
                              </div><!-- End .form-group -->

                              <div class="form-group">
                                 <label>Country</label>
                                 <div class="select-custom">
                                    <select class="form-control">
                                          <option value="USA">United States</option>
                                          <option value="Turkey">Turkey</option>
                                          <option value="China">China</option>
                                          <option value="Germany">Germany</option>
                                    </select>
                                 </div><!-- End .select-custom -->
                              </div><!-- End .form-group -->

                              <div class="form-group required-field">
                                 <label>Phone Number </label>
                                 <div class="form-control-tooltip">
                                    <input type="tel" class="form-control" required>
                                    <span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
                                 </div><!-- End .form-control-tooltip -->
                              </div><!-- End .form-group -->
                        </form>
                     </div>
                  </li>

                  <!-- Shipping method section -->
                  <li>
                     <div class="checkout-step-shipping">
                        <h2 class="step-title">Shipping Methods</h2>

                        <table class="table table-step-shipping">
                              <tbody>
                                 <tr>
                                    <td><input type="radio" name="shipping-method" value="flat"></td>
                                    <td><strong>&#8377 20.00</strong></td>
                                    <td>Fixed</td>
                                    <td>Flat Rate</td>
                                 </tr>

                                 <tr>
                                    <td><input type="radio" name="shipping-method" value="best"></td>
                                    <td><strong>&#8377 15.00</strong></td>
                                    <td>Table Rate</td>
                                    <td>Best Way</td>
                                 </tr>
                              </tbody>
                        </table>
                     </div><!-- End .checkout-step-shipping -->
                  </li><!-- Shipping method section -->

               </ul>
            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">

               <div class="cart-summary">
                  <h3>Summary</h3>

                  <h4>
                     <a data-toggle="collapse" href="#total-estimate-section" class="collapsed" role="button" aria-expanded="false" aria-controls="total-estimate-section">Estimate Shipping and Tax</a>
                  </h4>

                  <div class="collapse" id="total-estimate-section">
                     <form action="#">
                        <div class="form-group form-group-sm">
                              <label>Country</label>
                              <div class="select-custom">
                                 <select class="form-control form-control-sm">
                                    <option value="USA">United States</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="China">China</option>
                                    <option value="Germany">Germany</option>
                                 </select>
                              </div><!-- End .select-custom -->
                        </div><!-- End .form-group -->

                        <div class="form-group form-group-sm">
                              <label>State/Province</label>
                              <div class="select-custom">
                                 <select class="form-control form-control-sm">
                                    <option value="CA">California</option>
                                    <option value="TX">Texas</option>
                                 </select>
                              </div><!-- End .select-custom -->
                        </div><!-- End .form-group -->

                        <div class="form-group form-group-sm">
                              <label>Zip/Postal Code</label>
                              <input type="text" class="form-control form-control-sm">
                        </div><!-- End .form-group -->

                        <div class="form-group form-group-custom-control">
                              <label>Flat Way</label>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="flat-rate">
                                 <label class="custom-control-label" for="flat-rate">Fixed $5.00</label>
                              </div><!-- End .custom-checkbox -->
                        </div><!-- End .form-group -->

                        <div class="form-group form-group-custom-control">
                              <label>Best Rate</label>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="best-rate">
                                 <label class="custom-control-label" for="best-rate">Table Rate $15.00</label>
                              </div><!-- End .custom-checkbox -->
                        </div><!-- End .form-group -->
                     </form>
                  </div><!-- End #total-estimate-section -->

                  <table class="table table-totals">
                     <tbody>
                        <tr>
                              <td>Subtotal</td>
                              <td>&#8377 17.90</td>
                        </tr>

                        <tr>
                              <td>Tax</td>
                              <td>&#8377 0.00</td>
                        </tr>
                     </tbody>
                     <tfoot>
                        <tr>
                              <td>Order Total</td>
                              <td>&#8377 17.90</td>
                        </tr>
                     </tfoot>
                  </table>

                  
               </div><!-- End .cart-summary -->

               <div class="checkout-info" style=display:none>
                  <div class="checkout-info-box">
                        <h3 class="step-title">Ship To:
                           <a href="#" title="Edit" class="step-title-edit"><span class="sr-only">Edit</span><i
                                    class="icon-pencil"></i></a>
                        </h3>

                        <address>
                           Desmond Mason <br>
                           123 Street Name, City, USA <br>
                           Los Angeles, California 03100 <br>
                           United States <br>
                           (123) 456-7890
                        </address>
                  </div><!-- End .checkout-info-box -->

                  <div class="checkout-info-box">
                        <h3 class="step-title">Shipping Method:
                           <a href="#" title="Edit" class="step-title-edit"><span class="sr-only">Edit</span><i
                                    class="icon-pencil"></i></a>
                        </h3>

                        <p>Flat Rate - Fixed</p>
                  </div><!-- End .checkout-info-box -->
               </div>

            </div><!-- End .col-lg-4 -->

         </div><!-- End .row -->

         <div class="row">
            <div class="col-lg-12">
               <div class="checkout-steps-action">
                  <a href="javascript:void(0)" class="btn btn-primary float-right" id="checkout-pay" style="display:none">Checkout and Pay</a>
                  <a href="javascript:void(0)" class="btn btn-primary float-right" id="checkout-next" style="margin-right:10px;">Next</a>
                  <a href="javascript:void(0)" class="btn btn-primary float-right" id="checkout-back" style="display:none">Back</a>
               </div><!-- End .checkout-steps-action -->
            </div><!-- End .col-lg-8 -->
         </div><!-- End .row -->

   </div><!-- End .container -->

   <div class="mb-6"></div><!-- margin -->
@endsection


@section('javascript')
   <script>
      $(function(){
         'use strict'

         var shipping=true;
         var review=false;
         var payment=false;
         //Next button click
         $("#checkout-next").button().click(function(){
            $("#checkout-back").show();
            $("#checkout-pay").show();
            $("#checkout-next").hide();
            $( "#review" ).addClass( "active" );
            $( "#shipping" ).removeClass( "active" );
         });
         
         //previous button click
         $("#checkout-back").button().click(function(){
            $("#checkout-back").hide();
            $("#checkout-next").show();
            $("#checkout-pay").hide();
            $( "#review" ).removeClass( "active" );
            $( "#shipping" ).addClass( "active" );
            $( "#payment" ).removeClass( "active" );
            
         });

         //Checkout & Pay
         $("#checkout-pay").button().click(function(){
            $( "#review" ).removeClass( "active" );
            $( "#payment" ).addClass( "active" );
         });

      });
   </script>
@endsection

