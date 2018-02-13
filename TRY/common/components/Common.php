<?php

namespace common\components;

use Yii;
use yii\helpers\Html;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\Url;
use yii\db\Query;
use common\models\User;
use yii\web\UploadedFile;
use yii\web\BadRequestHttpException;

class Common extends Component {


    /**
     * To get password hashed
     * @param type $password
     * @return type
     */
    public static function passwordHash($password) {
        $cur_password = md5($password);
        return $cur_password;   
    }

    /**
     * To get Mysql Date Time format
     */
    public static function mysqlDate($date = FALSE) {
        if ($date) {
            return date('Y-m-d h:i', strtotime($date));
        }
        return date('Y-m-d h:i');
    }

    /**
     * To set status as active after login
     */
    public function changeLoginInStatus($id){
        /*$connection = \Yii::$app->db;
        $sponsor = $connection->createCommand()->insert('user', ['loggedStatus' =>'Active'])->execute();*/
        $updateStatus = Yii::$app->db->createCommand()->update('user', ['loggedStatus' => 'Active'], 'id = '.$id.' ')->execute();
        if($updateStatus){
            return true;
        } /*else {
            echo 'error';exit;
        }*/
    }

    /**
     * To set status as inactive after logout
     */
    public function changeLoginOutStatus($id){
        /*$connection = \Yii::$app->db;
        $sponsor = $connection->createCommand()->insert('user', ['loggedStatus' =>'Active'])->execute();*/
        $updateStatus = Yii::$app->db->createCommand()->update('user', ['loggedStatus' => 'Inactive'], 'id = '.$id.' ')->execute();
        if($updateStatus){
            return true;
        } /*else {
            echo 'error';exit;
        }*/
    }


    /**
     * To get Mysql Date Time format
     */
    public function customDate($date) {
        if ($date) {
            return date('d-m-Y h:i A', strtotime($date));
        } else {
            return '';
        }
    }

    /**
    *Method to get Course Name based on Id
    **/
    public function getCourseName($id)
    {
        $result = Yii::$app->db->createCommand("select * from course where id=".$id." ")->queryOne();
        if($result){
            //print_r($result['title']);exit;
            return $result['title'];
        } else {
            return false;
        }
    }

    /**
    *Method to get all course name
    **/
    public function getCourseAll()
    {
        $result = Yii::$app->db->createCommand("SELECT * FROM course")->queryAll();
        //print_r($result);exit;
        if($result){
            //echo '<pre>';print_r($result);exit;
            return $result;
        } else {
            return false;
        }
    }

    /**
    *Method to get all sub course based on course id
    **/
    public function getSubCourseId($id)
    {
        $results = Yii::$app->db->createCommand("SELECT * FROM subCourse WHERE course_id=".$id."")->queryAll();
        if($results){
            //print_r($result);exit;
            return $results;
        } else {
            //echo 'out';exit;
            return false;
        }
    }

    /**
    *Method to get single sub course based on sub course id
    **/
    public function getSubCourseName($id)
    {
        $result = Yii::$app->db->createCommand("SELECT * FROM subCourse WHERE id=".$id."")->queryOne();
        if($result){
            //print_r($result['title']);exit;
            return $result;
        } else {
            return false;
        }
    }

    /**
    *Method to get all select dropdowns
    **/
    public function allDrops($val)
    {
      if($val) {
          $result = '<option value="">Select</option>';
          foreach ($val as $value) {
              $result .= '<option value="' . $value->id . '"';
              $result .= '>'.$value->title . '</option>';
        }
          return $result;
      } else {
          return '<option value="">Select</option>';
      }
    }

    /**
    *Method to get all sub course based on course id
    **/
    public function setImage($img)
    {
        if(empty($img)){
            $image = \Yii::$app->request->BaseUrl.'/'.\Yii::$app->params['EXTRA_UPLOAD_PATH'].'admin.png';
        } else {
            $image = \Yii::$app->request->BaseUrl.'/'.\Yii::$app->params['PROFILE_UPLOAD_PATH'].$img;
        }
        return $image;
    }

