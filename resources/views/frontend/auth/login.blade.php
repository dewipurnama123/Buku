@extends('frontend/template')

@section('main')

<!-- start main content -->
<main class="container" >

	<section>

		<div  class="signinpanel" >

			<div class="row">

				<div class="col-md-10 col-md-offset-1">
				<form  action = "{{route('aksiloginf')}}" method="POST">
				@csrf
						<h4 class="nomargin">Silakan Login Terlebih Dahulu!!!</h4>
						<input type="text" class="form-control funame"
                                                name="username" aria-describedby="emailHelp"
                                                placeholder=" Username">
						<input type="password" class="form-control pword"
                                                name="password" placeholder="Password">
												<br>
						<input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
						<button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
										<div class="text-center">
                        <a class="small" href="{{route('registerf')}}">Create an Account!</a>
</div>
					</form>
				</div><!-- col-sm-5 -->

				



			</div><!-- row -->


		</div><!-- signin -->

	</section>
</main>
<!-- end  main content -->

@endsection