<?php

namespace App\DataFixtures;
use App\Entity\Tag;
use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VideoFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for($i = 1; $i<=10; $i++){
            $tag = new Tag();
            $tag->setNom($faker->word);


            $manager->persist($tag);

            for($j = 1; $j<=2; $j++){
                $video = new Video();
                $video->setTitre("Titre de la vidéo $i");
                $video->setLien("https://www.youtube.com/watch?v=RY6j8RzpI5U");
                $video->addRelation($tag);

                $manager->persist($video);

            }

        }
        $manager->flush();
    }
}
