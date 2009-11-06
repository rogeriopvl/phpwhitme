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
	 * @param mixed $urls all urls to be shortened in 
	 * 			array or string (in case of only 1 url)
	 * @param mixed $urlnotes notes of respective urls.
	 *			Array or string. Must have same size and same type of $urls
	 * @param string $note the note to be paired with a url
	 * @param string $hash custom url alias
	 * @return string the shortened url
	 */
	public function short($urls, $urlnotes, $note=null, $hash=null)
	{
		if (gettype($urls) != gettype($urlnotes) || count($urls) != count($urlnotes))
		{
			throw new Exception('Number of urls must match number of notes.');
		}
		
		$params = is_array($urls) ? 'url='.implode('&url=', $urls) : 'url='.$urls;
		$params .= is_array($urlnotes) ? '&urlnote='.implode('$urlnote=', $urlnotes) : 'urlnote='.$urlnotes;
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