<?php

declare(strict_types=1);

namespace Ja1\LinkedList;

class LinkedListDisplay
{
    public function display(LinkedList $list)
    {
        echo "Liczba elementów: {$list->total()}" . PHP_EOL;
        $currentNode = $list->first();
        while($currentNode !== null) {
            echo $currentNode->data() . PHP_EOL;
            $currentNode = $currentNode->next();
        }
    }
}