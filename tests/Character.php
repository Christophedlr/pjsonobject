<?php
/**
 * Copyright (c) 2019 Christophe Daloz - De Los Rios
 *  This code is licensed under MIT license (see LICENSE for details)
 */

class Character
{
    private $name;
    private $health;
    private $mana;

    public function __construct($name = '', $health = 100, $mana = 100)
    {
        $this->name = $name;
        $this->health = $health;
        $this->mana = $mana;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Character
     */
    public function setName(string $name): Character
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     * @return Character
     */
    public function setHealth(int $health): Character
    {
        $this->health = $health;
        return $this;
    }

    /**
     * @return int
     */
    public function getMana(): int
    {
        return $this->mana;
    }

    /**
     * @param int $mana
     * @return Character
     */
    public function setMana(int $mana): Character
    {
        $this->mana = $mana;
        return $this;
    }
}