    /**
    *Method to get all sub course based on course id
    **/
    public function setImageUserAlbum($img)
    {
        if(empty($img)){
            $image = \Yii::$app->request->BaseUrl.'/'.\Yii::$app->params['EXTRA_UPLOAD_PATH'].'admin.png';
        } else {
            $image = \Yii::$app->request->BaseUrl.'/'.\Yii::$app->params['ALBUM_ICON_PATH'].$img;
        }
        return $image;
    }

    /**
    *Method to get country Name based on Id
    **/
    public function getCountryName($id)
    {
        $result = Yii::$app->db->createCommand("select * from country where id=".$id." ")->queryOne();
        if($result){
            //print_r($result['title']);exit;
            return $result['name'];
        } else {
            return false;
        }
    }

    /**
    *Method to get country Name based on Id
    **/
    public function getStateName($id)
    {
        $result = Yii::$app->db->createCommand("select * from state where id=".$id." ")->queryOne();
        if($result){
            //print_r($result['title']);exit;
            return $result['name'];
        } else {
            return false;
        }
    }

    /**
    *Method to get country Name based on Id
    **/
    public function getCityName($id)
    {
        $result = Yii::$app->db->createCommand("select * from city where id=".$id." ")->queryOne();
        if($result){
            //print_r($result['title']);exit;
            return $result['name'];
        } else {
            return false;
        }
    }

    /**
    *Method to get existing email or not
    **/
    public function getExistingEmail($email)
    {
        $result = Yii::$app->db->createCommand("select * from user where email=".$email." ")->queryAll();
        if(count($result) > 0){
            return true;
        } else {
            return false;
        }
    }

    /**
    *Method to get albums based on user id
    **/
    public function getMyAlbum($id)
    {
        $result = Yii::$app->db->createCommand("select * from userAlbum where userId=".$id." AND status='Active' ")->queryAll();
        if($result){
            return $result;
        } else {
            return false;
        }
    }

    /**
    *Method to get albums based images on user id
    **/
    public function getAlbumBasedImage($id)
    {
        $result = Yii::$app->db->createCommand("select * from albumRefrence where albumId=".$id." ")->queryAll();
        if($result){
        return $result;
        } else {
        return false;
        }
    }

    /**
     * To get the active menu
     */
    public function activeMenu($activePage) {
        $url = Yii::$app->request->pathInfo;
        if ($url == $activePage) {
            $activeClass = TRUE;
        } else {
            $activeClass = FALSE;
        }
        return $activeClass;
    }

    /**
    *Method to get existing quiz attended or not
    **/
    public function checkAttendedQuiz($c_id,$sub_id,$user_id)
    {
        $result = Yii::$app->db->createCommand("select * from quiz_temp where c_id=".$c_id." AND sub_id=".$sub_id." AND user_id=".$user_id."")->queryAll();
        //if(count($result) > 0){
        if($result){
            foreach ($result as $key => $value) {
                return $value;
                //print_r($value);
            }
        } else {
            return false;
        }
    }

    /**
    *Method to get existing quiz attended or not
    **/
    public function passedQuiz($c_id,$sub_id,$user_id)
    {
        $result = Yii::$app->db->createCommand("select * from quizCompletion where courseId=".$c_id." AND topicId=".$sub_id." AND userId=".$user_id." AND stuStatus='Pass'")->queryOne();
        //if(count($result) > 0){
        if($result){
            return true;
        } else {
            return false;
        }
    }

    /**
    *Method to get user create album
    **/
    public function getAlbumName($id)
    {
        $val = Yii::$app->db->createCommand("select * from userAlbum where userId=".$id." ")->queryAll();
        if($val){
           foreach ($val as $key => $value) {
               //print_r($value['id']);
               $cont_data[$value['id']] = $value['abName'];
           }
        } else {
            echo 'out';
        }

        $cont_data = $cont_data;
            return $cont_data;
    }

    /**
    *Method to get album name
    **/
    public function getSingleAlbumName($id)
    {
        $val = Yii::$app->db->createCommand("select * from userAlbum where id=".$id." ")->queryOne();
        if($val){
           //print_r($val);exit;
            return $val;
        } else {
            echo 'out';
        }
    }

