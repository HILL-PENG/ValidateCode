<?php
/**
 * Generate an old fashion validate code for forms or anywhere, enjoy it.
 * Author: hill peng
 */
namespace ValidateCode;

class ValidateCode
{
	private $width = null;
	private $height = null;
	private $code = null;
	private $im = null;

	// $code provided within 5 chars is better
	function __construct($width = 100, $height = 40, $code)
	{
		$this->width = $width;
		$this->height = $height;
		$this->code = $code;
	}

	function generate()
	{
		// canvas with white backgroud
		$this->im = imagecreate($this->width, $this->height);
		imagecolorallocate($this->im, 255, 255, 255);

		// draw code characters
		$font_color = imagecolorallocate($this->im, 0, 0, 0);
		$code_len = strlen($this->code);
		for ($i = 0; $i < $code_len; $i++) {
			imagestring($this->im, rand(6,10), $this->width / $code_len * $i + rand(5,15), $this->height/2.4, $this->code[$i], $font_color);
		}

		// distractor lines
		for ($i = 0; $i < 5; $i++) {
			$line_color = imagecolorallocate($this->im, rand(0,255), rand(0,255), rand(0,255));
			imageline($this->im, rand(0, $this->width), rand(0, $this->height), rand(0, $this->width), rand(0, $this->height), $line_color);
		}
		
		// distractor spots
		for ($i = 0; $i < 100; $i++) {
			$pixel_color = imagecolorallocate($this->im, rand(0,255), rand(0,255), rand(0,255));
			imagesetpixel($this->im, rand(0, $this->width), rand(0, $this->height), $pixel_color);
		}

		// display
		header('content-type:image/png');
		imagepng($this->im);
		imagedestroy($this->img);
	}
}
