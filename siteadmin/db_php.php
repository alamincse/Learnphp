<?php 
/**
 * Description : Data query
 * @author     : AL-AMIN
 * @package    : CMS
 */
	/** query user from user table */
	function site_user( $sess_id )
	{
		$data = mysql_query( "SELECT * FROM user WHERE id = '$sess_id' " );

		$user_info = mysql_fetch_object( $data );

		return $user_info;
	}


	/** Row check */
	function mysql_num_row( $table )
	{
		if( $table <> NULL ) :
			
			$data = mysql_query( "SELECT * FROM $table" );

			$row_count = mysql_num_rows( $data );

			return $row_count;
		else :
			return false;
		endif;
	}

	/** only query */
	function mysql_query_data( $table )
	{
		if( $table <> NULL )
			return mysql_query( "SELECT * FROM $table" );
		else
			return false;
	}
?>