<?php

namespace App\Core\Utilities;

class HtmlFormatUtility {

    public static function stripUnicode($str) {
        if (!$str)
            return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ạ|Ả|Ã|Ă|Ắ|Ằ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach ($unicode as $nonUnicode => $uni)
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        return $str;
    }

    public static function get_slug_alias($name)
    {
        $replacement = '-';
        $map = array();
        $quotedReplacement = preg_quote($replacement, '/');
        $default = array(
            '/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|å/' => 'a',
            '/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|ë/' => 'e',
            '/ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ|î/' => 'i',
            '/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ø/' => 'o',
            '/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ů|û/' => 'u',
            '/ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ/' => 'y',
            '/đ|Đ/' => 'd',
            '/ç/' => 'c',
            '/ñ/' => 'n',
            '/ä|æ/' => 'ae',
            '/ö/' => 'oe',
            '/ü/' => 'ue',
            '/Ä/' => 'Ae',
            '/Ü/' => 'Ue',
            '/Ö/' => 'Oe',
            '/ß/' => 'ss',
            '/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
            '/\\s+/' => $replacement,
            sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => ''
        );
        // Some URL was encode, double first
        $name = urldecode($name);
        $map = array_merge($map, $default);
        return strtolower(preg_replace(array_keys($map), array_values($map), $name));
    }

    public static function stripSymbol($str) {
        return str_replace(array("\r\n", "\n", "\r", "-", "+", "/", "<", ">", ",", "!", ":", ".", "?", "|", "#", "&", "%", "^", "*", ")", "(", "_", "{", "}", "[", "]"), " ", $str);
    }

    public static function parseToAlias($str) {
        $noMark = strtolower(HtmlFormatUtility::stripUnicode($str));
        $noMark = preg_replace('/[^a-z0-9\s]+/i', '', $noMark);
        $noMark = preg_replace('/\s+/', ' ', $noMark);
        $alias = str_replace(" ", "-", trim(strtolower($noMark)));
        return $alias;
    }

    public static function string_cut($string, $length) {
        $des = strip_tags($string);
        $des = str_replace('  ', ' ', $des);
        $sub_fix = substr($des, $length - 1, $length + 31);
        $pos = HtmlFormatUtility::find_str_position(" ", $sub_fix);
        $pos += $length;
        $des = substr($des, 0, $pos);
        return $des;
    }

    public static function find_str_position($find, $string) {
        $pos = strpos($string, $find);
        return $pos;
    }

    public static function sub_string($str, $len, $allowable_tags = '', $skip_line = false, $more = '...', $encode = 'utf-8') {
        $allowable_tags = '<br><br/><p>';
        /* Loại bo ca the khong hop le */
        $str = trim(strip_tags($str, $allowable_tags));

        /* Loai bo style cua cac the con lai chuyen the p thanh the br */
        $str = preg_replace('#<\/?p[^>]*>#', '<br/>', $str); // echo $str;die;
        //$str = preg_replace('#<\/?p\s*\w*>#','<br/>',$str);
        /* bỏ các dấu xuống dòng liên tiếp */
        $str = preg_replace('#(<br[^>]*>\s*){2,}#', '<br/>', $str); // bo cac dau xuong dong lien tiep
        /* Bỏ các thẻ rỗng */
        /* bo cac khoang trang canh nhau */
        $str = preg_replace('#\s+#', ' ', $str);

        /* return ngay neu chuỗi đã hợp lệ */
        if ($str == "" || $str == NULL || mb_strlen($str, $encode) <= $len) {
            return $str;
        }
        /* Cắt chuoi theo độ dài đã được yêu cầu */
        $str = mb_substr($str, 0, $len, $encode);
        /* De phong cắt phải giữa thẻ  br */
        $pos = mb_strripos($str, "<", 0, $encode);
        if (($len - $pos) < 5)
            $str = mb_substr($str, 0, $pos, $encode);
        /* nếu cắt phải giữa một từ thì bỏ cả từ đó đi luôn (chỉ thao tác với từ hợp lệ) */
        if ($str != "") {
            $pos = mb_strripos($str, " ", 0, $encode);
            if ($pos !== false && $pos > ($len - 8)) {
                $str = mb_substr($str, 0, $pos + 1, $encode);
            }
            $str .= $more;
        }
        //var_dump($str);die;
        return $str;
    }

