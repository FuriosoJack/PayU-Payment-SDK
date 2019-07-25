<?php
namespace FuriosoJack\PayUPaymentSDK\Parameters;
use FurosoJack\PayUPaymentSDK\PayU\util\PayUParameters;

/**
 * Class PayUParametersConsultToken
 * @package FuriosoJack\PayUPaymentSDK\Parameters
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class PayUParametersConsultToken extends PayUParametersAbstract
{

    protected function initParametersRequired()
    {
        $this->parametersRequired = [
            //Ingresa aquí el identificador del pagador.
            PayUParameters::PAYER_ID,
            //Ingresa aquí el identificador del token.
            PayUParameters::TOKEN_ID,
            //Ingresa aquí la fecha inicial desde donde filtrar con la fecha final hasta donde filtrar.
            //PayUParameters::START_DATE=> "2010-01-01T12:00:00",
            //PayUParameters::END_DATE=> "2015-01-01T12:00:00"
        ];

        $this->parametersMissing = $this->parametersRequired;
    }
}