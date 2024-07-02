<?php 

class Order {
    public $id;
    public $status;
    public $data;
    public $total;
    public $itens;

    public function addItem($id_item, $quantity, $name) {
        $this->itens = [
            $id_item => [
                'quantity' => $quantity ?? 1,
                'name' => $name,
            ],
        ];
        $this->id = $id_item;
    }

    public function getName() {
        return $this->itens[$this->id]['name'];
    }

    public function getQuantity() {
        return $this->itens[$this->id]['quantity'];
    }

    public function getPrice() {
        $price = 15;
        $price += $this->itens[$this->id]['quantity'] * $price;
    }

    public function getItens() {
        return $this->itens = [];
    }

}