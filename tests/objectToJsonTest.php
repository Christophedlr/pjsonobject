<?php

require_once 'Character.php';
require_once 'CharacterArray.php';

use PHPUnit\Framework\TestCase;

/**
 * Copyright (c) 2019 Christophe Daloz - De Los Rios
 *  This code is licensed under MIT license (see LICENSE for details)
 */

class objectToJsonTest extends TestCase
{
    /**
     * @var Christophedlr\PJsonObject\PJsonObject
     */
    private $jsonObject;

    protected function setUp(): void
    {
        $this->jsonObject = new Christophedlr\PJsonObject\PJsonObject();
    }

    public function testGoodSimpleObject()
    {
        $character = new Character('Lasur', 100, 0);
        $json = json_encode(
            [
                'name' => 'Lasur',
                'health' => 100,
                'mana' => 0
            ]
        );
        $result = $this->jsonObject->objectToJson($character);

        $this->assertEquals($json, $result);
    }

    public function testGoodObjectWithArray()
    {
        $character = new CharacterArray('Lasur', 100, 0);
        $character->setStuff(
            [
                'Warhelm of Dread Waters',
                'Trench Tyrant\'s Shoulderplates',
                'Naga Centaur\'s Shellplate',
                'Eternity Keeper\'s Greatbelt',
                'Fleetwrecker\'s Greaves',
                'Sabatons of the Stalwart',
                'Palace Sentinel Vambraces',
                'Gauntlets of Crashing Tides'
            ]
        );
        $json = json_encode(
            [
                'name' => 'Lasur',
                'health' => 100,
                'mana' => 0,
                'stuff' => [
                    'Warhelm of Dread Waters',
                    'Trench Tyrant\'s Shoulderplates',
                    'Naga Centaur\'s Shellplate',
                    'Eternity Keeper\'s Greatbelt',
                    'Fleetwrecker\'s Greaves',
                    'Sabatons of the Stalwart',
                    'Palace Sentinel Vambraces',
                    'Gauntlets of Crashing Tides'
                ]
            ]
        );
        $result = $this->jsonObject->objectToJson($character);

        $this->assertEquals($json, $result);
    }

    public function testGoodObjectWithAssocArray()
    {
        $character = new CharacterArray('Lasur', 100, 0);
        $character->setStuff(
            [
                'Head' => 'Warhelm of Dread Waters',
                'Shoulder' => 'Trench Tyrant\'s Shoulderplates',
                'Chest' => 'Naga Centaur\'s Shellplate',
                'Waist' => 'Eternity Keeper\'s Greatbelt',
                'Legs' => 'Fleetwrecker\'s Greaves',
                'Feet' => 'Sabatons of the Stalwart',
                'Wrist' => 'Palace Sentinel Vambraces',
                'Hands' => 'Gauntlets of Crashing Tides'
            ]
        );
        $json = json_encode(
            [
                'name' => 'Lasur',
                'health' => 100,
                'mana' => 0,
                'stuff' => [
                    'Head' => 'Warhelm of Dread Waters',
                    'Shoulder' => 'Trench Tyrant\'s Shoulderplates',
                    'Chest' => 'Naga Centaur\'s Shellplate',
                    'Waist' => 'Eternity Keeper\'s Greatbelt',
                    'Legs' => 'Fleetwrecker\'s Greaves',
                    'Feet' => 'Sabatons of the Stalwart',
                    'Wrist' => 'Palace Sentinel Vambraces',
                    'Hands' => 'Gauntlets of Crashing Tides'
                ]
            ]
        );
        $result = $this->jsonObject->objectToJson($character);

        $this->assertEquals($json, $result);
    }
}
