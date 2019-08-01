<?php
namespace FuriosoJack\PayUPaymentSDK\Requests;
use FuriosoJack\PayUPaymentSDK\Parameters\PayUParametersAbstract;

/**
 * Class PayUBasicRequestAbstract
 * @package FuriosoJack\PayUPaymentSDK\Requests
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
abstract  class PayUBasicRequestAbstract
{

    protected $parameters;
    protected $response;
    protected $errors;
    protected $callBackOnSucess;
    protected $callBackOnError;


    /**
     * Se encarga de setear una clase que herede de PayUParametersAbstract
     * @param PayUParametersAbstract
     */
    public function setParameters(PayUParametersAbstract $parametersClass){
        $this->parameters = $parametersClass;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function clearErrors(){
        $this->errors = null;
    }
    /**
     * Se encarga de validar si existen errores validando la varibable errors
     * @return bool
     */
    public function thereAreErrors()
    {
        return $this->errors != null ? true : false;
    }

    /**
     * Se define metodo para el envio del request
     */
    public abstract function sendRequest();

    /**
     * Se encrara que la respuesta sea satisfactoria
     */
    protected abstract function checkResponse();

    /**
     * @return mixed
     */
    public function getCallBackOnSucess()
    {
        return $this->callBackOnSucess;
    }

    /**
     * @param mixed $callBackOnSucess
     */
    public function setCallBackOnSucess($callBackOnSucess)
    {
        $this->callBackOnSucess = $callBackOnSucess;
    }

    /**
     * @return mixed
     */
    public function getCallBackOnError()
    {
        return $this->callBackOnError;
    }

    /**
     * @param mixed $callBackOnError
     */
    public function setCallBackOnError($callBackOnError)
    {
        $this->callBackOnError = $callBackOnError;
    }



}