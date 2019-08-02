<?php


namespace FuriosoJack\PayUPaymentSDK\Requests;
use FuriosoJack\PayUPaymentSDK\PayU\api\PayUResponseCode;
use FuriosoJack\PayUPaymentSDK\PayU\PayUTokens;

/**
 * Class PayUDeleteTokenCreditCard
 * @package FuriosoJack\PayUPaymentSDK\Requests
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class PayURequestDeleteTokenCreditCard extends PayUBasicRequestAbstract
{

    /**
     * Se define metodo para el envio del request
     */
    public function sendRequest()
    {
        try {
            $this->response = PayUTokens::remove(
                $this->parameters->getParameters()
            );
            $this->checkResponse();
        } catch (\Exception $e) {
            $this->errors = $e->getMessage();
        }
    }

    /**
     * Se encrara que la respuesta sea satisfactoria
     */
    protected function checkResponse()
    {
        if($this->response->code != PayUResponseCode::SUCCESS){
            $this->errors = "Response ".$this->response->code;
        }
    }
}