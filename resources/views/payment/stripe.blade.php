<!DOCTYPE html>
<html>
   <head>
      <title>Stripe Payment Page - HackTheStuff</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

   </head>
   <body>
      
      <div class="container-fluid">

      
         <h1 class="text-center">Stripe Payment Page - Dhamma School</h1>
         <div class="row mt-5">
            <div class="col-4">

            </div>

           
            <div class="col-8" >
                  <div class=" display-table mb-3" >
                     <div class="row display-tr" >
                        <h3 class=" display-td" style="padding-left:4cm;">Payment Details</h3>
                     </div>
                  </div>

                     <div style="padding-left: 80px; width : 100%">

                     
                        <form  role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form" >
                           @csrf
                           <div class="form-row row" style="width: 8.1cm">
                              <div class="body col-sm-12" >
                                 @if (Session::has('success'))
                                 <div class="alert alert-success" style="height: 1.3cm; text-align:center;">
                                    <p>{{ Session::get('success') }}</p>
                                 </div>
                                 @endif
                              </div>
                                 <div class="body col-sm-12">
                                    @if(session()->has('message'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                 </div> 
                           </div>
                           <div class='form-row row'>
                              <div class='col-md-4 error form-group hide'>
                                 <div class='alert-danger alert' style="text-align: center;">Please Enter Valid Informations Only</div>
                              </div>
                           </div>
                           <div class='form-row row'>
                              <div class='col-xs-12 col-md-4 form-group required'>
                                 <label class='control-label'>Amount</label> 
                                 <input class='form-control' size='4' type="number" min="1" name="amount">
                              </div>
                           </div>
                           <div class='form-row row'>
                              <div class='col-xs-12 col-md-4 form-group required'>
                                 <label class='control-label'>Name on Card</label> 
                                 <input class='form-control' size='4' type='text'>
                              </div>
                           </div>
                           <div class='form-row row'>
                              <div class='col-xs-12 col-md-4 form-group required'>
                                 <label class='control-label'>Card Number</label> 
                                 <input autocomplete='off' id="credit-card" class='form-control card-number' size='20' type='text'>
                              </div>
                           </div>

                           <div class='form-row row'>
                              <div class='col-xs-12 col-md-4 form-group cvc required'>
                                 <label class='control-label'>CVC</label> 
                                 <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                              </div>
                           </div>

                           <div class='form-row row'>
                              <div class='col-xs-12 col-md-2 form-group expiration required'>
                                 <label class='control-label'>Expiration Month</label> 
                                 <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                              </div>
                              <div class='col-xs-12 col-md-2 form-group expiration required'>
                                 <label class='control-label'>Expiration Year</label> 
                                 <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                              </div>
                           </div>
                           <div class="form-row row">
                              <div class="col-xs-12 col-md-4">
                                 <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
                              </div>
                           </div>
                        </form>
                     </div>
               </div>

         </div>
      </div>

   </body>
   <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
   <script type="text/javascript">
      $(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });
        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
    });
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});


   $('#credit-card').on('keypress change', function () {
      $(this).val(function (index, value) {
         return value.replace(/\W/gi, '').replace(/(.{4})/g, '$1 ');
      });
   });

   $('#credit-card').on('copy cut paste', function () {
      setTimeout(function () {
         $('#credit-card').trigger("change");
      });
   });
   </script>
</html>