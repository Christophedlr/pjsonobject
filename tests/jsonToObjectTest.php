<?php
/**
 * Copyright (c) 2019 Christophe Daloz - De Los Rios
 *  This code is licensed under MIT license (see LICENSE for details)
 */

require_once 'Character.php';
require_once 'CharacterArray.php';

use PHPUnit\Framework\TestCase;

class jsonToObjectTest extends TestCase
{
    /**
     * @var Christophedlr\PJsonObject\PJsonObject
     */
    private $jsonObject;

    protected function setUp(): void
    {
        $this->jsonObject = new Christophedlr\PJsonObject\PJsonObject();
    }

    public function testGoodSimpleJson()
    {
        $json = json_encode(
            [
                'name' => 'Taureanoen',
                'health' => 100,
                'mana' => 100
            ]
        );

        $character = $this->jsonObject->jsonToObject($json, Character::class);

        $this->assertInstanceOf(Character::class, $character);
        $this->assertNotNull($character);
    }

    public function testGoodSimpleJsonWithArray()
    {
        $json = json_encode(
            [
                'name' => 'Taureanoen',
                'health' => 100,
                'mana' => 100,
                'stuff' => [
                    'Handmaiden\'s Cowl of Sacrifice',
                    'Amice of the Reef Witch',
                    'Vestments of Creeping Terror',
                    'Belt of Blind Devotion',
                    'Seawrath Legwraps',
                    'Eelskin Flippers',
                    'Cuffs of Soothing Currents',
                    'Handwraps of Unhindered Resonance'
                ]
            ]
        );

        $character = $this->jsonObject->jsonToObject($json, CharacterArray::class);

        $this->assertInstanceOf(CharacterArray::class, $character);
        $this->assertNotNull($character);
    }

    public function testGoodSimpleJsonWithAssocArray()
    {
        $json = json_encode(
            [
                'name' => 'Taureanoen',
                'health' => 100,
                'mana' => 100,
                'stuff' => [
                    'Head' => 'Handmaiden\'s Cowl of Sacrifice',
                    'Shoulder' => 'Amice of the Reef Witch',
                    'Chest' => 'Vestments of Creeping Terrore',
                    'Waist' => 'Belt of Blind Devotion',
                    'Legs' => 'Seawrath Legwrap',
                    'Feet' => 'Eelskin Flippers',
                    'Wrist' => 'Cuffs of Soothing Currents',
                    'Hands' => 'Handwraps of Unhindered Resonance'
                ]
            ]
        );

        $character = $this->jsonObject->jsonToObject($json, CharacterArray::class);

        $this->assertInstanceOf(CharacterArray::class, $character);
        $this->assertNotNull($character);
    }
}
