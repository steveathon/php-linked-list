<?php

	/**
	 * Very Very Simple Singly Linked List Class.
	 * @author Steve King <steve@sming.com.au>
	 *
	 */
	class linkedList {
		
		// Who's on first
		private $_first;
		// I don't know is on third.
		private $_last;
		// Total Count
		private $_total;
		// Position
		private $_pos;
		// What's on second.
		private $_posData;
		
		/**
		 * Simple constructor;
		 */
		public function __construct() {
			$this->_first = NULL;
			$this->_last = NULL;
			$this->_pos = 0;
			$this->_total = 0;
		}
		
		/**
		 * Insert (at end) element to the list;
		 * @param mixed $Input
		 */
		public function insert($Input = FALSE) {
			$Link = new linkedListNode($Input);
			
			if ( $this->_last == NULL && $this->_first == NULL ) {
				$Link->next = NULL;
				$this->_first = &$Link;
				$this->_last = &$Link;
				$this->_total++;
			}
			else {
				$Link->next = NULL;
				$this->_last->next = $Link;
				$this->_last = &$Link;
				$this->_total++;
			}
		}
		
		/**
		 * Based on the current position, return me the next element;
		 * @return object linkedListNode
		 */
		public function next() {
			if ( $this->_posData == NULL ) {
				$this->_posData = $this->_first;
			}
			else {
				$this->_posData = $this->_posData->next;
			}
			$this->_pos++;
			return $this->_posData->data;
		}
		
		/**
		 * Reverse the list, also reset the position of the active element,
		 * later it's probably a good idea to think about setting this to 
		 * the right position?
		 */
		public function reverse() {
			// Because we have linked both first and last, we uset the last;
			unset($this->_last);
			// Now we begin to iterate through from the start;
			$linkNode = $this->_first;
			// Set the next element to null;
			$linkReverse = NULL;
			
			// While nodes are flowing...
			while ( $linkNode != NULL ) {
				// Set a switcher to the next element;
				$Switch = $linkNode->next;
				// Set the next element to the last;
				$linkNode->next = $linkReverse;
				// Set the last element to this one;
				$linkReverse = $linkNode;
				// And set the first one to the next;
				$linkNode = $Switch;
			}
			
			// Now find the last element again;
			// There's probably a more efficient way
			$Switcher = $this->_first;
			while ( $Switcher->next != NULL ) {
				$Switcher = $Switcher->next;
			}
			// Now set the last element correctly;
			$this->_last = $Switcher;
			// Set the first element again;
			$this->_first = $linkReverse;
		}
		
		/**
		 * Reset the pointer.
		 */
		public function reset() {
			// Set our pointers back to the start;
			$this->_posData = NULL;
			$this->_pos = 0;
		}
		
		/**
		 * Return the last element;
		 */
		public function last() {
			// Return the last element
			return $this->_last;
		}
		
		/**
		 * Return the first element;
		 */
		public function first() {
			// Return the first element (whole list);
			return $this->_first;
		}
		
	}
	
	/**
	 * Simple linked list node class;
	 * @author Steve King <steve@sming.com.au>
	 *
	 */
	class linkedListNode {
		
		public $data;
		public $next;
		
		public function __construct($Input = FALSE) {
			$this->data = $Input;
			$this->next = NULL;
		}
		
		/**
		 * Return the data in the list;
		 */
		public function read() {
			return $this->data;
		}
		
	}