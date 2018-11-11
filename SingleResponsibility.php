<?php
/**
 * Created by PhpStorm.
 * Developed By Majorman
 * User: mt
 * Date: 11.11.2018
 * Time: 21:08
 */


/*SINGLE RESPONSIBILITY PRINSIBLE */
/*TEK SORUMLULUK PRENSIBINI*/
/*TEMİZ KODDA BELİRTİLDİĞİ GİBİ BİR SINIFIN DEĞİŞMESİ İÇİN ASLA
BİRDEN FAZLA SEBEBE DAYANMAMALIDIR*/
/*BİR SINIFI , UÇUŞUNUZDA ALABİLDİĞİNİZ GİBİ TEK FONKSİYONELLİKLE SIKIŞTIRMAK CAZİPTİR*/
/*BİR SINIFI DEĞİŞTİRMEK İÇİN GEREKEN SÜREYİ EN AZA İNDİRMEK ÖNEMLİDİR.*/

/*Bu önemlidir çünkü bir sınıfta çok fazla fonksiyonellik varsa ve bir parçasını değiştirirsen
, kod tabanınızda bulunan diğer bağımlı modülleri nasıl etkileyeceğini kestirmek zordur.*/

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

        public function changeSettings(array $settings)
        {
            if($this->verifyCredentials()){

            }
        }

        private function verifyCredentials():bool
        {
            //...
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

        public function verifyCredentials():bool
        {

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

        public function changeSettings(array $settings):bool
        {
            if($this->auth->verifyCredentials()){
                
            }
        }


    }
}