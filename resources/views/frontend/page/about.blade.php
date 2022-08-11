@extends('frontend/template')

@section('main')
<section id="contact" class="contact">

<div class="container" >

  <header class="section-header">
    <center>
  <h2  class="heading-v1-title" >Hubungi Kami</h2></center>
  </header>

  <div class="row gy-4">

    <div class="col-lg-6">
       <img src="frontend/img/slide/slider1.png" width="500" class="img-fluid" alt="">


    </div>

    <div class="col-lg-6">
      <!-- <form action="" method="post" class="php-email-form"> -->
        <div class= "row gy-4">
          <p>Bila Anda masih memiliki pertanyaan, jangan sungkan hubungi kami. Silakan isi formulir di bawah ini atau hubungi kami melalui Whatsapp.
          </p>
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" id="nama" placeholder="Nama Anda" required>
          </div>

          <div class="col-md-6 ">
            <input type="email" class="form-control" name="email" id="email" placeholder="Alamat Email" required>
          </div>
          <div class="col-md-12">
              <br>
            <input type="text" class="form-control" name="subject" id="judul" placeholder="Pekerjaan" required>
          </div>

          <div class="col-md-12">
            <br>
            <textarea class="form-control" name="message" id="pesan" rows="6" placeholder="Permasalahan" required></textarea>
          </div>

          <div class="col-md-12 text-center">
            <!-- <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div> -->
<br>
            <button class="btn btn-primary type="button" onclick="kirim()">Kirim</button>
          </div>

        </div>
      <!-- </form> -->

    </div>

  </div>

</div>


</section><!-- End Contact Section -->
<script>
  function kirim()
  {
      var nama = $('#nama').val()
      var email = $('#email').val()
      var judul = $('#judul').val()
      var pesan = $('#pesan').val()
      window.open('https://api.whatsapp.com/send/?phone=6282124495025&text=To+%3A+Sarianggrek%0A%0AFrom+%3A%0A-+Nama+%3A+'+nama+'%0A-+Email+%3A+'+email+'%0A%0APekerjaan+%3A+'+judul+'%0A-+Permasalahan+%3A+'+pesan+'.&app_absent=0','_blank')
  }
</script>
@endsection
