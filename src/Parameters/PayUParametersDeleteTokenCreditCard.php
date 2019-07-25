<?php


namespace FuriosoJack\PayUPaymentSDK\Parameters;

/**
 * Class PayUParametersDeleteTokenCreditCard
 * @package FuriosoJack\PayUPaymentSDK\Parameters
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class PayUParametersDeleteTokenCreditCard extends PayUParametersAbstract
{

    /**
     * Inicaliza los parametros requeridos
     * @return mixed
     */
    protected function initParametersRequired()
    {
        $this->parametersRequired = [
            //Ingresa aquí el identificador del pagador.
            PayUParameters::PAYER_ID,
            //Ingresa aquí el identificador del token.
            PayUParameters::TOKEN_ID
        ];

        $this->parametersMissing = $this->parametersRequired;
    }
}