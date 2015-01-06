<?php
namespace Oreilly\ModernPHP\Url;

use GuzzleHttp\Client;

class Scanner
{
    /**
     * @var array An array of URLs
     */
    protected $urls;

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * Constructor
     * @param array $urls An array of URLs to scan
     */
    public function __construct(array $urls)
    {
        $this->urls = $urls;
        $this->httpClient = new Client();
    }

    /**
     * Get invalid URLs
     * @return array
     */
    public function getInvalidUrls()
    {
        $invalidUrls = [];

        foreach ($this->urls as $url) {
            try {
                $statusCode = $this->getStatusCodeForUrl($url);
            } catch (\Exception $e) {
                $statusCode = 500;
            }

            if ($this->invalidHttpRequest($statusCode)) {
                array_push($invalidUrls, [
                    'url' => $url,
                    'status' => $statusCode
                ]);
            }
        }

        return $invalidUrls;
    }

    /**
     * Get HTTP status code for URL
     * @param string $url The remote URL
     * @return int The HTTP status code
     */
    protected function getStatusCodeForUrl($url)
    {
        $httpResponse = $this->httpClient->options($url);

        return $httpResponse->getStatusCode();
    }

    /**
     * Determine if the status code provided is valid or not
     * @param $statusCode
     * @return bool
     */
    private function invalidHttpRequest($statusCode)
    {
        return $statusCode >= 400;
    }
}
