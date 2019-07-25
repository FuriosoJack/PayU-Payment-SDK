<?php
namespace FuriosoJack\PayUPaymentSDK\Parameters;
use FurosoJack\PayUPaymentSDK\PayU\util\PayUParameters;

/**
 * Class PayUParametersSetPaymen
 * @package FuriosoJack\PayUPaymentSDK\Parameters
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class PayUParametersSetPayment extends PayUParametersAbstract
{

    /**
     * Inicaliza los parametros requeridos
     * @return mixed
     */
    protected function initParametersRequired()
    {
        $this->parametersRequired = [

            //Ingrese aquí el número de cuotas.
            PayUParameters::INSTALLMENTS_NUMBER,

            //Ingrese aquí el nombre del pais.
            //PayUParameters::COUNTRY,
            //Session id del device.
            //PayUParameters::DEVICE_SESSION_ID,
            //IP del pagadador
            //PayUParameters::IP_ADDRESS,
            //Cookie de la sesión actual.
            //PayUParameters::PAYER_COOKIE,
            //Cookie de la sesión actual.
            //PayUParameters::USER_AGENT,

            // -- Comprador
            //Ingrese aquí el nombre del comprador.
            PayUParameters::BUYER_NAME,
            //Ingrese aquí el email del comprador.
            PayUParameters::BUYER_EMAIL,
            //Ingrese aquí el teléfono de contacto del comprador.
            PayUParameters::BUYER_CONTACT_PHONE,
            //Ingrese aquí el documento de contacto del comprador.
            //PayUParameters::BUYER_DNI,
            //Ingrese aquí la dirección del comprador.
            PayUParameters::BUYER_PHONE,

            //Ingrese aquí el nombre del pagador.
            PayUParameters::PAYER_NAME,
            //Ingrese aquí el email del pagador.
            PayUParameters::PAYER_EMAIL,
            //Ingrese aquí el teléfono de contacto del pagador.
            PayUParameters::PAYER_CONTACT_PHONE,
            //Ingrese aquí el documento de contacto del pagador.
            //PayUParameters::PAYER_DNI,
            PayUParameters::PAYER_PHONE,
            //DATOS DEL TOKEN CARD
            PayUParameters::TOKEN_ID,

            //Ingrese aquí el nombre de la tarjeta de crédito
            //VISA||MASTERCARD||AMEX||DINERS
            PayUParameters::PAYMENT_METHOD,

            //Ingrese aquí el identificador de la cuenta.
            PayUParameters::ACCOUNT_ID,
            //Ingrese aquí el código de referencia.
            PayUParameters::REFERENCE_CODE,
            //Ingrese aquí la descripción.
            PayUParameters::DESCRIPTION,

            // -- Valores --
            //Ingrese aquí el valor.
            PayUParameters::VALUE,
            //Ingrese aquí la moneda.
            PayUParameters::CURRENCY

        ];

        $this->parametersMissing = $this->parametersRequired;
    }
}