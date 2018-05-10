<?php
namespace App\JorgezarDiceRoll\Rolls;

use App\JorgezarDiceRoll\Dice\Dice;

class Roll implements iRoll
{
    private $pool = [];
    
    private $results = [];
    
    /**
     * execute roll
     *
     * @author Jerzy Zaremba-Śmietański
     */
    public function roll() {
        
        foreach ($this->pool as $diceType => $diceNumber) {
            $dice = new Dice($diceType);
            for ($i = 0; $i < $diceNumber; $i++ ) {
                $this->results[] = $dice::roll();
            }
        }

        return $this->results;
    }
    
    /**
     * Add number of dices to dice pool
     *
     * @param integer $diceSides
     * @param integer $diceNumber
     * @author Jerzy Zaremba-Śmietański
     */
    public function addDiceToPool($diceSides, $diceNumber) {
        $this->pool[$diceSides] = $diceNumber;
    }
}