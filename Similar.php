<?php
//get similar artists from last.fm api

final class Similar
{
	private $_similar;
	
	public function __construct()
	{
		$this->_similar = simplexml_load_file('http://ws.audioscrobbler.com/2.0/?method=artist.getsimilar&artist='.ARTIST.'&api_key='.API_KEY.'&autocorrect=1&limit=4');
	}
	
	public function getSimilarArtists()
	{
		//iterate over the results
		foreach($this->_similar->similarartists->artist as $artist) {
			echo $artist->name[0] . ', ';
		}
	}
}