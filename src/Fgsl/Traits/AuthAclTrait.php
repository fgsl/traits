<?php
/**
 * Fgsl Traits
 * @author Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br>
 * @copyright FGSL 2020
 * @license   AGPL 3.0
 **/
namespace Fgsl\Traits;

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Log\LoggerInterface;
use Laminas\Permissions\Rbac\Rbac;

trait AuthAclTrait {
    /** @var array */
    private $ldap;
    
    /** @var AdapterInterface */
    private $dbAdapter;
    
    /** @var LoggerInterface */
    private $logger;
    
    /** @var Rbac **/
    private $acl;
    
    /** @var array **/
    private $iam;
    
    public function __construct(array $ldap, AdapterInterface $dbAdapter, Rbac $acl, array $iam = null) {
        $this->ldap         = $ldap;
        $this->dbAdapter    = $dbAdapter;
        $this->acl          = $acl;
        $this->iam          = $iam;
    }
}