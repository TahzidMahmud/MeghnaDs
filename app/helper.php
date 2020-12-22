<?php 

use App\Investment;

function get_investment_by_id($id)
{
	return Investment::find($id);
}

?>