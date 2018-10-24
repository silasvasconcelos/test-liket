<?php

namespace App\Parsers;

use Log;
use Exception;

/**
 * LogReader, classe to reader log file with game information.
 *
 * @author Silas Vasconcelos
 */

class LogReader
{
		/**
		 * @var string $filePath=null Should contain the file path.
		 */
    private $filePath = null;

    /**
     * Create a new instance of LogReader.
     *
     * @param string $filePath=null Should pass the path to a file.
     * @return void
     */
    function __construct(string $filePath=null)
    {
    	if ($filePath) {
        	$this->setFilePath($filePath);
    	}
    }

    /**
     * @return string|null Return the file path or null.
     */
    function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath Must pass the file path.
     * @return void
     */
    function setFilePath(string $filePath)
    {
        return $this->filePath = $filePath;
    }

    /**
     * @return boolean Checks if the file exists.
     */
    function exists()
    {
        return file_exists($this->getFilePath());
    }

    /**
     * Send an Exception if have any errors in the file.
     *
     * @return void
     */
    function validateFile()
    {
        if ($this->getFilePath() === null) {
			throw new Exception("The file was not informed.");
		}

        if (!$this->exists()) {
			throw new Exception(sprintf('File not found in: %s.', $this->getFilePath()));
		}
    }

    /**
     * Read the file content
     *
     * @return string|null Should return the contents of the file
     */
    function readFile()
    {
    	$this->validateFile();
		return file_get_contents($this->getFilePath());
    }

    /**
     * Extract information from file to array
     *
     * @return array Array with data from file
     */
    function extract()
    {
    }
}