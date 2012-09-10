<?php

/**
 * myValidatedFile represents a validated uploaded file
 *
 * @author graphifox
 */
class myValidatedFile extends sfValidatedFile
{
    protected $generated_name = "";

    public function generateFilename()
    {
        $this->generated_name = md5($this->getOriginalName().time()).$this->getExtension($this->getOriginalExtension());
        return $this->generated_name;
    }

    public function getGeneratedName()
    {
        return $this->generated_name;
    }

    public function getSanitizedOriginalName()
    {
        return myToolkit::sanitizeString($this->getOriginalName());
    }

}