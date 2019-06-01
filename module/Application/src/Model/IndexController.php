<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Model;

class SendEmail
{
 
    public static function send($options){

        $message = new Message();
        $message->addTo($options['to']);
        $message->addFrom($options['from']);
        $message->setSubject($options['subject']);
        $message->setBody($options['mensage']);

        
        $transport = new SmtpTransport();
        $options   = new SmtpOptions([
            'name'=>'localhost.localdomain',
            'host'=>'192.168.6.20',
            'port'=>'1025',
            'connection_class'=>'login',
            'connection_config'=>['username'=>'','password'=>'',],
        ]);

        $transport->setOptions($options);
        $transport->send($message);

    }
    
}
