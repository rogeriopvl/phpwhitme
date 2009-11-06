<?php
/**
 * PHPWhitme - PHP library to interact with whit.me url
 * shortening service.
 *
 * @author Rogerio Vicente <http://rogeriopvl.com>
 * @version 0.1
 * @license GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */

class PHPWhitme
{
	const SHORT_URL = "http://www.whit.me/api/short?";
	const EXPAND_URL = "http://www.whit.me/api/expand?";
	
	/**
	 * Constructor method
	 */
	public function __construct()
	{
		// am I needed?
	}
	
	/**
	 * Connects to the whit.me api and returns the response
	 */
	private function fetch_response($url)
	{
		$opts = array(
		  'http'=>array(
		    'method'=>"GET",
		    'header'=>"Accept: application/json\r\n"
		  )
		);

		$context = stream_context_create($opts);
		
		return file_get_contents($url, false, $context);
	}
	
	/**
	 * Shorts a list of given urls and notes
	 * @param array $urls all urls to be shortened
	 * @param array $urlnotes notes of respective urls. Must have same size of $urls
	 * @param string $note the note to be paired with a url
	 * @param string $hash custom url alias
	 * @return string the shortened url
	 */
	public function short($urls, $urlnotes, $note=null, $hash=null)
	{
		$params = 'url='.implode('&url=', $urls);
		$params .= '&urlnote='.implode('$urlnote=', $urlnotes);
		$params .= $note !== null ? '&note='.$note : '';
		$params .= $hash !== null ? '&hash='.$hash : '';
		
		return $this->fetch_response(SHORT_URL.urlencode($params));
	}
	
	/**
	 * Expands the content of a whit.me hash
	 * @param string $hash the hash to be expanded
	 * @return array expanded hash in associative array
	 * with the same format as the returned JSON response
	 */
	public function expand($hash)
	{
		// to do
	}
}

?>