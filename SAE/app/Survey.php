<?php

class Survey
{
    private string $Q1;
    private string $Q2;
    private string $Q3;

    public function __construct(string $Q1, string $Q2, string $Q3){
        $this->Q1 = $Q1;
        $this->Q2 = $Q2;
        $this->Q3 = $Q3;
    }

    public function getQ1() : string{
        return $this->Q1;
    }
    public function getQ2() : string{
        return $this->Q2;
    }
    public function getQ3() : string{
        return $this->Q3;
    }


}