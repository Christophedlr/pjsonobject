<?php
/**
 * Copyright (c) 2019 Christophe Daloz - De Los Rios
 *  This code is licensed under MIT license (see LICENSE for details)
 */

class CharacterArray
{
    private $name;
    private $health;
    private $mana;
    private $stuff;

    public function __construct($name = '', $health = 100, $mana = 100)
    {
        $this->name = $name;
        $this->health = $health;
        $this->mana = $mana;
        $this->stuff = [];
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
    public function setName(string $name): CharacterArray
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
    public function setHealth(int $health): CharacterArray
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
    public function setMana(int $mana): CharacterArray
    {
        $this->mana = $mana;
        return $this;
    }

    /**
     * @return array
     */
    public function getStuff(): array
    {
        return $this->stuff;
    }

    /**
     * @param array $stuff
     * @return CharacterAssocArray
     */
    public function setStuff(array $stuff): CharacterArray
    {
        $this->stuff = $stuff;
        return $this;
    }
}
