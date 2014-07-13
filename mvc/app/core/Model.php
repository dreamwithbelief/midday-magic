<?php

class Model {
    private static $_instance = null;
    protected $_pdo, $_query, $_error = false, $_results, $_count = 0, $_table;

    protected function __construct() //  Create PDO & Connect to database
    {
        try {
            $this->_pdo = new PDO( 'mysql:host=' . Config::get( 'db/host' ) . ';dbname=' . Config::get( 'db/name' ), Config::get( 'db/user' ), Config::get( 'db/pass' ) );
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

    public static function get_instance() // Use an instance of this class
    {
        if ( !isset( self::$_instance ) ) {
            self::$_instance = new Model();
        }
        return self::$_instance;
    }

    public function set_table( $table ) // Sets table to be used in DB functions ex. delete, update, insert, get
    {
        $this->_table = strtolower( $table . 's' );
    }

    public function query( $sql, $params = array() ) // Mainly used with CRUD functions in this class but also for complex queries aka JOINS maybe?
    {
        $this->_error = false;
        if ( $this->_query = $this->_pdo->prepare( $sql ) ) {
            if ( count( $params ) ) {
                if ( $this->_query->execute( $params ) ) {
                    $this->_results = $this->_query->fetchAll( PDO::FETCH_OBJ );
                    $this->_count = $this->_query->rowCount();
                } else {
                    $this->_error = 'Error in query.';
                }
            }
        }
    }

    public function action( $action, $where = '', $table = null ) // Used for not complex actions like get or delete
    {
        $tbl = ( empty( $table ) ) ? $this->_table : $table;
        $sql = "{$action} FROM {$tbl}";
        $operators = explode( ',', '=,<=,>=,<>,!=,&,IS,IS NOT' );
        $values = array();

        if ( !empty( $where ) ) {
            $where_arr = explode( ' ', $where );
            for ( $i = 0; $i < count( $where_arr ); $i++ ) {
                if ( in_array( $where_arr[ ( $i - 1 ) ], $operators ) ) {
                    $values[ ] = $where_arr[ $i ];
                    $where_arr[ $i ] = '?';
                }

            }
            $sql .= ' WHERE ' . implode( ' ', $where_arr );
        }
        $this->query( $sql, $values );
        if ( !$this->error() ) {
            return true;
        }
        return false;
    }

    public function get( $where, $table = null ) // Simple query usually singular WHERE condition is used
    {
        $tbl = ( empty( $table ) ) ? $this->_table : $table;
        return $this->action( "SELECT *", $where, $tbl );
    }

    public function delete( $where, $table = null ) // Delete records with this
    {
        $tbl = ( empty( $table ) ) ? $this->_table : $table;
        return $this->action( "DELETE", $where, $tbl );
    }

    public function insert( $fields = array(), $table = null ) // Insert records
    {
        $tbl = ( empty( $table ) ) ? $this->_table : $table;
        $keys = array_keys( $fields );

        $values = '';
        for ( $i = 0; $i < count( $fields ); $i++ ) {
            $values .= '?, ';
        }
        $values = rtrim( $values, ', ' );

        $sql = "INSERT INTO {$tbl} (`" . implode( '`, `', $keys ) . "`) VALUES ({$values})";
        $this->query( $sql, array_values( $fields ) );
        if ( !$this->error() ) {
            return true;
        }
        return false;
    }

    public function update( $id, $fields = array(), $table = null ) // Update records
    {
        $tbl = ( empty( $table ) ) ? $this->_table : $table;
        $set = '';
        $x = 1;

        foreach ( $fields as $name => $value ) {
            $set .= "{$name} = ?";
            if ( $x < count( $fields ) ) {
                $set .= ', ';
            }
        }

        $sql = "UPDATE {$tbl} SET {$set} WHERE id = {$id}";
        $this->query( $sql, array_values( $fields ) );
        if ( !$this->error() ) {
            return true;
        }
        return false;
    }

    public function results() // Get results from last query used on instance of this class
    {
        return $this->_results;
    }

    public function first() // Get only the first record from the results() function
    {
        return $this->results()[ 0 ];
    }

    public function error() // Display error message.
    {
        return $this->_error;
    }

    public function count() // Returns number of records from last query used on instance of this class
    {
        return $this->_count;
    }
}