    // Thay the cac Url trong noi dung thanh the a
    public static function addAtag($content) {
        $expression1 = "%[^(http:\/\/)(ftp:\/\/)(https:\/\/)](www\.){1,1}(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&\%@!\-\/]))?%";
        $expression = "%((ftp|http|https):\/\/){1,1}(www\.)?(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&\%@!\-\/]))?%";
        $content = preg_replace($expression, " <a href=\"$0\" target=\"_blank\">$0</a> ", $content);
        $content = preg_replace($expression1, " <a href=\"http://$3\" target=\"_blank\">$0</a> ", $content);
        return $content;
    }

    public static function sub_strip($str, $len, $allowable_tags = '', $skip_line = false, $more = '...', $encode = 'utf-8') {
        $allowable_tags = '<br><br/><p>';
        /* Loại bo ca the khong hop le */
        $str = trim(strip_tags($str, $allowable_tags));

        /* Loai bo style cua cac the con lai chuyen the p thanh the br */
        $str = preg_replace('#<\/?p[^>]*>#', '<br/>', $str); // echo $str;die;
        //$str = preg_replace('#<\/?p\s*\w*>#','<br/>',$str);
        /* bỏ các dấu xuống dòng liên tiếp */
        $str = preg_replace('#(<br[^>]*>\s*){2,}#', '<br/>', $str); // bo cac dau xuong dong lien tiep
        /* Bỏ các thẻ rỗng */
        /* bo cac khoang trang canh nhau */
        $str = preg_replace('#\s+#', ' ', $str);

        /* return ngay neu chuỗi đã hợp lệ */
        if ($str == "" || $str == NULL || mb_strlen($str, $encode) <= $len) {
            return $str;
        }
        /* Cắt chuoi theo độ dài đã được yêu cầu */
        $str = mb_substr($str, 0, $len, $encode);
        /* De phong cắt phải giữa thẻ  br */
        $pos = mb_strripos($str, "<", 0, $encode);
        if (($len - $pos) < 5)
            $str = mb_substr($str, 0, $pos, $encode);
        /* nếu cắt phải giữa một từ thì bỏ cả từ đó đi luôn (chỉ thao tác với từ hợp lệ) */
        if ($str != "") {
            $pos = mb_strripos($str, " ", 0, $encode);
            if ($pos !== false && $pos > ($len - 8)) {
                $str = mb_substr($str, 0, $pos + 1, $encode);
            }
            $str .= $more;
        }
        //var_dump($str);die;
        return $str;
    }

    /**
     * Get substring
     * @param $str String to be cutted
     * @param $len Length of substring
     * @param $more TRUE or FALSE Add ... or not
     * @return substring with specified length and
     */
    public static function cut_string($str, $len, $more) {
        if ($str == "" || $str == NULL)
            return $str;
        if (is_array($str))
            return $str;
        $str = trim($str);
        if (strlen($str) <= $len)
            return $str;
        $str = substr($str, 0, $len);
        if ($str != "") {
            if (!substr_count($str, " ")) {
                if ($more)
                    $str .= " ...";
                return $str;
            }
            //while (strlen($str) && ($str["strlen($str)-1"] != " ")) {
            while (strlen($str) && (substr($str, -1) != " ")) {
                $str = substr($str, 0, -1);
            }
            $str = substr($str, 0, -1);
            if ($more) {
                $str .= " ...";
                return $str;
            }
        }
        return $str . "...";
    }

    public static function short_desc($str, $len, $charset = 'UTF-8', $more = '...') {
        $str = html_entity_decode($str, ENT_QUOTES, $charset);
        if (strlen($str) <= $len) {
            return html_entity_encode($str);
        }
        if (mb_strlen($str, $charset) > $len) {
            $arr = explode(' ', $str);
            $str = mb_substr($str, 0, $len, $charset);
            $arrRes = explode(' ', $str);
            $last = $arr[count($arrRes) - 1];
            unset($arr);
            if (strcasecmp($arrRes[count($arrRes) - 1], $last)) {
                if (count($arrRes) > 1) {
                    unset($arrRes[count($arrRes) - 1]);
                }
            }
            return html_entity_encode(implode(' ', $arrRes) . $more);
        }
        return html_entity_encode($str . $more);
    }

