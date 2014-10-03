<?php

class Item_lib
{
	var $CI;

  	function __construct()
	{
		$this->CI =& get_instance();
	}
	
	function get_item_location()
    {
        if(!$this->CI->session->userdata('item_location'))
        {
             $stock_locations = $this->CI->Stock_locations->get_allowed_locations();
			 $key=current(array_keys($stock_locations));
             $location_name = $stock_locations[$key]['location_id'];
             $this->set_item_location($location_name);
        }
        return $this->CI->session->userdata('item_location');
    }

    function set_item_location($location)
    {
        $this->CI->session->set_userdata('item_location',$location);
    }
    
    function clear_item_location()
    {
    	$this->CI->session->unset_userdata('item_location');
    }	
}

?>
