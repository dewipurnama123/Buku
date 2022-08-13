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
						/
						<a href="#" class="small" role="button" onclick="bukax()">Lupa Password</a>
        </div>
					</form>
				</div><!-- col-sm-5 -->





			</div><!-- row -->


		</div><!-- signin -->

	</section>
</main>


<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Reset Password</h4>
            </div>

            <form action="{{ route('reset-password') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="">Email Pemulihan</label>
                    <input type="email" name="email" placeholder="Klik Disini" class="form-control my-3">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="width:100%;">Kirim Link Reset Password</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    function bukax() {
        $('#myModal').modal('show')

    }
</script>
<!-- end  main content -->

@endsection
