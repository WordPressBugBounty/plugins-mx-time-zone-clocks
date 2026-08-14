<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Model class
*/
class MXMTZC_Model
{

	private $wpdb;

	/**
	* Table name
	*/
	protected $table = MXMTZC_TABLE_SLUG;

	/**
	* fields
	*/
	protected $fields = '*';

	/*
	* Model constructor
	*/
	public function __construct()
	{
		
		global $wpdb;

    	$this->wpdb = $wpdb;    	

	}	

	/**
	* select row from the database
	*/
	public function mxmtzc_get_row( $table = NULL, $wher_name = 'name', $wher_value = 'value' )
	{

		$table_name = $this->wpdb->prefix . $this->table;

		if( $table !== NULL ) {

			$table_name = $table;

		}

		$safe_fields = esc_sql( $this->fields );
		$safe_table  = esc_sql( $table_name );
		$safe_where  = esc_sql( $wher_name );
		$sql         = "SELECT {$safe_fields} FROM {$safe_table} WHERE {$safe_where} = %s"; // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared

		$get_row = $this->wpdb->get_row( $this->wpdb->prepare( $sql, $wher_value ) ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared,WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare

		return $get_row;
		
	}

	/**
	* get results from the database
	*/
	public function mxmtzc_get_results( $table = false, $wher_name = NULL, $wher_value = 1 )
	{

		$table_name = $this->wpdb->prefix . $this->table;

		if( $table !== false ) {

			$table_name = $table;

		}

		$safe_fields = esc_sql( $this->fields );
		$safe_table  = esc_sql( $table_name );

		if( $wher_name !== NULL ) {

			$safe_where = esc_sql( $wher_name );
			$sql        = "SELECT {$safe_fields} FROM {$safe_table} WHERE {$safe_where} = %s"; // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
			$results    = $this->wpdb->get_results( $this->wpdb->prepare( $sql, $wher_value ) ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared,WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare

		} else {

			$sql     = "SELECT {$safe_fields} FROM {$safe_table}"; // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
			$results = $this->wpdb->get_results( $sql ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared,WordPress.DB.DirectDatabaseQuery.DirectQuery,WordPress.DB.DirectDatabaseQuery.NoCaching

		}

		return $results;
		
	}

}