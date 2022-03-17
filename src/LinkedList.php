<?php

declare(strict_types=1);

namespace Ja1\LinkedList;

class LinkedList
{
    private ?ListNode $firstNode = null;
    private int $totalNodes = 0;

    public function insert(int|string $data): void
    {
        $newNode = new ListNode($data);

        if($this->firstNode === null) {
            $this->firstNode = $newNode;
        } else {
            $currentNode = $this->firstNode;
            while($currentNode->next() !== null) {
                $currentNode = $currentNode->next();
            }

            $currentNode->setNext($newNode);
        }
        
        $this->totalNodes += 1;
    }

    public function display(): void
    {
        echo "Liczba elementów: {$this->totalNodes}" . PHP_EOL;
        $currentNode = $this->firstNode;
        while($currentNode !== null) {
            echo $currentNode->data() . PHP_EOL;
            $currentNode = $currentNode->next();
        }
    }
}