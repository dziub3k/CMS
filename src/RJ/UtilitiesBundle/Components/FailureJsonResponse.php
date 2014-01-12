<?php

namespace RJ\UtilitiesBundle\Components;


use Symfony\Component\HttpFoundation\JsonResponse;

class FailureJsonResponse extends JsonResponse
{
    public function __construct($data = null, $status = 200, $headers = array())
    {
        parent::__construct('', $status, $headers);

        if (null === $data) {
            $data = new \ArrayObject();
        }

        $responseData = array(
            'status' => false,
            'data' => $data
        );

        $this->setData($responseData);
    }
} 