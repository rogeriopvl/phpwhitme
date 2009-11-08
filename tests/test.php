<?php 

require_once ('PHPUnit/Framework.php');
require_once ('../PHPWhitme.php');

class PHPWhitmeTest extends PHPUnit_Framework_TestCase
{
	private $whit; // the PHPwhitme class instance
	
	public function setUp()
	{
		$this->whit = new PHPWhitme();
	}
	
	public function tearDown() {}
	
	/**
	 * Tests the short method with a url string as input
	 */
	public function testShort_withString()
	{
		$url = 'http://rogeriopvl.com/';
		$res = $this->whit->short($url, 'testing note');
		$res2 = $this->whit->expand($res['url']);
		
		$this->assertEquals($url, $res2['urls'][0]);
	}
	
	/**
	 * Tests the short method with an url array as input
	 */
	public function testShort_withArray()
	{
		$urls = array (
			'http://rogeriopvl.com/',
			'http://github.com/'
		);
		
		$notes = array (
			'mysite',
			'social coding'
		);
		
		$res = $this->whit->short($urls, $notes);
		$res2 = $this->whit->expand($res['url']);
		
		$this->assertEquals($urls[0], $res2['urls'][0]);
		$this->assertEquals($urls[1], $res2['urls'][1]);
	}
	
	/**
	 * Tests the expand method with a full whit.me url as input
	 */
	public function testExpand_withUrl()
	{
		$url = 'http://whit.me/IxFcgv';
		$res = $this->whit->expand($url);
		
		$this->assertEquals($res['urls'][0], 'http://rogeriopvl.com/');
	}
	
	/**
	 * Tests the expand method with a hash as input
	 */
	public function testExpand_withHash()
	{
		$hash = 'IxFcgv';
		$res = $this->whit->expand($hash);
		
		$this->assertEquals($res['urls'][0], 'http://rogeriopvl.com/');
	}
}
?>
