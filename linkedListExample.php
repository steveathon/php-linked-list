<?php 
	include_once('linkedList.php');
	header ( 'Content-type: text/plain');
	$List = new linkedList();
	
	$Counter = 1;
	// Create a list of elements;
	while ( $Counter < 100 ) {
		$List->insert($Counter);
		$Counter++;
	}
	
	// Iterate the list we just created;
	
	while ( $Data = $List->next() ) {
		print_r($Data);
		echo "\r\n";
	}
	
	// Reverse the list;
	$List->reverse();
	
	// Show me the last element after the reverse
	print_r($List->last());
	
	// Insert a new element;
	$List->insert('moo');
	
	// Reset our pointer; (Yes, manually)
	$List->reset();
	
	// Iterate the list again;
	while ( $Data = $List->next() ) {
		print_r($Data);
		echo "\r\n";
	}
	
	?>