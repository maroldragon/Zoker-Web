<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Detail Buku · Perpustakaan Digital</title>
</head>
<body>
  
  <?php
    @include_once('header.php')
  ?>
  
  <div class="container-md form-content col-lg-8 col-md-10 col">
    <div class="row">
      <div class="col-md-4 pos-center pb-3">
        <img src="img/coverbook.jpg" class="img-profil" alt="" id="imageBuku">
        <button type="button" class="btn btn-primary mt-4" id="buttonPinjamBuku">Pinjam Buku</button>
        <p id="ratingBuku">Rating (4,5)</p>
      </div>
      <div class="col-md-8">
        <h1 id="textJudul">Under the Black Flag: The Romance and the Reality of Life Among the Pirates</h1>
        <div class="font-caption" id="textKategori">Figtion</div>
        <div class="font-label">Penulis</div>
        <div class="font-caption" id="textPenulis">David Cordingly</div>
        <div class="font-label">Penerbit</div>
        <div class="font-caption" id="textPenerbit">Random House</div>
        <div class="font-label">Tahun Terbit</div>
        <div class="font-caption" id="textTahunTerbit">1996</div>
        <div class="font-label">ISBN</div>
        <div class="font-caption" id="textIsbn">9780439785969</div>
        <div class="font-label">Ringkasan</div>
        <div class="font-caption" id="textRingkasan">Pirates have become so much a part of story and legend that is easy to forget they actually existed in the flesh. Their roving lives left behind little in the way of historical record; thus our image of them is derived from a smattering of fact overlaid with three centuries of ballads, plays, epic poems, and films. But how does our conception of pirates compare with the reality, and why has such a romantic aura become associated with murderers and thieves?Pursuing that question, Dr. David Cordingly, former head of exhibitions at England's National Maritime Museum, has mined a wealth of original sources - eyewitness accounts, court documents, national archives, and more - to create the most authoritative and definitive account of the great age of piracy since the 1724 bestseller The General History of the Robberies and Murders of the most notorious Pyrates. Under the Black Flag explodes many closely held myths and replaces them with a truth that is more complex and every bit as fascinating. Here are the real stories of Blackbeard, Captain Kidd, and Henry Morgan, along with lesser-known but equally noteworthy pirates such as Henry Avery (who captured an emperor's treasure fleet but died penniless) and the cross-dressing women Anne Bonny and Mary Read. From the havoc of battle to the isolation of life at sea, Under the Black Flag makes tangible the day-to-day existence of pirates. How they attacked, how they governed themselves, what they wore, what ships they used, why they flourished in the years around 1720, and what brought their reign of terror to an end - all is revealed in this rousing and revisionist history</div>
      </div>
    </div>
    <div class="row">
      <div class="col mt-5">
        <h1>Feedback</h1>
        <div class="font-label">Rating (4,5) : <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
        <div class="font-label">Ulasan</div>        
				<textarea class="form-control inp-text mt-3" id="pesanText" cols="30" rows="5" id="inputUlasan"></textarea>
        <button type="button" class="btn btn-primary mt-3" id="buttonKirimUlasan">Kirim Ulasan</button>
      </div>
    </div>
  </div>

  <?php
    @include_once('footer.php')
  ?>
</body>
</html>