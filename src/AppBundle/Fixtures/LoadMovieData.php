<?php


namespace AppBundle\Fixtures;

use AppBundle\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadMovieData extends Fixture{


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        $movie= new Movie();
        $movie->setTitle('gladiator');
        $movie->setDescription('coocoococo');
        $movie->setYear(2000);
        $movie->setTime(189);

        $manager->persist($movie);
        $manager->flush();
    }
}