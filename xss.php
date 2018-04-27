<!DOCTYPE html>
<html>
    <head>
      <title>XSS</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



          <link href="css/header.css" rel="stylesheet">
          <link href="css/footer.css" rel="stylesheet">
          <link href="css/vulner.css" rel="stylesheet">
    </head>

    <body>
      <?php include 'lyt/header.php';?>
            <div class="container">
                <div class="row">
                  <div class="vulner">
                    <div class="col-lg-3 col-md-3 col-sm-4">


                        <ul class="nav nav-pills nav-stacked">
                          <li class="active"><a data-toggle="pill" href="#home">XSS</a></li>
                          <li><a data-toggle="pill" href="#menu1">Örnek Saldırı</a></li>
                          <li><a data-toggle="pill" href="#menu2">Alınabilecek Önlemler</a></li>
                          <li><a data-toggle="modal" href="#popUp">Yardım</a></li>
                        </ul>




                        <!-- Modal -->
                        <div class="modal fade" id="popUp" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Yardım</h4>
                              </div>
                              <div class="modal-body">
                                <p>Aşağıda XSS açığı barındıran demo sayfası için bağlantı verilmiştir. Bu bağlantı tıklandığında
                                kullanıcıdan gitmek istediği sayfa numarasını seçmesini istemektedir. Bu numara tarayıcı adres çubuğundan php get methodu
                                kullanılarak alımaktadır ve xss açığı barındırmaktadır. Normal koşullarda
                                <pre>xss.php?page=1</pre> şeklinde sayfa numarası beklenmektedir.
                                Fakat saldırgan buraya <pre>xss.php?page=1&lt;script&gt;alert('XSS Saldırısı Yapıldı!!')&lt;/script&gt;</pre></p>
                                <p>şeklinde script yerleştirdiğinde sayfada uyarı şeklinde "xss saldırısı yapıldı" mesajı görülür.</p>
                                <br><p class="text-center"><a href="vulners/index.php?a=xss">Örnek Demo</a></p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div>


                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                      <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                          <h3>XSS (Cross Site Scripting)</h3>
                          <p>XSS, SQL enjeksiyonuna benzeyen ve günümüzde hala varlığını sürdüren çok eski bir açıktır.
                          SQL enjeksiyonu yaparken kullanıcı girdileri olarak SQL sorguları girip sistemi şaşırtmıştık. XSS te ise sunucu tarafına
                          Javascript gibi kulllanıcı tarafında çalışan kodlar gömeceğiz.</p>

                          </div>
                        <div id="menu1" class="tab-pane fade">
                          <h3>Örnek Saldırı</h3>
                          <p>Bu uygulamada haber sitesi teması işlenmiştir ve kullanıcılardan okumak istedikleri sayfa numarasını seçmeleri beklenmektedir.
                            Sayfa numaralarının yer aldığı herhangi bir butona tıklandığında bu istek tarayıcı adres çubuğundan php get metodu ile alınıp işlenir ve ekrana seçilen
                            sayfadaki içerik basılır. (şimdilik sadece sayfanın numarası basılıyor :) )</p>
                          <p>Kullanıcı sayfa numaralarını seçtiğinde adres çubuğundan <pre>/xss.php?page=1</pre> şeklinde istek yapılmaktadır. Burada page değişkeninin aldığı değer doğrudan
                            sayfa içersinde kullanıldığı için, bu değişkene dışarından zararlı javascript kodları atanabilir. Mesela,</p>
                          <pre>xss.php?page=&lt;script&gt;alert('xss saldirisi gerceklestirildi')&lt;/script&gt;</pre>
                          <p>Bu kod sayfada pop up şeklinde uyarı mesajı çıkmasını sağlar. Saldırganlar değiştirdikleri bu linkleri diğer kullanıcıların tıklamasını sağladığında,
                            kendi gömdükleri javascript kodu aracılığı ile veri hırsızlığında bulunabilirler. Ayrıca saldırganlar bu linkleri insanların
                            direkt olarak okuyabileceği şekilde değil, ASCII karakterlerini hex kodlara çevirerek oluştururmayı tercih ederler.</p>
                          <p>Aşağıdaki hex link yukarıdaki ile aynı sonucu verir.</p>
                          <pre>xss.php?page=%3c%73%63%72%69%70%74%3e%61%6c%65%72%74%28%27%78%73%73%20%73%61%6c%64%69%72%69%73%69%20%67%65%72%63%65%6b%6c%65%73%74%69%72%69%6c%64%69%21%27%29%3c%2f%73%63%72%69%70%74%3e</pre>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                          <h3>Alınabilecek Önlemler</h3>
                          <p>En temel haliyle alınabilecek önlemlerin başında kullanıcıdan alınan verilerin filtrelenmesi yer almaktadır. Bunun için
                            <pre>htmlspecialchars($string)</pre> fonksiyonu kullanılabilir. Bu fonksiyon &lt; ve &gt; gibi özel html karakterlerinin sayfa içerisinde
                            kod olarak çalıştırılmasını önlemek için kullanılır.
                          </p>
                          <p>Zaafiyeti içeren kaynak kod aşağıdaki gibidir.</p>
                          <img src="img/screenshot24.png" class="img-thumbnail"><br><br>
                          <p>Aşağıdaki gibi bir düzeltme yapıldığında kullanıcın yazdığı göülü kodlar işlemez hale gelir.</p>
                          <img src="img/screenshot25.png" class="img-thumbnail"><br><br>

                        </div>
                        <div id="yardim" class="tab-pane fade">
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
            </div>


    <?php include 'lyt/footer.php';?>


    </body>
</html>
