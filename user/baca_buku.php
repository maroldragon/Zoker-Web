<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Profil</title>
</head>
<body>
  
  <?php
    @include_once('header.php')
  ?>
  
  <div class="container-md form-content col-lg-8 col-md-10 col">
    <h1>Under the Black Flag: The Romance and the Reality of Life Among the Pirates</h1>
    
    <canvas id="my_canvas"></canvas>
  </div>

  <?php
    @include_once('footer.php')
  ?>
  <script>
    pdfjsLib.getDocument('./pdf/book.pdf').then(doc => {
      console.log("This File Has " + doc._pdfInfo.numPages + " Pages");

      doc.getPage(2).then(page => {
        var myCanvas = document.getElementById("my_canvas");
        var context = myCanvas.getContext("2d");

        var viewport = page.getViewport(2);
        myCanvas.width = viewport.width;
        myCanvas.height = viewport.height;

        page.render({
          canvasContext: context,
          viewport: viewport
        });
      });
    });
  </script>

</body>
</html>