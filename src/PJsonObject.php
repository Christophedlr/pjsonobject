<?php
/**
 * Copyright (c) 2019 Christophe Daloz - De Los Rios
 *  This code is licensed under MIT license (see LICENSE for details)
 */

namespace Christophedlr\PJsonObject;


use ReflectionClass;

/**
 * Object to JSON and JSON to object library
 * @package Christophedlr\PJsonObject
 * @author Christophe Daloz - De Los Rios
 * @version 1.0.0
 */
class PJsonObject
{
    /**
     * Get object and generate a JSON document
     *
     * @param $object
     * @return string
     * @throws \ReflectionException
     */
    public function objectToJson($object): string
    {
        $reflectionClass = new ReflectionClass($object);
        $reflectionProperties = $reflectionClass->getProperties();
        $properties = [];

        foreach ($reflectionProperties as $property) {
            $nameMethod = 'get'.ucfirst($property->getName());
            $properties[$property->getName()] = $object->$nameMethod();
        }

        return json_encode($properties);
    }

    /**
     * Get JSON document and add in object
     *
     * @param string $json
     * @param string $class
     * @return object
     * @throws \ReflectionException
     */
    public function jsonToObject(string $json, string $class): object
    {
        $array = json_decode($json, true);
        $reflectionClass = new ReflectionClass($class);
        $reflectionProperties = $reflectionClass->getProperties();
        $properties = [];
        $object = new $class();

        foreach ($reflectionProperties as $property) {
            $property->setAccessible(true);
            $properties[$property->getName()] = $property->getValue(new $class());
        }

        if (!empty(array_diff_key($array, $properties))) {
            throw new \Exception('JSON document and object is different');
        }

        foreach ($array as $key => $val) {
            $method = 'set'.ucfirst($key);
            $object->$method($val);
        }

        return $object;
    }
}
