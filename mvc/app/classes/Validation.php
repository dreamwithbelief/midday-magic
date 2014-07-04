<?php

class Validation
{
    private $_passed = false, $_errors = array(), $_db = null;

    public function __construct()
    {
        $this->_db = Model::get_instance();
    }

    public function check( $source, $items = array() )
    {
        foreach( $items as $item => $rules)
        {
            foreach($rules as $rule => $rule_value)
            {
                $value = $source[ $item ];

                if( $rule === 'required' && empty( $value ) )
                {
                    $this->add_err( "{ $item } is required" );
                }
                elseif( !empty( $value ) )
                {
                    switch( $rule )
                    {
                        case 'min':
                            if( strlen( $value ) < $rule_value )
                            {
                                $this->add_err("{ $item } must be a minimum of { $rule_value } characters.");
                            }
                            break;
                        case 'max':
                            if( strlen( $value ) > $rule_value )
                            {
                                $this->add_err("{ $item } must be a maximum of { $rule_value } characters.");
                            }
                            break;
                        case 'matches':
                            if( $value != $source[ $rule_value ] )
                            {
                                $this->add_err("{ $rule_value } must match { $item }.");
                            }
                            break;
                        case 'unique':
                            $check = $this->_db->get( $rule_value, array($item, '=', $value ) );
                            if( $check->count() )
                            {
                                $this->add_err("{ $item } already exists.");
                            }
                            break;
                        default:
                            break;
                    }
                }
            }
        }

        if( empty( $this->_errors ) )
        {
            $this->_passed = true;
        }

        return $this;
    }

    private function add_err( $error )
    {
        $this->_errors[] = $error;
    }

    public function errors( $num = null )
    {
        $num = intval( $num );
        if( empty( $num ) )
        {
            return $this->_errors;
        }
        else
        {
            return array_slice( $this->_errors, 0, $num, true);
        }
    }

    public function passed()
    {
        return $this->_passed;
    }
}