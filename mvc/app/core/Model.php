<?php

class Model
{
    private static $_instance = null;
    protected $_pdo, $_query, $_error = false, $_results, $_count = 0, $_table;

    protected function __construct()
    {
        try
        {
            $this->_pdo = new PDO( 'mysql:host='.Config::get( 'db/host' ).';dbname='.Config::get( 'db/name' ), Config::get( 'db/user' ), Config::get( 'db/pass' ) );
        }
        catch( PDOException $e )
        {
            die( $e->getMessage() );
        }
    }

    public static function get_instance()
    {
        if( !isset( self::$_instance ) )
        {
            self::$_instance = new Model();
        }
        return self::$_instance;
    }
    
    public function set_table( $table )
    {
        $this->_table = strtolower( $table );
    }

    public function query( $sql, $params = array() ) 
    {
        $this->_error = false;
        if ( $this->_query = $this->_pdo->prepare( $sql ) ) 
        {
            $x = 1;
            if ( count( $params ) ) 
            {
                foreach ( $params as $param ) 
                {
                    $this->_query->bindValue( $x, $param );
                    $x++;
                }

                if ( $this->_query->execute() ) 
                {
                    $this->_results = $this->_query->fetchAll( PDO::FETCH_OBJ );
                    $this->_count = $this->_query->rowCount();
                } 
                else 
                {
                    $this->_error = true;
                }
            }
        }
        return $this;
    }

    public function action( $action, $where = array() ) 
    {
        if ( count( $where ) === 3 ) 
        {
            $operators = array( '=', '>', '<', '>=', '<=', '&', 'IS', 'IS NOT' );
            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];

            if ( in_array( $operator, $operators ) ) {
                $sql = "{ $action } FROM { $this->_table } WHERE { $field } { $operator } ?";
                if ( !$this->query( $sql, array( $value ) )->error() ) 
                {
                    return $this;
                }
            }
        }
        return false;
    }

    public function get( $where ) 
    {
        return $this->action( "SELECT *", $this->_table, $where );
    }

    public function delete( $where ) 
    {
        return $this->action( "DELETE", $this->_table, $where );
    }

    public function insert( $fields = array() ) 
    {
        $keys = array_keys( $fields );
        $values = '';
        $x = 1;

        foreach ( $fields as $field ) 
        {
            $values .= "?";
            if ( $x < count( $fields ) ) 
            {
                $values .= ", ";
            }
            $x++;
        }

        $sql = "INSERT INTO { $this->_table } (`" . implode( '`, `', $keys ) . "`) VALUES ({ $values })";

        if ( !$this->query( $sql, $fields )->error() ) 
        {
            return true;
        }
        return false;
    }

    public function update( $id, $fields = array() ) 
    {
        $set = '';
        $x = 1;

        foreach ( $fields as $name => $value ) 
        {
            $set .= "{ $name } = ?";
            if ( $x < count( $fields ) ) 
            {
                $set .= ', ';
            }
        }

        $sql = "UPDATE { $this->_table } SET { $set } WHERE id = { $id }";

        if ( $this->query( $sql, $fields )->error() ) 
        {
            return true;
        }
        return false;
    }

    public function results() 
    {
        return $this->_results;
    }

    public function first() 
    {
        return $this->results()[0];
    }

    public function error() 
    {
        return $this->_error;
    }

    public function count() 
    {
        return $this->_count;
    }
}