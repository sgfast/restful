<?php

/**
 * 3DES加解密类
 * 例子：
 * $key = 'a25f+_4.fef)(Uf5';
 * $iv = 's#f!3=-s';
 * $msg = '9a5eaf7992935f46137d98c680f7ff17';
 * $des = new STD3Des ( $key, $iv );
 * $rs1 = $des->encrypt ( $msg );
 * echo urlencode($rs1) . '<br />';
 * $rs2 = $des->decrypt ( $rs1 );
 * echo $rs2;
 */
class STD3Des {

	private $key = "";
	private $iv = "";

	/**
	 * 构造，传递二个已经进行base64_encode的KEY与IV
	 *
	 * @param string $key
	 * @param string $iv(必须为8位字符串)
	 */
	function __construct($key, $iv) {
		if (empty ( $key ) || empty ( $iv )) {
			echo 'key and iv is not valid';
			exit ();
		}
		$this->key = base64_encode ($key);
		$this->iv = base64_encode ($iv);
	}

	/**
	 * 加密
	 *
	 * @param string $value 需要加密的字符串
	 * @return 加密后的字符串
	 */
	public function encrypt($value) {
		$td = mcrypt_module_open ( MCRYPT_3DES, '', MCRYPT_MODE_CBC, '' );
		$iv = base64_decode ( $this->iv );
		$value = $this->PaddingPKCS7 ( $value );
		$key = base64_decode ( $this->key );
		mcrypt_generic_init ( $td, $key, $iv );
		$ret = base64_encode ( mcrypt_generic ( $td, $value ) );
		mcrypt_generic_deinit ( $td );
		mcrypt_module_close ( $td );
		return $ret;
	}

	/**
	 * 解密
	 *
	 * @param string $value 需要解密的字符串
	 * @return 解密过的字符串
	 */
	public function decrypt($value) {
		$td = mcrypt_module_open ( MCRYPT_3DES, '', MCRYPT_MODE_CBC, '' );
		$iv = base64_decode ( $this->iv );
		$key = base64_decode ( $this->key );
		mcrypt_generic_init ( $td, $key, $iv );
		$ret = trim ( mdecrypt_generic ( $td, base64_decode ( $value ) ) );
		$ret = $this->UnPaddingPKCS7 ( $ret );
		mcrypt_generic_deinit ( $td );
		mcrypt_module_close ( $td );
		return $ret;
	}

	private function PaddingPKCS7($data) {
		$block_size = mcrypt_get_block_size ( 'tripledes', 'cbc' );
		$padding_char = $block_size - (strlen ( $data ) % $block_size);
		$data .= str_repeat ( chr ( $padding_char ), $padding_char );
		return $data;
	}

	private function UnPaddingPKCS7($text) {
		$pad = ord ( $text {strlen ( $text ) - 1} );
		if ($pad > strlen ( $text )) {
			return false;
		}
		if (strspn ( $text, chr ( $pad ), strlen ( $text ) - $pad ) != $pad) {
			return false;
		}
		return substr ( $text, 0, - 1 * $pad );
	}
}

?>