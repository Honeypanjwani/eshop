<?php 
class AesChieper{
	
	private $password = '3sc3RLrpd17';
	// CBC has an IV and thus needs randomness every time a message is encrypted
	private $method = 'aes-256-cbc';

	// Must be exact 32 chars (256 bit)
	// You must store this secret random key in a safe place of your system.
	
	private $key;
	// Most secure key
	//$key = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
	//chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

	// Most secure iv
	// Never ever use iv=0 in real life. Better use this iv:
	// $ivlen = openssl_cipher_iv_length($method);
	// $iv = openssl_random_pseudo_bytes($ivlen);
	// IV must be exact 16 chars (128 bit)
	private $iv="8a7d7jkiu8u8u7y6";
	
	public function __construct(){
		$this->key=$this->genrateKey();
	}
	
	public function encrypt(string $text){
		$encrypted = base64_encode(openssl_encrypt($text, $this->method, $this->key, OPENSSL_RAW_DATA, $this->iv));
		return $encrypted;
	}
	
	public function decrypt(string $text){
		$decrypted = openssl_decrypt(base64_decode($text), $this->method, $this->key, OPENSSL_RAW_DATA, $this->iv);
		return $decrypted;
	}
		
	public function genrateKey(){
		return substr(hash('sha256', $this->password, true), 0, 32);
	}	
	
	public function genrateIV(){
		$ivlen = openssl_cipher_iv_length($this->method);
		$iv = openssl_random_pseudo_bytes($ivlen);
		return $iv;
	}
}
?>