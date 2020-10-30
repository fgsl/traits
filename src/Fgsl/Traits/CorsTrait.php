<?php
/**
 * Fgsl Traits
 * @author Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br>
 * @copyright FGSL 2020
 * @license   AGPL 3.0
 **/
namespace Fgsl\Traits;

use Laminas\View\Model\JsonModel;

trait CorsTrait
{
    private function prepareCors(int $code = 200, $json = true)
    {
        $this->response->setStatusCode($code);
        $this->response->getHeaders()->addHeaderLine('Access-Control-Allow-Origin', '*');
        $this->response->getHeaders()->addHeaderLine('Content-Type', ($json ? 'application/json' : 'text/html') . ';charset=utf-8');
    }
    
    private function getCorsJsonModel(array $variables, int $code = 200)
    {
        $this->prepareCors($code);
        return new JsonModel($variables);
    }
}
