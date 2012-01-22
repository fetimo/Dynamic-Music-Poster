<?php
//get venue info for google maps api to geocode
class Venue
{
	private $_latestEvent;
	
	public function __construct()
	{
		$this->_latestEvent = simplexml_load_file('http://ws.audioscrobbler.com/2.0/?method=artist.getevents&artist='.ARTIST.'&api_key=fe0699f42bc90c13b46de1035fdb7161&limit=1&autocorrect=1');
	}
	
	public function getEventInfo()
	{
		$description = $this->_latestEvent->events->event->description;
		$description = (array)$description;
		
		if (empty($description)) {
			return false;
		} else {
			return $description;
		}
	}
	
	public function getAttendees()
	{
		return $this->_latestEvent->events->event->attendance;
	}
	
	public function getVenueName()
	{
		return $this->_latestEvent->events->event->venue->name;
	}
	
	public function getVenueStreet()
	{
		return $this->_latestEvent->events->event->venue->location->street;
	}
	
	public function getVenuePostCode()
	{
		return $this->_latestEvent->events->event->venue->location->postalcode;
	}
	
	public function getVenueCity()
	{
		return $this->_latestEvent->events->event->venue->location->city;
	}
	
	public function getVenueCountry()
	{
		return $this->_latestEvent->events->event->venue->location->country;
	}
	
	public function getEventTime()
	{
		return $this->_latestEvent->events->event->startDate;
	}
}

