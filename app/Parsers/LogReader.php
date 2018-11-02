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
     * @var array $keyWordsToFilter Regex used to extract individual line.
     */
    private $keyWordsToFilter = null;
    /** @var array $regexToExtractLine Regex used to extract data from line */
    protected $regexToExtractLine = null;

    /**
     * Create a new instance of LogReader.
     *
     * @param string $filePath=null Should pass the path to a file.
     * @return void
     */
    function __construct(string $filePath = null)
    {
        if ($filePath) {
            $this->setFilePath($filePath);
        }

        // Set default key words to filter on start instance of class
        $this->setKeyWordsToFilter(['killed']);

        // Set default regex to extract data from line
        $regex = '/(\skill\:\s([\d\s]+)\:\s)|(\skilled\s)|(\sby\s)|(\r\n)/im';
        $this->setRegexToExtractLine($regex);
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
    function readFileToArray()
    {
        $this->validateFile();
        return file($this->getFilePath());
    }

    /**
     * Extract lines what you want
     *
     * @return array Array with lines what you want
     **/
    function filterLines(array $lines)
    {
        if (empty ($lines)) {
            return;
        }
        $keyWordsToFilter = $this->getKeyWordsToFilter();
        return array_filter((array)$lines, function ($line)use ($keyWordsToFilter)
        {
            return str_contains(strtolower($line), $keyWordsToFilter);
        }
         );
    }

    /**
     * Extraxt data from single line
     *
     * @param string $line Single line from file
     * @return array Array with data
     **/
    public function extractDataFromLine(string $line)
    {
        $no_result = 'Indisponível';
        $result = preg_split($this->getRegexToExtractLine(), $line, -1, PREG_SPLIT_NO_EMPTY);
        $data = [];
        array_set($data, 'time_of_game', trim(array_get($result, 0, $no_result)));
        array_set($data, 'killer', trim(array_get($result, 1, $no_result)));
        array_set($data, 'killed', trim(array_get($result, 2, $no_result)));
        array_set($data, 'mod', trim(array_get($result, 3, $no_result)));
        return $data;
    }

    /**
     * Extract information from file to array
     *
     * @return array Array with data from file
     */
    function extract()
    {
        $events = $this->filterLines($this->readFileToArray());
        $game = [];
        foreach ($events as $line) {

            array_push($game, $this->extractDataFromLine($line));
        }
        return $game;
    }

    /**
     * Get $filePath=null Should contain the file path.
     *
     * @return  string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * Set $filePath=null Should contain the file path.
     *
     * @param  string  $filePath  $filePath=null Should contain the file path.
     *
     * @return  self
     */
    public function setFilePath(string $filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * Get $keyWordsToFilter Regex used to extract individual line.
     *
     * @return  string
     */
    public function getKeyWordsToFilter()
    {
        return $this->keyWordsToFilter;
    }

    /**
     * Set $keyWordsToFilter Regex used to extract individual line.
     *
     * @param  string  $keyWordsToFilter  $keyWordsToFilter Regex used to extract individual line.
     *
     * @return  self
     */
    public function setKeyWordsToFilter(array $keyWordsToFilter)
    {
        $this->keyWordsToFilter = $keyWordsToFilter;

        return $this;
    }

    /**
     * Get the value of regexToExtractLine
     */
    public function getRegexToExtractLine()
    {
        return $this->regexToExtractLine;
    }

    /**
     * Set the value of regexToExtractLine
     *
     * @return  self
     */
    public function setRegexToExtractLine($regexToExtractLine)
    {
        $this->regexToExtractLine = $regexToExtractLine;

        return $this;
    }
}
