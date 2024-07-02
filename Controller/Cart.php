<?php 

class Cart {
    public $cartCounter;

    public function incrementCounter($quantidade) {
        $this->cartCounter+= $quantidade;
    }

    public function getCounter() {
        if ($this->cartCounter === 0) {
            return 0;
        } else {
            return $this->cartCounter;
        }
    }

};

?>