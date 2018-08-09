<?php

/**
 * This file is part of the Rathouz libraries (http://rathouz.cz)
 * Copyright (c) 2016 Tomas Rathouz <trathouz at gmail.com>
 */

namespace Rathouz\Tools\Objects;

/**
 * JObject generates JavaScript objects and configuration.
 *
 * @author Tomas Rathouz <trathouz at gmail.com>
 */
class JObject
{

    /** @var string */
    private $__name;

    /** @var string */
    private $__prefix;


    /**
     * Constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->__name = $name;
        $this->__prefix = $name;
    }


    /**
     * Set prefix of configuration.
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->__prefix = $prefix . '.' . $this->__prefix;
    }


    /** @return string */
    public function toString()
    {
        return (string) $this;
    }


    /** @return string */
    public function toJson()
    {
        return json_encode($this);
    }


    /** @return JObject */
    public function __get($name)
    {
        if (isset($this->$name) === FALSE) {
            $this->$name = new JObject($name);
        }

        return $this->$name;
    }


    /** @return string */
    public function __toString()
    {
        $lines = [];

        foreach ($this as $propertyName => $propertyValue) {
            if (strcmp($propertyName, '__name') === 0 || strcmp($propertyName, '__prefix') === 0) {
                continue;
            }

            if ($propertyValue instanceof JObject) {
                $propertyValue->setPrefix($this->__prefix);
                $lines[] = (string) $propertyValue;
            } elseif (is_array($propertyValue) === TRUE) {
                $lines[] = sprintf('%s.%s = %s;', $this->__prefix, $propertyName, json_encode($propertyValue));
            } else {
                $lines[] = sprintf('%s.%s = %s;', $this->__prefix, $propertyName, self::printValue($propertyValue));
            }
        }

        return join("\n", $lines);
    }


    /**
     * Print formated JavaScript value.
     * @param string $value
     * @return string
     */
    public static function printValue($value)
    {
        if (is_string($value) === TRUE) {
            if (preg_match_all("/function\s*\(.*\)\s*{.*}/s", $value) !== 0) {
                return $value;
            }

            return sprintf("'%s'", $value);
        }

        if (is_bool($value) === TRUE) {
            return ($value === TRUE) ? 'true' : 'false';
        }

        return $value;
    }


}
