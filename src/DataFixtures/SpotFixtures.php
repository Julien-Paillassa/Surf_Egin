<?php

namespace App\DataFixtures;

use App\Entity\Spot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SpotFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $spot = new Spot();
        $spot->setName('Plage Nord');
        $spot->setCity('Le porge');
        $spot->setCoordinate('X: 44.866669  Y: -1.091');
        $spot->setSpotType($this->getReference('spotType_0'));
        $manager->persist($spot);
        $this->addReference('spot_0', $spot);

        $spot = new Spot();
        $spot->setName('Plage centrale');
        $spot->setCity('Lacanau');
        $spot->setCoordinate('X: 44.981998  Y: -1.0804');
        $spot->setSpotType($this->getReference('spotType_1'));
        $manager->persist($spot);
        $this->addReference('spot_1', $spot);

        $spot = new Spot();
        $spot->setName('Les culs nus');
        $spot->setCity('Hossegor');
        $spot->setCoordinate('X: 43.666672  Y: -1.45');
        $spot->setSpotType($this->getReference('spotType_0'));
        $manager->persist($spot);
        $this->addReference('spot_2', $spot);

        $spot = new Spot();
        $spot->setName('Le VVF');
        $spot->setCity('Anglet');
        $spot->setCoordinate('X: 43.48333  Y: -1.53333');
        $spot->setSpotType($this->getReference('spotType_2'));
        $manager->persist($spot);
        $this->addReference('spot_3', $spot);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SpotTypeFixtures::class,
        ];
    }
}
