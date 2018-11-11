<?php
/**
 * Created by PhpStorm.
 * Developed By Majorman
 * User: mt
 * Date: 11.11.2018
 * Time: 21:35
 */

/*Yazılım varlıkları (sınıflar,modüller,fonksiyonlar vb)
ilaveye açık , değişikliklere kapalı olmalıdır.

Bu prensip temel olarak kullanıcıların mevcut kodu değiştirmeden
yeni fonksiyonlar eklemelerine  izin vermemiz gerektiğini belirtiyor.
*/

namespace GoodCode
{
    interface ILogger
    {
        public function logTut();
    }

    class DatabaseLog implements ILogger
    {
        public function logTut()
        {
           return "Veritabanına log tutuldu";
        }
    }

    class XmlLog implements ILogger
    {
        public function logTut()
        {
            return "Xml'ye log tutuldu.";
        }
    }

    class Logger
    {
        private $logger;

        public function __construct(ILogger $logger)
        {
            $this->logger = $logger;
        }

        public function Log()
        {
            return $this->logger->logTut();
        }

    }


    class EventLog implements ILogger
    {
        public function logTut()
        {
            return "EventLog'lara kaydedildi";
        }
    }

    $eventLog = new Logger(new EventLog());
    $dbLog = new Logger(new DatabaseLog());
    $xmlLog = new Logger(new XmlLog());
    echo $eventLog->Log() . PHP_EOL;
    echo $dbLog ->Log(). PHP_EOL;
    echo $xmlLog->Log(). PHP_EOL;
}
