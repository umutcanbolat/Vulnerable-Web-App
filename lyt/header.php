<?php
$root = "/kouhack";
echo  '<div class="nav">
          <div class="container">
            <ul class="pull-left nav navbar-nav">
              <li><a href="' . $root . '">Ana Sayfa</a></li>
              <li><a href="' . $root . '/kurulum.php">Kurulum</a></li>
            </ul>
            <ul class="pull-right nav navbar-nav">
              <li><a href="' . $root . '/sql.php">SQL Enj.</a></li>
              <li><a href="' . $root . '/xss.php">XSS</a></li>
              <li><a href="' . $root . '/ci.php">Komut Enj.</a></li>
            </ul>
          </div>
       </div>';
?>
