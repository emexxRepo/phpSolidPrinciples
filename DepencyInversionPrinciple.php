<?php

/*DEPENCY INVERSION PRINCIPLE*/

/*
 * BAĞIMLILIĞI TERSINE ÇEVİRME PRENSIBI
 * BU TİP İKİ TEMEL ÖĞEYİ BARINDIRIR */

/* 1= YÜKESEK SEVİYELİ MODÜLLER DÜŞÜK SEVİYELİ MODÜLLERE BAĞLI OLMAMALIDIR*/
/* 2 SOYUTLAMALAR DETAYLARA BAĞLI OLMAMALIDIR DETAYLAR SOYUTLAMALARA BAĞLI OLMALIDIR*/


namespace BadCode
{

    class Employee
    {
        public function work(): void
        {
            // çalışıyor
        }
    }

    class Robot extends Employee
    {
        public function work():void
        {
            // çok daha fazla çalışıyor
        }
    }

    class Manager
    {
        private $employee;

        public function __construct(Employee $employee)
        {
            $this->employee = $employee;
        }

        public function manage():void
        {
            $this->employe->work();
        }

    }
}

namespace GoodCode
{
    interface Employee
    {
        public function work():void;
    }

    class Human implements Employee
    {
        public function work(): void
        {
            // çalışıyor
        }
    }

    class Robot implements Employee
    {
        public function work(): void
        {
            // daha fazla çalışıyor
        }
    }

    class Manager
    {
        private $employee;

        public function __construct(Employee $employee)
        {
            $this->employee = $employee;
        }

        public function manage(): void
        {
            $this->employee->work();
        }
    }

}