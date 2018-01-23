<?php
/**
 * Created by PhpStorm.
 * User: progi
 * Date: 24.01.2018
 * Time: 1:44
 */

namespace TermBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TermBundle\Entity\Term;

//class TermLoad extends Fixture
class TermLoad implements ORMFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 3; $i++) {
            $term = new Term();
            $term->setName("Term " . $i);
            $term->setDescription('desc ' . $i);
            $manager->persist($term);
        }
        $manager->flush();
    }
}