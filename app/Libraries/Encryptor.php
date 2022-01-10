<?php
namespace App\Libraries;
/**
 * Encryptor: A simple Masking algo.
 *
 * @copyright Copyright (c) 2011, Mike Cao <mike@mikecao.com>
 * @license   MIT, http://www.opensource.org/licenses/mit-license.php
 */
class Encryptor {
    /**
     * Default characters to use for shortening.
     *
     * @var string
     */
    private $chars = 'XPzSI6v5DqLuBtVWQARy2mfwkC14F8HUTOG0aJiYpNrl9Zxgbd3Khsno7jMeEc';

    /**
     * Salt for id encoding.
     *
     * @var string
     */
    private $salt = 'gZ6hdO59XT@Jm#...U&P3$1YMG7FvQyqjlKkf8zwitx0AcupDVs2RWCIBaNreob4nLHES';

    /**
     * Length of number padding.
     */
    private $padding = 4;
    
    
    
    /**
     * Gets the character set for encoding.
     *
     * @return string Set of characters
     */
    public function get_chars() {
        return $this->chars;
    }

    /**
     * Sets the character set for encoding.
     *
     * @param string $chars Set of characters
     */
    public function set_chars($chars) {
        if (!is_string($chars) || empty($chars)) {
            throw new Exception('Invalid input.');
        }
        $this->chars = $chars;
    }

    /**
     * Gets the salt string for encoding.
     *
     * @return string Salt
     */
    public function get_salt() {
        return $this->salt;
    }

    /**
     * Sets the salt string for encoding.
     *
     * @param string $salt Salt string
     */
    public function set_salt($salt) {
        $this->salt = $salt;
    }

    /**
     * Gets the padding length.
     *
     * @return int Padding length
     */
    public function get_padding() {
        return $this->padding;
    }

    /**
     * Sets the padding length.
     *
     * @param int $padding Padding length
     */
    public function set_padding($padding) {
        $this->padding = $padding;
    }

    /**
     * Converts an id to an encoded string.
     *
     * @param int $n Number to encode
     * @return string Encoded string
     */
    public function encode($n) {
        $k = 0;

        if ($this->padding > 0 && !empty($this->salt)) {
            $k = self::get_seed($n, $this->salt, $this->padding);
            $n = (int)($k.$n);
        }

        return self::num_to_alpha($n, $this->chars);
    }

    /**
     * Converts an encoded string into a number.
     *
     * @param string $s String to decode
     * @return int Decoded number
     */
    public function decode($s) {
        $n = self::alpha_to_num($s, $this->chars);

        return (!empty($this->salt)) ? substr($n, $this->padding) : $n;
    }

    /**
     * Gets a number for padding based on a salt.
     *
     * @param int $n Number to pad
     * @param string $salt Salt string
     * @param int $padding Padding length
     * @return int Number for padding
     */
    public static function get_seed($n, $salt, $padding) {
        $hash = md5($n.$salt);
        $dec = hexdec(substr($hash, 0, $padding));
        $num = $dec % pow(10, $padding);
        if ($num == 0) $num = 1;
        $num = str_pad($num, $padding, '0');

        return $num;
    }

    /**
     * Converts a number to an alpha-numeric string.
     *
     * @param int $num Number to convert
     * @param string $s String of characters for conversion
     * @return string Alpha-numeric string
     */
    public static function num_to_alpha($n, $s) {
        $b = strlen($s);
        $m = $n % $b;

        if ($n - $m == 0) return substr($s, $n, 1);

        $a = '';

        while ($m > 0 || $n > 0) {
            $a = substr($s, $m, 1).$a;
            $n = ($n - $m) / $b;
            $m = $n % $b;
        }

        return $a;
    }

    /**
     * Converts an alpha numeric string to a number.
     *
     * @param string $a Alpha-numeric string to convert
     * @param string $s String of characters for conversion
     * @return int Converted number
     */
    public static function alpha_to_num($a, $s) {
        $b = strlen($s);
        $l = strlen($a);

        for ($n = 0, $i = 0; $i < $l; $i++) {
            $n += strpos($s, substr($a, $i, 1)) * pow($b, $l - $i - 1);
        }

        return $n;
    }

}

