<?php
namespace FuriosoJack\PayUPaymentSDK\Parameters;

/**
 * Class PayUParametersAbstract
 * @package FuriosoJack\PayUPaymentSDK\Parameters
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
abstract class PayUParametersAbstract
{
    protected $parameters = array();
    protected $parametersRequired = array();
    protected $parametersMissing = array();
    protected $parametersObtional = array();


    public function __construct()
    {
        $this->initParametersRequired();
    }

    /**
     *  Añade nuevo parametro
     * @param $paramName
     * @param $value
     * @throws \Exception
     */
    public function addParameter($paramName, $value)
    {

        //Verifica que sea necesario agregarlo
        if(!$this->checkParametrerIsRequired($paramName) && !$this->checkParameterIsOptional($paramName) ){
            throw new \Exception("Parametro Incorrecto, no requerido:".$paramName);
        }
        //Se verifica si ya esta agregado
        $this->checkParameterAlreadyAdded($paramName);

        if($this->checkParameterIsOptional($paramName)){
            $this->removeParameterMissingOptional(array_search($paramName, $this->parametersObtional));
        }else{
            //Remueve los parametros faltantes
            $this->removeParameterMissing(array_search($paramName, $this->parametersMissing));
        }


        $this->parameters[$paramName] = $value;
    }

    /**
     * Añade todos los parametros de una vez
     * @param array $parameters
     * @throws \Exception
     */
    public function setAllParameters(array $parameters)
    {
        foreach ($parameters as $key => $parameter){
            $this->addParameter($key, $parameter);
        }
    }


    /**
     * Verifica si el parametros ya fue agregado
     * @param $paramName
     * @throws \Exception
     */
    public function checkParameterAlreadyAdded($paramName)
    {
        if(!$this->checkParameterIsMissing($paramName)){
            throw new \Exception("El parametro ya fue agregado" . ": " . $paramName);
        }
    }

    public function checkParameterIsOptional($paramName)
    {
        return in_array($paramName, $this->parametersObtional);
    }

    /**
     * Inicaliza los parametros requeridos
     * @return mixed
     */
    protected abstract function initParametersRequired();

    /**
     * Retorna lo parametros añadidos arma los parametros
     * @return array
     * @throws \Exception
     */
    public function getParameters()
    {
        //Verifica si ya estan todos lo parametros
        if( $this->existParametersMissing() ){
            throw new \Exception("Hacen falta parametros por ingresar requeridos por la logia de negocio.".' '.json_encode($this->parametersMissing));
        }
        return $this->parameters;
    }

    /**
     * Quita un parametros de los parametros faltantes requeridos
     * @param $paramKEY
     */
    protected function removeParameterMissing($paramKEY)
    {
        unset($this->parametersMissing[$paramKEY]);
    }

    /**
     * Quita el parametro de los parametros obcionales
     * @param $paramKEY
     */
    protected function removeParameterMissingOptional($paramKEY)
    {
        unset($this->parametersObtional[$paramKEY]);
    }
    /**
     * Verifica si el parametro hace falta, returna el indice si hace fala o false si no
     * @return int boolean
     */
    public function checkParameterIsMissing($param)
    {
        return in_array($param, $this->parametersMissing) || in_array($param, $this->parametersObtional);
    }

    /**
     * check si parametros es requerido
     * @return bool
     */
    public function checkParametrerIsRequired($param)
    {
        return in_array( $param, $this->parametersRequired);
    }


    /**
     * Vericica si existen parametros requeridos por llenar
     * @return array lista de parametros que faltan
     */
    public function checkParameterMissing()
    {
        if(!$this->existParametersMissing()){
            return null;
        }
        return $this->parametersMissing;
    }

    /**
     * Verifica si existen parametros faltantes
     * @return bool
     */
    protected function existParametersMissing(){
        return count($this->parametersMissing) > 0;
    }

}