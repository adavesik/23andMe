<?php

// Script #1: Redirect to 23andMe with client_id.

class AuthorizationRequest
{
    /**
     * The redirect uri from your dashboard, e.g. https://exampleapp.com/receive_code/.
     * @var string
     */
    private $redirectURI;
    /**
     * Unclear what this does.  See {@link https://api.23andme.com/docs/authentication/ official docs}
     * @var string
     */
    private $responseType = 'code';
    /**
     * The client id from your dashboard.
     * @var string
     */
    private $clientId;
    /**
     * A list of scopes you're asking the user to allow you to access. See
     * {@link https://api.23andme.com/docs/authentication/#scopes scopes} for a list of them.
     *
     * @var array
     */
    private $scopes = ['basic', 'names', 'email', 'genomes'];

    public function withRedirectURI($uri)
    {
        $this->redirectURI = $uri;
        return $this;
    }
    public function withClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }
    public function withScope($scope)
    {
        $this->scopes[] = $scope;
        $this->scopes = array_unique($this->scopes);
        return $this;
    }

    /**
     * Generates a URL to redirect the user to to gain access to their 23AndMe data
     * @return string
     */
    private function createAuthorizationURI()
    {
        $query = http_build_query([
            'redirect_uri'  => $this->redirectURI,
            'response_type' => $this->responseType,
            'client_id'     => $this->clientId,
            'scope'         => implode(' ', $this->scopes)
        ]);
        //var_dump($query);
        return header("Location: https://api.23andme.com/authorize/?".$query);
    }

    public function __toString()
    {
        return $this->createAuthorizationURI();
    }
}

$auth = new AuthorizationRequest();
$auth->withClientId('6e9970ad91ef59abe785ffb9ff001b18');
$auth->withRedirectURI('http://localhost:5000/receive_code/');
//$auth->withScope('basic names email genomes');

$auth->__toString();


?>