<?php

require_once 'Block.php';
require_once 'Blockchain.php';

// Initialize a new blockchain
$myBlockchain = new Blockchain();

// Add new blocks
echo "Mining block 1...\n";
$myBlockchain->addBlock(new Block(1, date("Y-m-d H:i:s"), ["amount" => 100]));

echo "Mining block 2...\n";
$myBlockchain->addBlock(new Block(2, date("Y-m-d H:i:s"), ["amount" => 50]));

echo "Mining block 3...\n";
$myBlockchain->addBlock(new Block(3, date("Y-m-d H:i:s"), ["amount" => 25]));

// Verify the integrity of the blockchain
echo "Is blockchain valid? " . ($myBlockchain->isChainValid() ? "Yes" : "No") . "\n";

// Output the entire blockchain
echo json_encode($myBlockchain->chain, JSON_PRETTY_PRINT);

?>