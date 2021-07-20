<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Kontak · Perpustakaan Digital</title>
</head>
<body>
  
  <?php
    @include_once('header.php')
  ?>
  
  <div class="container-md form-contact">
		<div class="row">
			<div class="col-md-4 side-left">
				<div class="contact-icon"><i class="fas fa-envelope"></i></div>
				<div class="contact-title">Kontak Kami</div>
				<div class="contact-caption">Silahkan tinggalkan pesan anda, pada kolom yang tersedia</div>
			</div>
			<div class="col-md-8 side-right">				
        <label class="inp-text-label" for="inputKontakNama">Nama Anda</label>
        <input type="text" class="form-control inp-text mb-3" id="inputKontakNama">
				
        <label class="inp-text-label" for="inputKontakEmail">Email Anda</label>
        <input type="text" class="form-control inp-text mb-3" id="inputKontakEmail">
				
        <label class="inp-text-label" for="inputKontakPesan">Pesan Anda</label>
				<textarea class="form-control inp-text mb-3" id="inputKontakPesan" cols="30" rows="5"></textarea>
				
        <button type="button" class="btn btn-primary" id="buttonKirim">Kirim Pesan</button>
			</div>
		</div>
  </div>

  <?php
    @include_once('footer.php')
  ?>
  <!-- <script src="js/custom.js"></script> -->
  
  <script>
    $("#buttonKirim").click(function() {
      var nama = $("#inputKontakNama").val()
      var email = $("#inputKontakEmail").val()
      var pesan = $("#inputKontakPesan").val()
      // var verifikasiEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
      // if (nama == ""){
      //   swal("Error", "Alamat Tidak Boleh Kosong", "error");
      // }else if(email == ""){
      //   swal("Error", "Email Tidak Boleh Kosong", "error");
      // }else if(!verifikasiEmail.test(valueToTest)){
      //   swal("Error", "Format Email Salah", "error");
      // }else if(pesan == ""){        
      //   swal("Error", "Pesan Tidak Boleh Kosong", "error");
      // }else{

      // }
      
      var idFeedback = guid();
      console.log(idFeedback)
      let tanggal = new Date().toLocaleDateString();
      let database = firebase.database();
      database.ref('feedback/' + idFeedback).set({
          feebackId : idFeedback,
          nama : nama,
          email : email,
          pesan : pesan,
          tanggal : tanggal
      }).then(() => {
          swal("Selamat", "Feedback Sudah Dikirim Terima Kasih", "success").then(function(){ 
              location.href = "./index.php"
          });
      })

    })

    let guid = () => {
      let s4 = () => {
          return Math.floor((1 + Math.random()) * 0x10000)
              .toString(16)
              .substring(1);
      }
      //return id of format 'aaaaaaaa'-'aaaa'-'aaaa'-'aaaa'-'aaaaaaaaaaaa'
      return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
  }


  </script>

</body>
</html>