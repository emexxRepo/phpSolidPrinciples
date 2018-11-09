<?php

/*SINGLE RESPONSIBILITY PRINCIPLE*/

/*
 *Temiz Kodda belirtildiği gibi, "Bir sınıfın değişmesi için asla birden
 *  fazla sebep olmamalıdır". Bir sınıfı, uçuşunuzda sadece bir bavul
 *  alabildiğiniz gibi tek fonksiyonellikle sıkıştırmak daha caziptir.
 *  Bununla ilgili bir sorun, sınıfınızın kavramsal olarak birleşemeyeceği
 * ve değişmesi için birçok sebep vereceğidir. Bir sınıfı değiştirmek için gereken
 *  süreyi en aza indirmek önemlidir. Bu önemlidir çünkü bir sınıfta çok fazla fonksiyonellik varsa
 *  ve bir parçasını değiştirirsen, kod tabanınızda bulunan diğer bağımlı modülleri nasıl etkileyeceğini
 *  kestirmek zordur.*/


namespace BadCode
{

    class User
    {

    }

    class UserSettings
    {
        private $user;

        public function __construct(User $user)
        {
           $this->user = $user;
        }

        public function changeSettings(array $settings): void
        {
            if ($this->verifyCredentials()) {
                // ...
            }
        }

        private function verifyCredentials(): bool
        {
            // ...
        }
    }

}

namespace GoodCode
{
    class User
    {

    }

    class UserAuth
    {
        private $user;

        public function __construct(User $user)
        {
            $this->user = $user;
        }

        public function verifyCredentials(): bool
        {
            //..
        }
    }

    class UserSettings
    {
        private $user;
        private $auth;

        public function __construct(User $user)
        {
            $this->user = $user;
            $this->auth = new UserAuth($user);
        }

        public function changeSettings(array $settings):void
        {
            if($this->auth->verifyCredentials())
            {
                //..
            }
        }

    }

}


