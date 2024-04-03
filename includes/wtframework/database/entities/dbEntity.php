<?php

/**
*   dbEntity.php
*   Abstract class of database entity
*
*   @author fet1sov <prodaugust21@gmail.com>
*/
abstract class DatabaseEntity {
    public function __call($method, $params) {
        $var = lcfirst(substr($method, 3));
        if (strncasecmp($method, "get", 3) === 0) {
            return $this->$var;
        }
        if (strncasecmp($method, "set", 3) === 0) {
            $this->$var = $params[0];
        }
    }

    /**
    * Saving all atributes of model in database
    */
    abstract public function saveData() : void;
}