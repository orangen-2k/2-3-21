<?php
    function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){
        $str=trim($str);
        if ($str=="")return "";
        $str =str_replace('"','',$str);
        $str =str_replace("'",'',$str);
        $str =stripUnicode($str);
        $str =mb_convert_case($str, $case,'utf-8');
        $str =preg_replace('/[\W|_]+/',$strSymbol,$str);
        return $str;
    }

    function stripUnicode($str){
     if (!$str) return '';
     $unicode = array(
         'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ầ|ậ|ấ|ẩ|ẫ|',
         'A'=>'Á|À|Ạ|Ả|Ã|Ắ|Ằ|Ặ|Ẵ|Ẳ|Ă|Â|Ầ|Ấ|Ậ|Ẫ|Ẩ',
         'e'=>'é|è|ẹ|ẽ|ẻ|ế|ề|ê|ệ|ễ|ể',
         'E'=>'É|È|Ẹ|Ẽ|Ẻ|Ê|Ế|Ề|Ể|Ễ|Ể',
         'o'=>'ó|ò|ỏ|ọ|õ|ô|ố|ồ|ộ|ổ|ỗ|ơ|ớ|ờ|ợ|ỡ|ở',
         'O'=>'Ó|Ò|Ọ|Ỏ|Õ',
         'u'=>'ú|ù|ụ|ũ|ủ',
         'U'=>'Ú|Ù|Ụ|Ũ|Ủ',
         'y'=>'ý|ỳ|ỵ|ỹ|ỷ',
         'Y'=>'Ý|Ỳ|Ỵ|Ỹ|Ỷ',
     );
     foreach ($unicode as $khongdau=>$codau){
         $arr=explode("|",$codau);
         $str = str_replace($arr,$khongdau,$str);
     }
     return $str;
    }
    function quickRandom($length = 16)
        {
            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
        }
    function randomfogot($length = 16)
        {
            $pool = '0123456789';

            return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
        }
?>
