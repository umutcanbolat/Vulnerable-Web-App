<!DOCTYPE html>
<html>
    <head>
      <title>SQL Enjeksiyonu</title>
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
                          <li class="active"><a data-toggle="pill" href="#home">SQL Enjeksiyonu</a></li>
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
                                <p>SQL enjeksiyonu, en yaygın web hackleme tekniklerinden biridir ve veritabanına büyük hasarlar verebilir.
                                Bu yöntem genellikle kullanıcılardan veri girişi istendiğinde (kullanıcı adı, şifre gibi), input kısmına
                                kullanıcı tarafından SQL kodları gömülmesi durumunda oluşur. Kullanıcı istenen verileri girmek yerine bu alana
                                 SQL kodları gömdüğünde sistemi şaşırtabilir. Aşağıdaki linkte belirtilen sayfada bu saldırının bir demosu bulunmaktadır. </p><br>
                                <p>Burada bir web sitesi giriş ekranı simüle edilmektedir, kullanıcı adı ve şifre girilmesi beklenmeketedir. Bunun yerine ' or '1' = '1 gibi bir
                                 ifade girildiğinde, saldırgan sisteme sızabilir. <p><br>
                                <p>Burada zaafiyete sebep olan durum, beklenen alanlara \n, \r, \, ', " gibi özel karakterlerin girilebiliyor olmasıdır. Alınan string içerisinde
                                varsa bu karakterlerden kaçınmak için mysqli_real_escape_string(veritabani, string) fonksiyonu kullanılabilir. (veritbanı: veritabanı bağlantısı, string: özel karakterlerden
                                kaçınılması istenen string).</p>
                                <br>
                                <p>Ayrıca SQL injection saldırılarında veritabanından birden çok (tüm veri setleri) döneceği için, sorgudan dönen tek bir satır olmasına göre de bir kontrol yapısı oluşturulabilir.
                                Birden çok satır döndüğünde veya hiçbir satır dönmediğinde işleme izin verilmez.</p>
                                <br><p class="text-center"><a href="vulners/index.php?a=sql">Örnek Demo</a></p>
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
                          <h3>SQL Enjeksiyonu</h3>
                          <p>SQL Injection, veri odaklı uygulamalarda tabanda çalışan SQL dili özelliklerinden faydalanılarak standart uygulama ekranındaki
                            ilgili alana ek SQL ifadelerini ekleyerek yapılan bir tür atak tekniğidir. SQL Injection, uygulama yazılımları içindeki güvenlik
                            açığından faydalanır. Örneğin, uygulama üzerinde girilen kullanıcı verisine SQL ifadeleri gömülür ve bu veri içeriği uygulama içerisinde
                            filtre edilmiyorsa beklenmedik bir şekilde uygulamanın hata vermeden çalıştığı görülür. Bu saldırı diğer saldırılardan farklı bir
                            atak tipi olduğu için yazılım geliştiricilerin bu açıdan saldırı geleceğini düşünmesi oldukça güçtür. Çoğunlukla web siteleri için kullanılan bir
                            saldırı türü olarak bilinse de SQL veritabanına ait tüm uygulamalar için denenebilir bir ataktır.</p>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                          <h3>Örnek Saldırı</h3>
                          <p>Bu uygulamada kullanıcı girişi yapılması istenen bir web sitesi örneklenmiştir. Ziyaretçiler önceden belirledikleri şifrelerle sisteme giriş yapabilmektedir.</p>
                          <p>Kullanıcı listesi aşağıdaki gibidir:</p>
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>admin</td>
                                <td>admin</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>kullanici</td>
                                <td>kullanici</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>kullanici1</td>
                                <td>kullanici1</td>
                              </tr>
                            </tbody>
                          </table>
                          <p>Doğru şifre ve kullanıcı adı ile giriş yapıldığında, hoşgeldiniz sayfası görüntülenmektedir ve yanlış giriş yapıldığında ise hata mesajı gösterilir.
                              SQL enjeksiyonu yöntemi ile bu siteye sızmayı deneyelim.</p>
                          <p>Giriş ekranında alınan kullanıcı adı ve şifre bilgileri veritabanında şu şekilde sorgulanmaktadır:</p>
                          <pre>SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword';</pre>
                          <!-- <img src="img/screenshot19.png"> -->

                          <p>Bu sorgunun esas amacı kulanıcı adı ve şifre bilgisiyle eşleşen bir satır olup olmadığını bulmaktır.
                            Fakat burada kullanıcının bazı özel karakterler girmesini sınırlayan kuşullar yoksa, saldırganlar şöyle bir şey deneyebilirler.</p>
                            <pre class="col-sm-4">' or '1' = '1</pre>
                            <br><br><br>
                            <p>Bunu sorguda yerine koyarsak, </p>
                            <pre>SELECT id FROM users WHERE username = 'kullanici12' and password = '' or '1' = '1';</pre>
                            <!-- <img src="img/screenshot20.png"> -->
                            <p>Bu sorgu her şart altında geçerlidir (1 = 1) ve tablodaki tüm satırları döndürür. Böylece saldırgan
                              login olmayı başarır.</p>

                        </div>
                        <div id="menu2" class="tab-pane fade">
                          <h3>Alınabilecek Önlemler</h3>
                          <p>Burada zaafiyete sebep olan durum, beklenen alanlara \n, \r, \, ', " gibi özel karakterlerin girilebiliyor olmasıdır. Alınan string içerisinde varsa bu karakterlerden kaçınmak için mysqli_real_escape_string(veritabani, string) fonksiyonu kullanılabilir.
                              Demo sitesinde kullanıcı adı ve şifre değerleri post metodu ile şu şekilde alınmaktadır:</p>
                          <img src="img/screenshot21.png" class="img-thumbnail"><br><br>
                          <p>Burada görüldüğü üzere kullanıcıdan alınan değerler hiçbir filtereden geçirilmeden doğruca sorgu içerisinde
                            gömülmektedir. SQL injection zaafietine yol açan ana sebep budur. Ayrıca sorgudan dönen sonuç bir diziye atanmaktadır.
                            Daha sonra bu dizinin eleman sayısı 0 dan büyükse giriş sağlanmaktadır. (yani eşleşen bir sonuç varsa)
                            Buradaki şartı $count > 0 yerine $count == 1 olarak değiştirebiliriz. Çünkü SQL injection a maruz kalındığında tablodaki tüm satırlar sonuç olarak dönmektedir.
                          </p>
                          <p>Bu durumda kaynak kod aşağıdaki gibi düzeltildiğinde bu zaafiyet giderilmiş olur.</p>
                          <img src="img/screenshot22.png" class="img-thumbnail"><br><br>
                        </div>
                        <div id="yardim" class="tab-pane fade">
                          <h3>Menu 3</h3>
                          <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
            </div>


    <?php include 'lyt/footer.php';?>

    </body>
</html>
