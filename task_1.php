<?php

/** 
 * @package test_task
 * @author Vlad Lozhenkov <vladlozhenkov1997@gmail.ru>
 * @final class Item should never be inherited
 * ---------------------------------------------
 * @property-read int $id Serve as unique identifer for Item
 * @property int $status Contain Item status
 * @property string $name Contain Item Name
 * @property bool $changed Define if Item was changed
 */

final class Item
{
    /**
     * @access private
     * @static 
     * @var array $objects Contain all predefined items */
    private static array $objects;

    private int $id;
    private int $status;
    private string $name;
    private bool $changed;

    /**
     * @param int $id Create object referencing by id
     * @return Item
     * @throws Exception if item not in objects array
     */
    public function __construct(int $id)
    {
        if (!isset($objects)) {
            $this->init();
        }
        if (!array_key_exists($id, self::$objects)) {
            throw new Exception("This item doesn't exist");
        }
        list($name, $status) = self::$objects[$id];
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->changed = false;
    }
    /**
     * @return void Method serve as initializer for objects array
     */
    private function init(): void
    {
        self::$objects = array(
            ["Brain", 1],
            ["Muscle", 0],
            ["Hand", 2],
            ["Feet", 1],
            ["Head", 0],
            ["Finger", 2],
        );
    }
    /**
     * @return mixed Serve as get method for class properties
     */
    public function __get(string $property): mixed
    {
        return $this->$property;
    }
    /**
     * @param string $property Serve as reference for property name
     * @param mixed $value Contain value that user wants to assign
     * @return void Serve as set method for class properties
     * @throws Exception User can't assign new value to id
     * @throws Exception User must put correct value
     */
    public function __set(string $property, mixed $value): void
    {
        if ($property === "id") {
            throw new Exception("You can't assign new value to id");
        }
        if ($this->isValid($this->$property, $value)) {
            throw new Exception("This value is not valid");
        }

        $this->$property = $value;
    }
    /**
     * @param string $name New value for property name of Item
     * @param int $status New value for property status of Item
     * @return void After invoking the method define property changed as true
     */
    public function save(string $name, int $status): void
    {
        $this->name = $name;
        $this->status = $status;
        $this->changed = true;
    }
    /**
     * @param string $property Serve as reference for Item property
     * @param int $status Contains value for validation
     * @return bool Defined if those variables are same type and value not empty
     */
    private function isValid(string $property, mixed $value): bool
    {
        return gettype($property) === gettype($value) || !empty($value);
    }
}