    /**
     *  To get the album photos counnt 
     */
     public function getSeo($seo){

             $str = strtolower($seo);
             $seoTitle =  strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($str))));
             return $seoTitle;
     }

     /**
     *  To adjust the path for backend
     */
     public function getRootPath(){
        $set_path = Yii::getAlias('@webroot');
        $path = str_replace('backend','uploads/course/', $set_path);
        return $path;
     }
    
    /**
     * To get default Date
     */
    public function displayDate2($date) {
        if ($date == '0000-00-00') {
            return '';
        }

        return date('d-m-Y', strtotime($date));
    }

    /**
     * To get default Date
     */
    public function displayDate4($date) {
        if ($date == '0000-00-00 00:00:00') {
            return '';
        }

        //return date('d-m-Y H:i:s', strtotime($date));

        return date('d-m-Y', strtotime($date));
    }

    /**
     * To get default Date
     */
    public function displayDate3($date = False) {
        if ($date) {
            return date('d M Y', strtotime($date));
        }
        return FALSE;
    }

    /**
     * To get Mysql Date Time format
     */
    public function mysqlDateTime($date = FALSE) {
        if ($date) {
            return date('Y-m-d H:i:s', strtotime($date));
        }
        return date('Y-m-d H:i:s');
    }

    /**
     * To get Mysql Date Time format
     */
    public function mysqlDateTimeUpdate() {
        return date('Y-m-d H:i:s');
    }

    /**
     * To format date time
     */
    public static function formatDateTime($createdOn) {
        if ($createdOn != "0000-00-00 00:00:00") {
            echo $createdOn;
        } else {
            echo '';
        }
    }

    /*
     * To unlink the file if exists
     */

    public static function unlinkExistedFile($path, $fileName = FALSE) {
        if (file_exists($path . $fileName)) {
            if (is_file($path . $fileName)) {
                unlink($path . $fileName);
            }
        }
    }

    public function printR($str) {
        print '<pre>';
        print_r($str);
        print '</pre>';
    }

    public static function getFileName($fileName) {
        $ext = Yii::$app->Common->getExtension($fileName);
        return date('Ymdhis') . '-' . Yii::$app->Common->removeSpecialCharacter($fileName, $ext);
        //return date('Ymdhis').'-'.$fileName;
    }

    /**
     * To remove special charaters in a content and replace with hyphens
     * */
    public static function removeSpecialCharacter($string, $ext) {
        $string = str_replace('.' . $ext, '', $string); // Replaces all spaces with hyphens.
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string); // Removes special chars.
        $string = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.

        return $string . '.' . $ext;
    }

    /* Common Uplaod  */

    public static function commonUpload($model, $path, $attribute) {
        $file = UploadedFile::getInstance($model, $attribute);

        if ($file) {
            $file->name = \Yii::$app->Common->getFileName($file->name);
            $model->$attribute = $file->name;
            // $ext = end((explode(".", $file->name)));
            //$ext = Yii::$app->Common->getExtension($file->name);
            $filePath = $path;
            $path = $filePath . $file->name;

            if ($file->saveAs($path)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function getExtension($fileName) {
        $file = explode('.', $fileName);
        return end($file);
    }

    /*
     * To check whether image is available in given path
     * returns default image if no photo is available
     */

    public static function getImageWithLink($path, $fileName = FALSE) {
        $noPhoto = Yii::$app->urlManagerFrontEnd->baseUrl . '/' . Yii::$app->params['THEME_PATH'] . 'no_image.jpg';
        $pdf = Yii::$app->urlManagerFrontEnd->baseUrl . '/' . Yii::$app->params['THEME_PATH'] . 'pdf.png';
        $doc = Yii::$app->urlManagerFrontEnd->baseUrl . '/' . Yii::$app->params['THEME_PATH'] . 'doc.png';
        $fullFilePath = Yii::$app->homeUrl . $path . $fileName;
        $extension = \Yii::$app->Common->getExtension($fileName);
        $ext = strtolower($extension);
        $result = '';
        if (file_exists($path . $fileName)) {
            if (is_file($path . $fileName)) {
                if ($ext == 'pdf') {
                    $result = '<a  class="fancybox" data-fancybox-group="gallery" target="_blank" href="' . $fullFilePath . '" title = "">' . Html::img($pdf, ['class' => 'existing', 'target' => '_blank',]) . '</a>';
                } else if ($ext == 'doc' || $ext == 'docx') {
                    $result = '<a  class="fancybox" data-fancybox-group="gallery" target="_blank" href="' . $fullFilePath . '" title = "">' . Html::img($doc, ['class' => 'existing', 'target' => '_blank',]) . '</a>';
                } else {
                    $result = '<a  class="fancybox" data-fancybox-group="gallery" target="_blank" href="' . $fullFilePath . '" title = "">' . Html::img($fullFilePath, ['class' => 'existing', 'target' => '_blank',]) . '</a>';
                }
                // return Yii::$app->homeUrl.$path.$fileName;
            } else {
                $result = Html::img($noPhoto, ['class' => 'existing', 'target' => '_blank',]);
                // return $noPhoto;
            }
        } else {
            $result = Html::img($noPhoto, ['class' => 'existing', 'target' => '_blank',]);
            //return $noPhoto;
        }
        return '<div class="browse">' . $result . '</div>';
    }

    /**
     * To generate random key
     */
    public static function getRandomKey() {
        //for generating random number
//        $length = 10;
//        $max = ceil($length / 32);
//        $random = '';
//        for ($i = 0; $i < $max; $i ++) {
//          $random .= md5(microtime(true).mt_rand(10000,90000));
//        }
//        return 'DF'.substr($random, 0, $length);

        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X-%04X%04X%04X', mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    /**
     * To get nominate approvers by projectId
     */
    public static function getSerialNum() {
        $digits = 3;
        $today = date('ymdHi');
        $randNum = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
        return ($today . 'MAG' . $randNum);
    }

    /**
     * This method handles to truncate limited chars
     * */
    public static function truncateChars($string, $length, $dots = "...") {
        return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
    }

    /*
     * Displays action icons based on the condition
     */

    public function getActionMenu($model, $iconView = FALSE, $iconUpdate = FALSE, $iconDelete = FALSE) {
        $view = '';
        $update = '';
        $delete = '';
        $model->id = yii::$app->Common->createSecretUrl($model->id);

        if ($iconView && !$iconUpdate && !$iconDelete) {
            $view .= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id], ['title' => 'View']);
        } else if (!$iconView && $iconUpdate && !$iconDelete) {
            $update .= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id], ['title' => 'Update']);
        } else if (!$iconView && !$iconUpdate && $iconDelete) {
            $delete .= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], ['title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete?")']);
        } else if ($iconView && $iconUpdate && $iconDelete) {
            $view .= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id], ['title' => 'View']);

            $update .= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id], ['title' => 'Update']);
        } else if ($iconView && $iconDelete && !$iconUpdate) {
            $view .= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id], ['title' => 'View']);
            $delete .= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], ['title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete?")']);
        } else if ($iconUpdate && $iconDelete && !$iconView) {
            $update .= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id], ['title' => 'Update']);

            $delete .= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], ['title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete?")']);
        } else {
            $view .= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id], ['title' => 'View']);

            $update .= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id], ['title' => 'Update']);

            $delete .= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], ['title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete?")']);
        }
        return $view . ' ' . $update . ' ' . $delete;
    }

    /*
     * Displays action icons based on the condition
     */

    public function getActionUpdate($model, $iconView = FALSE, $iconUpdate = FALSE, $iconDelete = FALSE) {
        $view = '';
        $update = '';
        $delete = '';
        $model->id = yii::$app->Common->createSecretUrl($model->id);


        $view .= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id], ['title' => 'View']);

        $update .= Html::a('<span class="glyphicon glyphicon-pencil"></span>', 'subscriber-advertisement/view-notes?id=' . $model->id, [
                    'title' => Yii::t('app', 'Update')]);

        $delete .= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], ['title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete?")']);


        return $view . ' ' . $update . ' ' . $delete;
    }

    /**
     * This method handles to explode an string to array
     */
    public static function explodeBy($separator, $data) {
        $explode = explode($separator, $data);
        return $explode;
    }

    /**
     * This function used to limt the large texts
     * @param type $trimLength
     * @param type $string
     * @return type
     */
    public static function getLessContent($trimLength, $string) {
        $length = strlen($string);
        if ($length > $trimLength) {
            $count = 0;
            $prevCount = 0;
            $array = explode(" ", $string);
            foreach ($array as $word) {
                $count = $count + strlen($word);
                $count = $count + 1;
                if ($count > ($trimLength - 3)) {
                    return substr($string, 0, $prevCount) . "...";
                }
                $prevCount = $count;
            }
        } else {
            return $string;
        }
    }

    /**
     * To redirect using javascript
     */
    public static function redirect($url) {
        echo '<script>window.location.href="' . $url . '";</script>';
        exit;
    }

    /**
     * To create secret URL and check xxx
     */
    public static function createSecretUrl($varId) {
        return hash_hmac('sha1', $varId . Yii::$app->user->id, Yii::$app->params['urlSecretKey']) . '-' . $varId;
    }

    /**
     * To check the secret url on view page
     * http://stackoverflow.com/questions/5387755/how-to-generate-unique-order-id-just-to-show-touser-with-actual-order-id
     */
    public static function checkSecretUrlVerification($varIdCheck) {
        if (!strstr($varIdCheck, '-'))
            throw new BadRequestHttpException('The requested page does not exist.');

        list($hash, $originalId) = explode('-', $varIdCheck);

        if (hash_hmac('sha1', $originalId . Yii::$app->user->id, Yii::$app->params['urlSecretKey']) === $hash) {
            return $originalId;
        } else {
            throw new BadRequestHttpException('The requested page does not exist.');
        }
    }

    /**
     * To encript password
     */
    public static function getEncriptedPwd($str) {
        return md5($str);
    }

    /**
     * To get range
     */
    public static function getRange($from, $end) {
        $range = range($from, $end);
        //print_r($range);
        //return $range;
        foreach ($range as $values) {
            $retVal[$values] = $values;
        }
        return $retVal;
    }

    /*
     * To generate months
     */

    public static function getMonthsArray() {
        for ($monthNum = 1; $monthNum <= 12; $monthNum++) {
            $months[$monthNum] = date('F', mktime(0, 0, 0, $monthNum, 1));
        }
        return $months;
    }

    /**
     * To get year range
     */
    public static function getYearRange($from) {
        $end = date('Y', strtotime(date('Y')));
        $range = range($from, $end);
        //print_r($range);
        //return $range;
        foreach ($range as $key => $values) {
            $retVal[$values] = $values;
        }
        $result = array_reverse($retVal, true);
        return $result;
    }
    /*
     * To generate months
     */

    public static function getMonthName($no) {

       /*$monthName = "";
        if($no == 01){
           $monthName = 'January';
       }
       if($no == 02){
           $monthName = 'February';
       }
       if($no == 03){
          $monthName ='March';
       }
       if($no == 04){
            $monthName = 'April';
       }
        if($no == 05){
           $monthName = 'May';
       }
       if($no == 06){
           $monthName = 'June';
       }
       if($no == 07){
            $monthName ='July';
       }
       if($no == 08){
           $monthName = 'August';
       }
       if($no == 09){
           $monthName = 'September';
       }
       if($no == 10){
          $monthName = 'October';
       }if($no == 11){
         $monthName =  'November';
       }
       if($no == 12){
          $monthName =  'December';
       }

       return $monthName;*/
        $monthNum = $no;
$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));

    }
    public function stringReplace($str){
        return str_replace('/', '-', $str);
    }

    /**
	Method to display ratings
    **/
    public function checkRatings($id,$ratingNumber)
	{
		$result = Yii::$app->db->createCommand("select count(id) from ait_ratings where photoId=".$id." AND ratings=".$ratingNumber." ")->queryAll();
		return $result;
        }

}
?>
