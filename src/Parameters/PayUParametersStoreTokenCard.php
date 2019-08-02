<?php
namespace FuriosoJack\PayUPaymentSDK\Parameters;
use FuriosoJack\PayUPaymentSDK\PayU\util\PayUParameters;

/**
 * Class PayUParametersStoreTokenCard
 * @package FuriosoJack\PayUPaymentSDK\Parameters
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class PayUParametersStoreTokenCard extends PayUParametersAbstract
{

    /**
     * Inicaliza los parametros requeridos
     * @return mixed
     */
    protected function initParametersRequired()
    {
        $this->parametersRequired = [

            PayUParameters::PAYER_NAME,
            //Ingrese aquí el identificador del pagador.
            PayUParameters::PAYER_ID,
            //Ingrese aquí el documento de identificación del comprador.
            PayUParameters::PAYER_DNI,
            //Ingrese aquí el número de la tarjeta de crédito
            PayUParameters::CREDIT_CARD_NUMBER,
            //Ingrese aquí la fecha de vencimiento de la tarjeta de crédito
            PayUParameters::CREDIT_CARD_EXPIRATION_DATE,
            //Ingrese aquí el nombre de la tarjeta de crédito
            PayUParameters::PAYMENT_METHOD,


        ];

        $this->parametersMissing = $this->parametersRequired;
    }
}