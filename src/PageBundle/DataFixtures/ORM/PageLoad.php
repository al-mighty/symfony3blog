<?php
/**
 * Created by PhpStorm.
 * User: progi
 * Date: 24.01.2018
 * Time: 1:33
 */

namespace PageBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PageBundle\Entity\Page;
use TermBundle\DataFixtures\ORM\TermLoad;
use TermBundle\Entity\Term;
use TermBundle\TermBundle;

//class PageLoad extends Fixture
class PageLoad implements ORMFixtureInterface

{

    public function load(ObjectManager $manager)
    {
        $termRepo = $manager->getRepository(Term::class );
        for ($i = 1; $i <= 3; $i++) {
            $page = new Page();
            $page->setTitle('PageTitle '.$i);
            $page->setBody("pageBody " . $i);
            $term = $termRepo->findOneByName('Term '.$i);
            if($term)
                $page->setCategory($term);
            $page->setCreated(new \DateTime());
            $manager->persist($page);
        }
        $manager->flush();
    }

    public function getDependencies() {
        return [
            TermLoad::class
        ];
    }
}