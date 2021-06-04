<?php

namespace App\DataFixtures;

use App\Entity\NewsCategory;
use App\Entity\News;
use App\Entity\Expertise;
use App\Entity\ExpertiseList;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)

    {
        $faker = \Faker\Factory::create();

        $newscategories = [$faker->word, $faker->word];
        $arrayNewsCategories = [];
        foreach($newscategories as $newscategory)
        {
            $newscat = new NewsCategory();
            $newscat->setName($newscategory);

            $manager->persist($newscat);

            array_push($arrayNewsCategories, $newscat);
        }

        for ($i=0; $i<4; $i++) {
            $new = new News();
            $new->setTitle($faker->words(3, true))
            ->setSubtitle($faker->words(5, true))
            ->setDescription($faker->paragraph(2,true))
            ->setDate($faker->dateTime())
            ->setNewsCategory($faker->randomElement($arrayNewsCategories));

            $manager->persist($new);
        }
        
        $expertiseLists = [$faker->sentence(), $faker->sentence()];
        $arrayExpertiseLists = [];
        foreach($expertiseLists as $expertiseList)
        {
            $expList = new ExpertiseList();
            $expList->setText($expertiseList);

            $manager->persist($expList);

            array_push($arrayExpertiseLists, $expList);
        }

        for ($i=0; $i<3; $i++) {
            $expertise = new Expertise();
            $expertise->setTitle($faker->words(3, true))
            ->setDescription($faker->paragraph(2,true))
            ->setExpertiseList($faker->randomElement($arrayExpertiseLists));

            $manager->persist($expertise);
        }

        $manager->flush();
    }
}
