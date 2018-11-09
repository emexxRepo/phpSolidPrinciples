<?php
/* INTERFACE SEGREGATION PRINCIPLE */

/* ARAYÜZ AYIRMA PRENSIBI*/

/* ISP, "Müşteriler kullanmadıkları arayüzlere bağlı olmaya zorlanmamalıdır." der.*/


namespace BadCode
{

    interface Employee
    {

        public function work(): void;
        public function eat(): void;
    }

    class HumanEmployee implements Employee
    {
        public function work(): void
        {
            // ....çalışıyor
        }

        public function eat(): void
        {
            // ...... öğle arasında yemek yiyor
        }
    }

    class RobotEmployee implements Employee
    {

        public function work(): void
        {
            /*ÇOK DAHA FAZLA ÇALIŞIYOR*/
        }

        public function eat(): void
        {
            /*ROBOT YEMEK YEMEZ*/
        }
    }

}


namespace GoodCode
{

    interface Workable
    {
        public function work():void;
    }

    interface Feedable
    {
        public function eat():void;
    }

    interface Employee extends Feedable,Workable
    {

    }

    class HumanEmployee implements Employee
    {
        public function work(): void
        {
            //çalışıyor
        }

        public function eat():void
        {
            // öğle arasında yemek yiyor;
        }

    }

    class RobotEmployee implements Workable
    {
        public function work():void
        {
            // çalışıyor
        }
    }

}


