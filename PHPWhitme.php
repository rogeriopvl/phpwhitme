<?php

class PWhitme
{
	const SHORT_URL = "http://www.whit.me/api/short?";
	const EXPAND_URL = "http://www.whit.me/api/expand?";
	
	/**
	 * Constructor method
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Connects to the whit.me api and returns the response
	 */
	private function connect()
	{
		
	}
	
	/**
	 * Shorts a list of given urls and notes
	 * @param array $urls an associative array containing urls and respective notes
	 * @param string $note the note to be paired with a url
	 * @param string $hash custom url alias
	 */
	public function short($urls, $note, $hash)
	{
		
	}
	
	/**
	 * Expands the content of a whit.me hash
	 * @param string $hash the hash to be expanded
	 * @return array expanded hash in associative array
	 * with the same format as the returned JSON response
	 */
	public function expand($hash)
	{
		$this->connect
	}
}

?>