<?php

namespace Kladr\Core\Plugins\Tools {

    /**
     * Kladr\Core\Plugins\Tools\Tools
     * 
     * Набор вспомагательных методов
     * 
     * @author A. Yakovlev. Primepix (http://primepix.ru/)
     */
    class Tools 
    {

        /**
         * Нормализует строку
         * 
         * @param string $str
         * @return string
         */
        public static function Normalize($str){
            $str = preg_replace('/[^а-яА-Я0-9,]+/u', '', $str);
            $str = mb_strtolower($str);
            return $str;
        }

        /**
         * Конвертирует строку на английском в строку на русском в 
         * соответвии с windows раскладкой клавиатуры
         * 
         * @param string $strMessage
         * @return string
         */
        public static function Key($strMessage)
        {
            $s1 = "qazwsxedcrfvtgbyhnujmik,ol.p;[']-1234567890 ";
            $s2 = "йфяцычувскамепинртгоьшлбщдюзжхэъ-1234567890 ";

            $s12 = "QAZWSXEDCRFVTGBYHNUJMIK<OL>P:{\"} ";
            $s22 = "ЙФЯЦЫЧУВСКАМЕПИНРТГОЬШЛБЩДЮЗЖХЭЪ ";


            $strNew = '';
            for($i = 0; $i < strlen($strMessage); $i++)
            {
                $char = substr($strMessage, $i, 1);
                if(strpos($s2, $char) !== false)
                {
                    $strNew .= $char;
                    continue;
                }

                if(strpos($s22, $char) !== false)
                {
                    $strNew .= $char;
                    continue;
                }

                if(strpos($s1, $char) !== false)
                {
                    $p = strpos($s1, $char);
                    $strNew .= substr($s2, $p, 1);
                    continue;
                }

                if(strpos($s12, $char) !== false)
                {
                    $p = strpos($s12, $char);
                    $strNew .= substr($s22, $p, 1);
                    continue;
                }

            }

            return $strNew;
        }

    }
    
}