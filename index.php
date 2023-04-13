<?php
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a1eea65c7b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/cpp.css">
    <title>my_h5ai</title>
</head>
<a href="javascript:history.go(-1)"><-Retour</a> |
<a href="javascript:history.go(+1)">Suivant-></a>

<html lang="en">
    <form action="" method="get">
    <input name="look" type="text" placeholder="Rechercher un fichier">
    <input type="submit" value="OK"></input>
</form>
<form action="" method="post">
<input type="color" id="color" name="color"
           value="#FFF">
    <label for="color">Couleur des fichiers</label>
    <input type="submit" value="OK"></input>

    <br>
</form>
<?php
$color = $_POST['color'];
$look = $_GET['look'];

$prit = "../../";
$mid .= $puge;

if (!isset($prout)) {
    $prout = "../../../";
}

$prout .= $puge;
$prat = "";

if (isset($_GET['stock'])) {
    $FRAK .= $_GET['stock'];
    //   echo $prit .= $url;
}
if (isset($_GET['search'])) {
    $url .= $_GET['search'];
    $puge .= $url . "/";
    $prout .= $puge;
    
    //   echo $prit .= $url;
}

echo "<a href=http://h5ai.com id='home'/> HOME </a>";
echo "/".$mid."<a href='http://h5ai.com/?search=".substr($FRAK, 0, -1)."&stock=$mid'>".$FRAK. "</a>". $puge;
$final = $prit . $mid. $FRAK . $puge;

$i = 0;
if(!isset($look) || $look==""){
    scanderu($final, $puge, $final);
}
elseif(isset($look) && $look!=""){
    echo "<br><br>Recherce du fichier: '$look'<br>";
    searcheruo($look, $prit);
}

?>

<body>
    <header>
    </header>
    <main>
        <div class="listefichiers">
            <?php
            function show_filesize($filename, $decimalplaces = 0)
            {

                $size = filesize($filename);
                $sizes = array('O', 'Ko', 'Mo', 'Go', 'To');

                for ($i = 0; $size > 1024 && $i < count($sizes) - 1; $i++) {
                    $size /= 1024;
                }
                return round($size, $decimalplaces) . ' ' . $sizes[$i];
            }
            function searcheruo($look, $prout){
                $files = preg_grep('/^([^.])/', scandir($prout));
                foreach ($files as $value) {
                    if (is_dir($prout . $value)) {
                        echo "<div class ='folder'><i class='fa-solid fa-folder'></i><i class='fa-solid fa-caret-right'></i> $value</div>";
                        echo "<div class ='padl'>";
                        $flak = $prout . $value;
                        searcheruo($look, $flak);
                        echo "</div>";
                    } elseif(str_contains(strtolower($value) ,strtolower($look))){
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $info = finfo_file($finfo, $prout . $value);
                        echo "<div class ='flex'><div class='icone'>";
                        if (strstr($info, "text")) {
                            echo "<i class='fa-solid fa-file-lines'></i>";
                        } else if (strstr($info, "image")) {
                            echo "<i class='fa-solid fa-file-image'></i>";
                        } else if (strstr($info, "application")) {
                            echo '<i class="fa-solid fa-file"></i>';
                        } else if (strstr($info, "audio")) {
                            echo '<i class="fa-solid fa-file-audio"></i>';
                        } else if (strstr($info, "video")) {
                            echo '<i class="fa-solid fa-file-video"></i>';
                        } else {
                            echo '<i class="fa-brands fa-html5"></i>';
                        }
                        echo "</div>
                    <div class ='hidden'>
                        <div class='searchfile'>
                        $value
                        <br>
                            <div class ='stats'>
                                (Taille:" . show_filesize($prout . $value) .
                            "</div>
                            <div class ='elem'>| Dernière modification:" .
                            date("F d Y H:i:s", filemtime($prout . $value)) . ")</div>
                            </div>
                        </div>
                    </div>";
                    }
                }
            }
            function scanderu($prout, $puge, $final)
            {
                $_POST['final'] = $final;
                $files = preg_grep('/^([^.])/', scandir($prout));
                if (isset($_GET)) {
                    foreach ($files as $value) {
                        if (is_dir($prout . $value)) {
                            echo "<div class ='folder'><a href ='?search=$value&stock=$puge'><i class='fa-solid fa-folder'></i><i class='fa-solid fa-caret-right'></i> $value </a></div>";
                            echo "<div class ='padl'>";
                            echo "</div>";
                        } else {
                            $finfo = finfo_open(FILEINFO_MIME_TYPE);
                            $info = finfo_file($finfo, $prout . $value);
                            echo "<div class ='flex'><div class='icone'>";
                            if (strstr($info, "text")) {
                                echo "<i class='fa-solid fa-file-lines'></i>";
                            } else if (strstr($info, "image")) {
                                echo "<i class='fa-solid fa-file-image'></i>";
                            } else if (strstr($info, "application")) {
                                echo '<i class="fa-solid fa-file"></i>';
                            } else if (strstr($info, "audio")) {
                                echo '<i class="fa-solid fa-file-audio"></i>';
                            } else if (strstr($info, "video")) {
                                echo '<i class="fa-solid fa-file-video"></i>';
                            } else {
                                echo '<i class="fa-brands fa-html5"></i>';
                            }
                            echo "</div>
                        <div class ='hidden'>
                            <div class='files'>
                            $value
                            <br>
                                <div class ='stats'>
                                    (Taille:" . show_filesize($prout . $value) .
                                "</div>
                                <div class ='elem'>| Dernière modification:" .
                                date("F d Y H:i:s", filemtime($prout . $value)) . ")</div>
                                </div>
                            </div>
                        </div>";
                        }
                    }
                }
            }
            ?>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>