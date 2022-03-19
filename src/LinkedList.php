<?php

declare(strict_types=1);

namespace Ja1\LinkedList;

class LinkedList
{
    private ?ListNode $firstNode = null;
    private int $totalNodes = 0;

    public function first()
    {
        return $this->firstNode;
    }

    public function total()
    {
        return $this->totalNodes;
    }

    public function insert(int|string $data): void
    {
        $newNode = new ListNode($data);

        if ($this->totalNodes) {
            $current = $this->firstNode;
            while($current->next() !== null) {
                $current = $current->next();
            }

            $current->setNext($newNode);
        } else {
            $this->firstNode = $newNode;
        }
        
        $this->totalNodes ++;
    }

    public function insertFirst(int|string $data): void
    {
        $newNode = new ListNode($data);

        if ($this->totalNodes) {
            $newNode->setNext($this->firstNode);
            $this->firstNode = $newNode;
        } else {
            $this->firstNode = $newNode;
        }

        $this->totalNodes++;
    }

    public function insertBefore(int|string $data, int|string $query): void
    {
        $newNode = new ListNode($data);

        if($this->totalNodes) {
            $current = $this->firstNode;
            $previous = null;

            while($current->next() !== null) {
                if($current->data() === $query) {
                    break;
                }
                $previous = $current;
                $current = $current->next();
            }

            if($current->data() === $query) {
                $newNode->setNext($current);
                $this->totalNodes++;
                if ($previous) {
                    $previous->setNext($newNode);
                }
            }
        }
    }

    public function insertAfter(int|string $data, int|string $query): void
    {
        $newNode = new ListNode($data);

        if($this->totalNodes) {
            $current = $this->firstNode;

            while($current->next() !== null) {
                if($current->data() === $query) {
                    break;
                }
                $current = $current->next();
            }

            if($current->data() === $query) {
                $newNode->setNext($current->next());
                $current->setNext($newNode);
                $this->totalNodes++;
            }
        }
    }

    public function delete(int|string $query): void
    {
        if($this->totalNodes) {
            $current = $this->firstNode;
            $previous = null;

            while ($current->next() !== null) {
                if ($current->data() === $query) {
                    break;
                }
                $previous = $current;
                $current = $current->next();
            }

            if (!$current->data() === $query) {
                return;
            }

            if ($previous) {
                if ($current->next() === null) {
                    $previous->setNext(null);
                } else {
                    $previous->setNext($current->next());
                }
            } else {
                $this->firstNode = $current->next();
            }

            unset($current);
            $this->totalNodes--;
        }
    }

    public function search(int|string $query): ?ListNode
    {
        if($this->totalNodes) {
            $current = $this->firstNode;
            while($current->next() !== null) {
                if($current->data() === $query) {
                    break;
                }
                $current = $current->next();
            }

            if($current->data() === $query) {
                return $current;
            }
            
            return null;
        }
    }
}