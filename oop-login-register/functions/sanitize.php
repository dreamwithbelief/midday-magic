<?php
/**
 * Original Creation Information
 *      Author: Kyle Stafford
 *      Date:   6/30/14
 *      Time:   11:08 PM
 */

  function escape( $string ) {
    return htmlentities( $string, ENT_QUOTES, 'UTF-8' );
  }
?>