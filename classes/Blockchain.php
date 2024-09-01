<?php

class Blockchain
{
    public $chain;
    public $difficulty;

    public function __construct()
    {
        $this->chain = [$this->createGenesisBlock()];
        $this->difficulty = 4; // Difficulty level for mining (4 leading zeros)
    }

    // Create the first block (Genesis Block)
    private function createGenesisBlock()
    {
        return new Block(0, date("Y-m-d H:i:s"), "Genesis Block", "0");
    }

    // Get the latest block in the chain
    public function getLatestBlock()
    {
        return $this->chain[count($this->chain) - 1];
    }

    // Add a new block to the chain
    public function addBlock($newBlock)
    {
        $newBlock->previousHash = $this->getLatestBlock()->hash;
        $newBlock->mineBlock($this->difficulty);
        $this->chain[] = $newBlock;
    }

    // Check if the blockchain is valid
    public function isChainValid()
    {
        for ($i = 1; $i < count($this->chain); $i++) {
            $currentBlock = $this->chain[$i];
            $previousBlock = $this->chain[$i - 1];

            // Check if current block's hash is correct
            if ($currentBlock->hash !== $currentBlock->calculateHash()) {
                return false;
            }

            // Check if current block's previous hash matches the previous block's hash
            if ($currentBlock->previousHash !== $previousBlock->hash) {
                return false;
            }
        }
        return true;
    }
}

?>