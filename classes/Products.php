<?php



class Products
{


    public static function lastFour($q = null)
    {
        global $db;
        //$db = new PDO('mysql:host=localhost;dbname=beast', 'root', '');
        if(!$q)
            {
                try {

                    $lastfour = $db->query("SELECT product.pid, product.name, details, image FROM product INNER JOIN stock ON product.pid=stock.pid WHERE stock.stock > 0 AND stock.lid = 1 ORDER BY RAND() LIMIT 4");
                } catch (PDOException $e) {
                    return;
                }
                return $lastfour;
            }
        else
            {

                try {

                    $dbproduct = $db->prepare("SELECT pid, name, details, image FROM product WHERE category = ? ORDER BY RAND() LIMIT 4");
                    $dbproduct->bindValue(1, $q, PDO::PARAM_INT);
                    $dbproduct->execute();
                    $lastfour = $dbproduct->fetchAll(PDO::FETCH_ASSOC);

                } catch (PDOException $e) {
                    print_r($e);
                    return;



                }
                return $lastfour;
            }
    }

    public static function create_thumbnail($base64, $left = 0)
    {
        ob_start();
        // get image
        $src = imagecreatefromstring($base64);

// dimensions (just to be safe, should always be 185x127 though)
        $src_wide = imagesx($src);
        $src_high = imagesy($src);

// set white padding color
        $clear = array('red'=>255,'green'=>255,'blue'=>255);

// new image dimensions with right padding
        $dst_wide = $src_wide+600;
        $dst_high = $src_high;

// New resource image at new size
        $dst = imagecreatetruecolor($dst_wide, $dst_high);

// fill the image with the white padding color
        $clear = imagecolorallocate( $dst, $clear["red"], $clear["green"], $clear["blue"]);
        imagefill($dst, 0, 0, $clear);

// copy the original image on top of the new one
        imagecopymerge($dst,$src,$left,0,0,0,$src_wide,$src_high, 100);

// store the new image in tmp directory

        imagepng($dst);
        $contents =  ob_get_contents();
        ob_end_clean();
        imagedestroy($dst);

        return base64_encode($contents);
    }

    public static function getProduct($pid)
    {
        $db = new PDO('mysql:host=localhost;dbname=beast', 'root', '');

        $dbproduct = $db->prepare("SELECT stock.stock, product.* FROM product INNER JOIN stock ON product.pid=stock.pid WHERE lid = 1 AND product.pid = ?");
        $dbproduct->bindValue(1, $pid, PDO::PARAM_INT);
        $dbproduct->execute();
        if($dbproduct->rowCount() != 1)
        {
           return null;
        }
        return $dbproduct->fetch(PDO::FETCH_ASSOC);
    }
}