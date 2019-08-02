<?php


namespace FuriosoJack\PayUPaymentSDK\Requests;
use FuriosoJack\PayUPaymentSDK\PayU\api\PayUResponseCode;
use FuriosoJack\PayUPaymentSDK\PayU\PayUPayments;

/**
 * Class PayUSetPayment
 * @package FuriosoJack\PayUPaymentSDK\Requests
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class PayURequestSetPayment extends PayUBasicRequestAbstract
{

    /**
     * Se define metodo para el envio del request
     * @throws \InvalidArgumentException
     * @throws \FuriosoJack\PayUPaymentSDK\PayU\PayUException
     */
    public function sendRequest()
    {
        try {
            $this->response = PayUPayments::doAuthorizationAndCapture(
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