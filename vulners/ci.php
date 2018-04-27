<!DOCTYPE html>
<html>
    <head>
        <title>Command Injection</title>
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
            <div class="row">
                <div class="col-sm-6">
                    <h3>Dosya ismi girin ve işlem seçin: </h3>
                    <form class="form-inline" method="get" action="ci.php">
                        <div class="form-group">
                            <label for="kelime">Dosya ismi:</label>
                            <input type="text" class="form-control" name="filename" id="filename" placeholder="dosya1.txt"
                            <?php
                                if(isset($_GET["filename"])){
                                    echo " value=\"" . $_GET["filename"] . "\"";
                                }
                            ?>>
                        </div>
                        <button type="submit" name="gorev" value="goruntule" class="btn btn-default">Aç</button>
                        <button type="submit" name="gorev" value="ekle" class="btn btn-success">Ekle</button>
                        <button type="submit" name="gorev" value="sil" class="btn btn-danger">Sil</button>
                    </form>
                    <?php
                        if(isset($_GET["gorev"]) && $_GET["filename"]){
                            if($_GET["gorev"] == "ekle"){
                                echo "<pre class=\"bg-success\" style=\"margin-top:20px;padding:16px\">";
                                if(strrpos($_GET["filename"], "/") !== null){
                                    echo shell_exec("mkdir -vp ci/" . substr($_GET["filename"], 0, strrpos($_GET["filename"], "/")));
                                }
                                echo shell_exec("touch ci/" . $_GET["filename"]);
                                echo "</pre>";
                            }else if($_GET["gorev"] == "sil"){
                                echo "<pre class=\"bg-success\" style=\"margin-top:20px;padding:16px\">";
                                echo shell_exec("rm -rvf ci/" . $_GET["filename"]);
                                echo "</pre>";
                            }else if($_GET["gorev"] == "goruntule"){
                                echo "<pre class=\"bg-success\" style=\"margin-top:20px;padding:16px\">";
                                echo shell_exec("cat ci/" . $_GET["filename"]);
                                echo "</pre>";
                            }
                        }
                    ?>
                </div>
                <div class="col-sm-6">
                    <h3>Dosya sistemi</h3>
                    <?php
                        echo "<pre class=\"bg-info\" style=\"margin-top:20px;padding:16px\">";
                        echo shell_exec("tree ci");
                        echo "</p>";
                    ?>
                </div>
            </div>
        </div>
        <?php include '../lyt/footer.php';?>

    </body>
</html>
