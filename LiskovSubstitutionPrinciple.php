<?php

/*
 * Bu çok basit bir kavram korkutucu bir terimdir.
 * "Eğer S, T'nin bir alt türüyse , ozaman T tipi nesneler bu programın istenilen herhangi
 * bir özelliklerinden herhangi birini değiştirmeden S tipi (Örneğin , S türündeki nesneler,
 * T türündeki nesnelerin yerine geçebilir) nesneler değişebilir.(uygunluk yapıları,görevleri,
 * vb) Bu daha korkunç bir açıklamadır.
 *
 * */

/* Bunun için en iyi açıklama,bir ebeveyn ve bir çocuk sınıfınız varsa yanlış sonuçlar almadan
,çocuk sınıfını ve temel sınıfı dönüşümlü olarak değiştirebilir.Bu hala kafa karıştırıcı olabilir.
 *Bu yüzden klasik kare - Dikdörtgen olayına bakalım. Matematiksel olarak kare bir dikdörtgendir
 * ama kalıtım aracılığıyla ama bunu ilişkiyi modelliyorsanız,kısa sürede başınız ağrıyabilir
 *
 * */

namespace BadCode {

    class Rectangle
    {
        protected $width = 0;
        protected $height = 0;

        public function setWidth(int $width): void
        {
            $this->width = $width;
        }

        public function setHeight(int $height): void
        {
            $this->height = $height;
        }

        public function getArea(): int
        {
            return $this->width * $this->height;
        }
    }

    class Square extends Rectangle
    {
        public function setWidth(int $width): void
        {
            $this->width = $this->height = $width;
        }

        public function setHeight(int $height): void
        {
            $this->width = $this->height = $height;
        }
    }

    function printArea(Rectangle $rectangle): void
    {
        $rectangle->setWidth(4);
        $rectangle->setHeight(5);

        echo sprintf('%s has area %d.', get_class($rectangle), $rectangle->getArea()) . PHP_EOL;
    }

    $rectangles = [new Rectangle(), new Square()];

    foreach ($rectangles as $rectangle) {
        printArea($rectangle);
    }


}
/*
 * En iyi yöntem dörtgenlerini ayırmak ve iki şekil için de daha genel
 * bir alt türü ayrıştırmaktır.

Kare ve dikdörtgen görüntüde benzer olsa da aslında farklılardır. Bir kare, eşkenar dikdörtgene daha benzerdir, bir dikdörtgen de paralelkenara daha benzerdir ama alt tür değillerdir. Bir kare, bir dikdörtgen bir eşkenar
dikdörtgen ve bir paralelkenar kendi özellikleri olan farklı şekillerdir. Fakat benzerlerdir.
 * */

namespace GoodCode {
    interface Shape
    {
        public function getArea(): int;
    }

    class Rectangle implements Shape
    {
        private $width = 0;
        private $height = 0;

        public function __construct(int $width, int $height)
        {
            $this->width = $width;
            $this->height = $height;
        }

        public function getArea(): int
        {
            return $this->width * $this->height;
        }
    }

    class Square implements Shape
    {
        private $length = 0;

        public function __construct(int $length)
        {
            $this->length = $length;
        }

        public function getArea(): int
        {
            return $this->length ** 2;
        }
    }

    function printArea(Shape $shape): void
    {
        echo sprintf('%s has area %d.', get_class($shape), $shape->getArea()).PHP_EOL;
    }

    $shapes = [new Rectangle(4, 5), new Square(5)];

    foreach ($shapes as $shape) {
        printArea($shape);
    }
}