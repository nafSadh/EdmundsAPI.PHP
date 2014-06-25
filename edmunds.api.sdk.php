<?php
  class EdmundsAPI{
    /* consts */
    const ver = '0.1.7';
    const baseName = 'api.edmunds.com';
    const mediaName = 'media.ed.edmunds-media.com';

    /* properties */


    /* fields */
    private $key = '';
    private $htsecure = true;
    private $rFormat = 'json';
    private $baseUrl = '';
    private $mediaUrl = '';

    /* functions */
    public function __construct($apikey)
    {
      $this->key = $apikey;
      $this->setSecureProtocol();
      $this->setFormatJSON();
    }

    public function setSecureProtocol()
    {
      $this->htsecure = true;
      $this->baseUrl = "https://".EdmundsAPI::baseName;
      $this->mediaUrl = "https://".EdmundsAPI::mediaName;
    }
    public function unsetSecureProtocol()
    {
      $this->htsecure = false;
      $this->baseUrl = "https://".EdmundsAPI::baseName;
      $this->baseUrl = "https://".EdmundsAPI::mediaName;
    }

    public function setFormatJSON()
    {
      $this->rFormat = 'json';
    }
    public function setFormatXML()
    {
      $this->rFormat = 'xml';
    }


    public function call($endpoint, $param)
    {
      $uri = $this->baseUrl."/".$endpoint
        ."?fmt=".$this->rFormat
        ."&api_key=".$this->key
        .$param;

      echo $uri;

      return file_get_contents($uri);
    }

  }
?>