    /**
     * This function extracts the non-tags string and returns a correctly formatted string
     * It can handle all html entities e.g. &amp;, &quot;, etc..
     *
     * @param string $s
     * @param integer $srt
     * @param integer $len
     * @param bool/integer	Strict if this is defined, then the last word will be complete. If this is set to 2 then the last sentence will be completed.
     * @param string A string to suffix the value, only if it has been chopped.
     */
    public static function html_substr($s, $srt, $len = NULL, $strict = false, $suffix = NULL) {
        if (is_null($len)) {
            $len = strlen($s);
        }

        $f = 'static $strlen=0; 
			if ( $strlen >= ' . $len . ' ) { return "><"; } 
			$html_str = html_entity_decode( $a[1] );
			$subsrt   = max(0, (' . $srt . '-$strlen));
			$sublen = ' . ( empty($strict) ? '(' . $len . '-$strlen)' : 'max(@strpos( $html_str, "' . ($strict === 2 ? '.' : ' ') . '", (' . $len . ' - $strlen + $subsrt - 1 )), ' . $len . ' - $strlen)' ) . ';
			$new_str = substr( $html_str, $subsrt,$sublen); 
			$strlen += $new_str_len = strlen( $new_str );
			$suffix = ' . (!empty($suffix) ? '($new_str_len===$sublen?"' . $suffix . '":"")' : '""' ) . ';
			return ">" . htmlentities($new_str, ENT_QUOTES, "UTF-8") . "$suffix<";';

        $str = preg_replace(
                array("#<[^/][^>]+>(?R)*</[^>]+>#", "#(<(b|h)r\s?/?>){2,}$#is"),
                "",
                trim(
                        rtrim(
                                ltrim(
                                        preg_replace_callback(
                                                "#>([^<]+)<#",
                                                create_function('$a', $f),
                                                ">$s<"
                                        ),
                                        ">"
                                ),
                                "<"
                        )
                )
        );
        return str_replace("&amp;#39;","'",$str);
    }

    /**
     * remove style, script tag from html
     */
    public static function html_remove_script(&$text) {
        $ns = preg_replace('/(<script[^>]*>.+?<\/script>|<style[^>]*>.+?<\/style>)/s', '', $text);
        $text = $ns;
        return $ns;
    }

    /**
     * get string in first tag html
     * @param string
     * @param tag
     */
    public static function get_string_in_first_tag($text, $tag) {
        $matches = array();
        if (preg_match("/(<" . $tag . "[^>]*>.+?<\/$tag>)/", $text, $matches)) {
            if ($matches) {
                $resutl = array_shift($matches);
                return strip_tags($resutl);
            }
        }
        return '';
    }

    /**
     *
     * @param type $str
     * @param type $len
     * @param type $charset
     * @param type $more
     */
    public static function removeStringBetweenFile($str, $len, $charset = 'UTF-8', $more = '...') {
        if (strlen($str) <= $len) {
            return $str;
        }
        $last_string = mb_substr($str, -5);
        $first_string = self::short_desc($str, $len, $charset, $more);
        return $first_string . $last_string;
    }

    /**
     * format number
     *
     * @param value
     */
    public static function numberFormat($value, $f = 2) {
        return number_format($value, $f);
    }

    /**
     *
     * @param type $unname
     * @param type $arrayName
     * @return boolean
     */
    public static function testStrInArray($unname, $arrayName) {
        $rs = false;
        if (count($arrayName) > 0) {
            foreach ($arrayName as $key => $value) {
                if ($unname == $value) {
                    $rs = true;
                    break;
                }
            }
        }

        return $rs;
    }

    /**
     *
     * @param type $arrayStepName
     * @param type $stepname
     * @param type $att
     * @return type
     */
    public static function getNameInArray($arrayStepName, $stepname, $att) {
        $unname = trim($stepname);
        $arrayName = array();
        foreach ($arrayStepName as $key => $item) {
            if (preg_match("/" . trim($stepname) . "/", $item->$att)) {
                $arrayName[] = $item->$att;
            }
        }
        if (count($arrayName) > 0) {
            $dem = 1;
            while (self::TestStrInArray($unname, $arrayName) == true) {
                $unname = $stepname . '(' . $dem . ')';
                $dem++;
            }
        }
        return trim($unname);
    }

    /**
     * price format
     */
    public static function priceFormat($value) {
        return number_format($value, 2, ".", ",");
    }

    public static function removeElementsByTagName($tagName, $document) {
        $nodeList = $document->getElementsByTagName($tagName);
        for ($nodeIdx = $nodeList->length; --$nodeIdx >= 0;) {
            $node = $nodeList->item($nodeIdx);
            $node->parentNode->removeChild($node);
        }
    }

    public static function stripTag($text = '', $tags = []) {
        if ($text == '')
            return $text;
        return $text;
        $tags = $tags ? $tags : ['script', 'style', 'link'];
        $doc = new \DOMDocument();
        $doc->loadHTML($text);
        foreach ($tags as $tag) {
            self::removeElementsByTagName($tag, $doc);
        }
        return $doc->saveHTML();
    }

}
