<?php

namespace RJ\UtilitiesBundle\Components;


use Symfony\Component\HttpFoundation\JsonResponse;

class SuccessJsonResponse extends JsonResponse
{
    public function __construct($data = null, $status = 200, $headers = array())
    {
        parent::__construct('', $status, $headers);

        if (null === $data) {
            $data = new \ArrayObject();
        }

        $responseData = array(
           'status' => true,
            'data' => $data
        );

        $this->setData($responseData);
    }
} 