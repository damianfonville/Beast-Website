<?php



/**
 * Created by PhpStorm.
 * User: damian
 * Date: 13-10-2015
 * Time: 09:07
 */
class Reviews
{



    public static function getReviews($pid)
    {
        global $db;
        try {

            $dbreviews = $db->prepare("SELECT reviews.*, user.name, user.lastname FROM reviews INNER JOIN user ON reviews.uid=user.uid WHERE pid = ? ORDER BY created_at DESC");
            $dbreviews->bindValue(1, $pid, PDO::PARAM_INT);
            $dbreviews->execute();
        }
        catch(PDOException $e){
            return $e->getMessage();
        }

        return $dbreviews->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getStars($pid)
    {
        global $db;

        $dbreviews = $db->prepare("SELECT AVG(rating) as gem, count(id) as aantal FROM reviews WHERE pid = ?");
        $dbreviews->bindValue(1, $pid, PDO::PARAM_INT);
        $dbreviews->execute();

        return $dbreviews->fetch();
    }

    public static function addReview()
    {
        global $db;
        try {

            $date = date("Y-m-d H:i:s");

            $addReview = $db->prepare("INSERT INTO reviews (pid, uid, rating, comment, created_at) VALUES (:pid, :uid, :rating, :comment, :created_at)");
            $addReview->bindParam(':pid', $_GET['pid'], PDO::PARAM_INT);
            $addReview->bindParam(':uid', $_SESSION['uid'], PDO::PARAM_INT);
            $addReview->bindParam(':rating', $_POST['rating'], PDO::PARAM_INT);
            $addReview->bindParam(':comment', $_POST['comment'], PDO::PARAM_STR);
            $addReview->bindParam(':created_at', $date, PDO::PARAM_STR);

            $addReview->execute();
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public static function timeAgo($time)
    {
        $time = strtotime($time);
        $cur_time 	= time();
        $time_elapsed 	= $cur_time - $time;
        $seconds 	= $time_elapsed ;
        $minutes 	= round($time_elapsed / 60 );
        $hours 		= round($time_elapsed / 3600);
        $days 		= round($time_elapsed / 86400 );
        $weeks 		= round($time_elapsed / 604800);
        $months 	= round($time_elapsed / 2600640 );
        $years 		= round($time_elapsed / 31207680 );
        if($seconds <= 60 && $seconds > 0){
            return "$seconds seconden geleden";
        }

        else if($minutes <=60  && $minutes > 0){
            if($minutes==1){
                return "1 minuut geleden";
            }
            else{
                return "$minutes minuten geleden";
            }
        }

        else if($hours <=24 && $hours > 0){
            return "$hours uur geleden";
        }

        else if($days <= 7 && $days > 0){
            if($days==1){
                return "gisteren";
            }else{
                return "$days dagen geleden";
            }
        }

        else if($weeks <= 4.3 && $weeks > 0){
            if($weeks==1){
                return "1 week geleden";
            }else{
                return "$weeks weken geleden";
            }
        }

        else if($months <=12 && $months > 0 ){
            if($months==1){
                return "1 maand geleden";
            }else{
                return "$months maanden";
            }
        }
//Years
        else if($years > 0){
            if($years==1 ){
                return "1 jaar geleden";
            }else{
                return "$years jaar geleden";
            }
        }else
        return "Geplaatst vanuit de toekomst";

    }





}