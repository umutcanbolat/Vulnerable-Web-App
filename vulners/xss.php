<!DOCTYPE html>
<html>
    <head>
      <title>Cross Site Scripting</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <link href="../css/header.css" rel="stylesheet">
          <link href="../css/footer.css" rel="stylesheet">
          <link href="../css/vulner.css" rel="stylesheet">
    </head>
    <body>
      <?php include '../lyt/header.php';?>
      <div class="container">
        <div class="xss">
          <?php
            //$_GET["page"] = htmlspecialchars($_GET["page"]);
             if( $_GET["page"] ) {
                echo "<p>Şu anda </p><h1>". $_GET['page']. "</h1><p> numaralı sayfadasınız.</p><br>";

             }else{
               echo '<h2>Sayfa numarası seçiniz</h2>
                     <p>Aşağıdaki listeden ulaşmak istediğiniz sayfa numarasını seçiniz.</p>';

             }
           ?>
          <ul class="pagination">
            <li><a href="?page=1">1</a></li>
            <li><a href="?page=2">2</a></li>
            <li><a href="?page=3">3</a></li>
            <li><a href="?page=4">4</a></li>
            <li><a href="?page=5">5</a></li>
            <li><a href="?page=10">10</a></li>
            <li><a href="?page=20">20</a></li>
            <li><a href="?page=50">50</a></li>
          </ul>
        </div>
      </div>


    <?php include '../lyt/footer.php';?>

    </body>
</html>
