<?php

/**
 * myValidatedSubmissionFile represents a validated uploaded file
 *
 * @author graphifox
 */
class myValidatedSubmissionFile extends sfValidatedFile
{
    protected $generated_name = "";

    public function generateFilename()
    {
        $this->generated_name = date("Y-M-d-H:i:s", time()) . $this->getExtension($this->getOriginalExtension());
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