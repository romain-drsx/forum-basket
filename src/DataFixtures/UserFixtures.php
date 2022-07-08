<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private Generator $faker;

    public function __construct(private UserPasswordHasherInterface $passwordEncoder)
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $count = $this->faker->numberBetween(5, 20);
        for ($a = 0; $a < $count; $a++) {
            $this->createUser($manager);
        }
        $this->createUser($manager, [
            'email' => 'romain@gmail.com',
            'firstname' => 'Romain',
            'lastname' => 'Drsx',
            'password' => 'romain',
            'address' => '5 rue de Pierre Paul',
            'city' => 'Bordeaux',
            'post_code' => '33000',
            'num_tel' => '0637757678',
            'username' => 'romain_drsx',
        ]);

        $this->createUser($manager, [
            'email' => 'romain_admin@gmail.com',
            'firstname' => 'Romain',
            'lastname' => 'Admin',
            'password' => 'romain',
            'address' => '6 rue de Paul',
            'city' => 'Limoges',
            'post_code' => '87000',
            'num_tel' => '0637347678',
            'username' => 'romain_admin',
            'roles' => ['ROLE_ADMIN'],
        ]);

        $manager->flush();

    }

    public function createUser(ObjectManager $manager, array $data = [])
    {
        static $index = 0;

        $data = array_replace(
            [
                'email' => $this->faker->email(),
                'firstname' => $this->faker->firstName(),
                'lastname' => $this->faker->lastName(),
                'password' => $this->faker->password(),
                'address' => $this->faker->address(),
                'city' => $this->faker->city(),
                'post_code' => $this->faker->postCode(),
                'num_tel' => $this->faker->phoneNumber(),
                'username' => $this->faker->userName(),
                'roles' => ['ROLE_USER'],
            ],
            $data,
        );
        $user = (new User())
            ->setEmail($data['email'])
            ->setFirstname($data['firstname'])
            ->setLastname($data['lastname'])
            ->setAddress($data['address'])
            ->setCity($data['city'])
            ->setPostCode($data['post_code'])
            ->setNumTel($data['num_tel'])
            ->setUsername($data['username'])
            ->setRoles($data['roles']);

        $user->setPassword($this->passwordEncoder->hashPassword($user, $data['password']));
        $manager->persist($user);
        $this->setReference('user-' . $index++, $user);
    }
}
