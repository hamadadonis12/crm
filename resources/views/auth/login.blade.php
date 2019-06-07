<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Login - WorldWide Travel & Tourism</title>
      <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/pages/login-register-lock.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/colors/default-dark.css')}}">
   </head>
   <body class="card-no-border">
      <section id="wrapper">
         <div class="login-register" style="background-image:url({{asset('assets/img/background/login-register.jpg')}});">
         <div class="login-box card">
            <div class="card-body">
			    <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
                    @csrf
                  <h3 class="box-title m-b-20">Login</h3>
                  <div class="form-group ">
                     <div class="col-xs-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('E-Mail Address') }}" autocomplete="off" required> 
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" autocomplete="off" required>
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					 </div>
                  </div>
					<div class="form-group row">
                     <div class="col-md-12">
                        <div class="checkbox checkbox-info float-left p-t-0">
                           <input type="checkbox" class="filled-in chk-col-light-blue" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                           <label for="checkbox-signup"> {{ __('Remember Me') }} </label>
                        </div>
                     </div>
					 </div>
                     <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                           <button type="submit" class="btn btn-block btn-lg btn-info btn-rounded">{{ __('Login') }}</button>
                        </div>
                     </div>
               </form>
               </div>
            </div>
         </div>
      </section>
      <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
      <script type="text/javascript">
         $(function() {
             $('[data-toggle="tooltip"]').tooltip()
         });
         $('#to-recover').on("click", function() {
             $("#loginform").slideUp();
             $("#recoverform").fadeIn();
         });
      </script>
   </body>
</html>