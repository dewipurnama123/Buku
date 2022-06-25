@extends('frontend/template')

@section('main')
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.3.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />
    <title>Laravel Raja Ongkir - SantriKoding.com</title>
</head>
	<!-- start main content -->
<main class="container">

	<section>

		<div class="signuppanel">

			<div class="row">

			

				<div class="col-md-12">
                <form class="user" action="{{route('updatemember',$member->id)}}" method="post">
                                @csrf
<center>
						<h3 class="nomargin" >Sign Up</h3>
                        </center>
                        <div class="mb10">
							<label class="control-label">Username</label>
                            <input value="{{$member->username}}" type="username" class="form-control" name="username" placeholder="Username">
						</div>
                        <div class="mb10">
							<label class="control-label">Nama Lengkap</label>
                            <input value="{{$member->nama}}" type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
						</div>
                        
						<div class="mb10">
							<label class="control-label">Provinsi</label>
							<select class="form-control provinsi-asal" value="" name="province_origin">
                                <option value="0">-- Pilih Provinsi --</option>
                                @foreach ($provinces as $province => $value)
                                <option value="{{ $province  }}">{{ $value }}</option>
                                @endforeach
                               
                        </select>
						</div>
						<div class="mb10">
							<label class="control-label">Kota/kabupaten</label>
							<select class="form-control kota-asal" value="" name="city_origin">
                            <option value="">-- Pilih Kota --</option>
                        </select>
						</div>
						<div class="mb10">
							<label class="control-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap">

						</div>
                        <div class="mb10">
							<label class="control-label">No Handphone</label>
                            <input value="{{$member->nohp}}" type="text" class="form-control" name="nohp" placeholder="No Handphone">

						</div>
                        <div class="mb10">
							<label class="control-label">Email</label>
                            <input value="{{$member->email}}" type="email" class="form-control" name="email" placeholder="Email">

						</div>
						<div class="mb10">
							<label class="control-label">Password</label>
                            <input value="{{$member->password}}" type="password" class="form-control" name="password" placeholder="Password">
						</div>
					

						<br />
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Update
                                </button>
                             
					</form>
				</div><!-- col-sm-6 -->

			</div><!-- row -->



		</div><!-- signuppanel -->

	</section>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
 $(document).ready(function(){
        //active select2
        $(".provinsi-asal , .kota-asal, .provinsi-tujuan, .kota-tujuan").select2({
            theme:'bootstrap4',width:'style',
        });
        //ajax select kota asal
        $('select[name="province_origin"]').on('change', function () {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: '/citiesf/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('select[name="city_origin"]').empty();
                        $('select[name="city_origin"]').append('<option value="">-- pilih kota --</option>');
                        $.each(response, function (key, value) {
                            $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_origin"]').append('<option value="">-- pilih kota --</option>');
            }
        });
        //ajax select kota tujuan
    
        //ajax check ongkir
       

    });
</script>
<!-- end  main content -->
@endsection
