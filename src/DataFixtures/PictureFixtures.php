<?php

namespace App\DataFixtures;

use App\Entity\Picture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PictureFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $picture = new Picture();
        $picture->setUrl('https://www.nomads-surfing.com/wp-content/uploads/2019/03/nomads_black.png');
        $picture->setBrand($this->setReference('brand_0'));
        $manager->persist($picture);
        $this->addReference('picture_0', $picture);

        $picture = new Picture();
        $picture->setUrl('https://www.torq-surfboards.com/files/layout/Torq_logo_PU_white.png');
        $picture->setBrand($this->setReference('brand_1'));
        $manager->persist($picture);
        $this->addReference('picture_1', $picture);

        $picture = new Picture();
        $picture->setUrl('https://www.logolynx.com/images/logolynx/70/700ab823a73e351d25f087860568d1a9.jpeg');
        $picture->setBrand($this->setReference('brand_2'));
        $manager->persist($picture);
        $this->addReference('picture_2', $picture);

        $picture = new Picture();
        $picture->setUrl('https://cdn.shopify.com/s/files/1/0253/7688/2754/collections/christiaan_bradley_1200x1200.png?v=1606908510');
        $picture->setBrand($this->setReference('brand_3'));
        $manager->persist($picture);
        $this->addReference('picture_3', $picture);

        $picture = new Picture();
        $picture->setUrl('https://static.akewatu.net/image/cache/upscale_2/processed-dbedbec4bf43233d5e0e7e4299042e6924b17179.jpeg');
        $picture->setBoard($this->setReference('board_0'));
        $manager->persist($picture);
        $this->addReference('picture_4', $picture);

        $picture = new Picture();
        $picture->setUrl('https://static.akewatu.net/image/cache/upscale_2/processed-dbedbec4bf43233d5e0e7e4299042e6924b17179.jpeg');
        $picture->setBoard($this->setReference('board_1'));
        $manager->persist($picture);
        $this->addReference('picture_5', $picture);

        $picture = new Picture();
        $picture->setUrl('https://static.akewatu.net/image/cache/upscale_2/processed-b994857fbef5fa1c972c51a54f47845a7337623d.jpg');
        $picture->setBoard($this->setReference('board_2'));
        $manager->persist($picture);
        $this->addReference('picture_6', $picture);

        $picture = new Picture();
        $picture->setUrl('https://static.akewatu.net/image/cache/upscale_2/354729513aac1e7038d5d5a859409291b25d112d.png');
        $picture->setBoard($this->setReference('board_3'));
        $manager->persist($picture);
        $this->addReference('picture_7', $picture);

        $picture = new Picture();
        $picture->setUrl('https://www.medocpleinsud.com/wp-content/uploads/2019/12/dsc_0129.jpg');
        $picture->setSpot($this->setReference('spot_0'));
        $manager->persist($picture);
        $this->addReference('picture_8', $picture);

        $picture = new Picture();
        $picture->setUrl('https://france3-regions.francetvinfo.fr/image/9efixJeGecke9gaiVCpV1nI0cNc/600x400/regions/2020/06/09/5edfa74b85652_plage_11-4783148.jpg');
        $picture->setSpot($this->setReference('spot_1'));
        $manager->persist($picture);
        $this->addReference('picture_9', $picture);

        $picture = new Picture();
        $picture->setUrl('https://www.hossegor.fr/upload/page/slideshow/plages2.jpg');
        $picture->setSpot($this->setReference('spot_2'));
        $manager->persist($picture);
        $this->addReference('picture_10', $picture);

        $picture = new Picture();
        $picture->setUrl('https://www.alday-immobilier.com/wp-content/uploads/2018/03/web-anglet-750x501.jpg');
        $picture->setSpot($this->setReference('spot_3'));
        $manager->persist($picture);
        $this->addReference('picture_11', $picture);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            BoardFixtures::class,
            SpotFixtures::class,
            BrandFixtures::class,
        ];
    }
}
