<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'name' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'middlename' => $this->faker->lastName(),
            'lastname' => $this->faker->lastName(),
            'lastschoolyearattended'=>$this->faker->randomElement([

            '2021',
            '2019',
            '2022'
            
            ]),
           'lastschoolattended'=>$this->faker->randomElement([
            'Dalanguiring Integrated School',
            'Urbiztondo Integrated School',
            'Bayambang National Highschool',
            'Abanon National Highschool'

            ]),

           'lastgradelevelcompleted'=>$this->faker->randomElement([

   
           'Grade 11',
           'Grade 12'
            
            ]),
           'gradeleveltoenrolin'=>$this->faker->randomElement([

   
           'Grade 11',
           'Grade 12'
            
            ]),

           'strandtoenrolin'=>$this->faker->randomElement([

           'GAS',
           'ABM',
           'HUMMS',
           'TVL'

           ]),
          'accepted_as'=>$this->faker->randomElement([

           'Promoted',
           'Conditionally Promoted',
           'Failed' 

           ]),
           'studenttype'=>$this->faker->randomElement([

           'Old Student',
           'Balik Aral/Returning Student',
           'Transferee' 

           ]),

           'permanenthousenumber'=> $this->faker->regexify('[0-9]{4}'),

           'permanentbaranggay'=>$this->faker->randomElement([

            'Dalanguiring',
            'Malayo',
            'Real',
            'Poblacion'
                       
            ]),

           'permanentmunicipality'=>$this->faker->randomElement([

            'Urbiztondo',
            'Bayambang',
            'San Carlos'
            
            ]),
           'permanentprovince'=>$this->faker->randomElement([

            'Pangasinan'
            
            ]),

           'currenthousenumber'=> $this->faker->regexify('[0-9]{4}'),

           'currentbaranggay'=>$this->faker->randomElement([

            'Dalanguiring',
            'Malayo',
            'Real',
            'Poblacion'
                       
            ]),

           'currentmunicipality'=>$this->faker->randomElement([

            'Urbiztondo',
            'Bayambang',
            'San Carlos'
            
            ]),
           'currentprovince'=>$this->faker->randomElement([

            'Pangasinan'
            
            ]),
            'phonenumber'=>$this->faker->numberBetween(63556841720,63556841700),
            'fatherphonenumber'=>$this->faker->numberBetween(63556841720,63556841700),
            'motherphonenumber'=>$this->faker->numberBetween(63556841720,63556841700),
            'guardianphonenumber'=>$this->faker->numberBetween(63556841720,63556841700),
         'birthday'=>$this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'age'=>$this->faker->numberBetween(12,25),
           'sex'=>$this->faker->randomElement(['male', 'female']),
           'mothertongue'=>$this->faker->randomElement([

             'Aklanon',
              'Bikol',
              'Cebuano',
              'Chavacano',
              'English',
              'Filipino',
              'Hiligaynon',
              'Ibinag',
              'Ilocano',
              'Ivatan',
              'Kapampangan',
              'Kinaray-a',
              'Maguindanao',
              'Maranao',
              'Pangasinan'

               ]),

           'religion'=>$this->faker->randomElement([

            "Roman Catholic",
            "Muslim/Islamic",
            "Catholic",
            "Born Again",
            "Buddhists",
            "Atheist",
            "Protestants",
            "El Shaddai",
            "Church of the Nazarene",
            "Church of Jesus Christ and the Latter Day Saints",
            "Seventh-Day Adventists (Central Phil. Union Conf.)",
            "Maguindanao",
            "Hindu",
            "Mennonites",
            "Philippine Episcopal Church",
            "United Church of Christ in the Philippines",
            "Evangelical",
            "Baptist World Alliance",
            "Methodist",
            "Judaism",
            "Ang Dating Daan",
            "Worldwide Church of God",
            "Jehovah's Witnesses",
            "Assemblies of God (Ilocos Norte)",
            "God World Missions Church",
            "Presbyterian",
            "Lutheran Church in the Philippines",
            "Mount Banahaw Holy Confederation",
            "Rizalistas",
            "Aglipayan (Philippine Independence Church)",
            "Iglesia ni Cristo (Church of Christ)",
            "Philippine Benevolent Missionary Association (PBMA)",

            ]),

            'indegenouscommunity'=>$this->faker->randomElement([

            "Tagalog",
            "Ilokano",
            "Kapampangan",
            "Bikolano",
            "Aeta",
            "Igorot",
            "Ivatan",
            "Mangyan",
            "Cebuano",
            "Waray",
            "Ilonggo",
            "Ati",
            "Saludnon",
            "Badjao",
            "Yakan",
            "B'laan",
            "Maranao",
            "T'boli",
            "Tausug",
            "Bagobo"

            ]),
            'generalaverage'=> $this->faker->numberBetween(75,85),
            'lrnnumber' => $this->faker->numberBetween(100000000000,200000000000),
            'psastatus'=>$this->faker->randomElement(['Yes','No']),
            'psanumber'=>  $this->faker->numberBetween(10000000000, 20000000000),
            'fatherfirstname'=> $this->faker->firstName(),
            'fathermiddlename'=> $this->faker->lastName(),
            'fatherlastname'=> $this->faker->lastName(),
            'motherfirstname'=> $this->faker->firstName(),
            'mothermiddlename'=> $this->faker->lastName(),
            'motherlastname'=> $this->faker->lastName(),
            'guardianfirstname'=> $this->faker->firstName(),
            'guardianmiddlename'=> $this->faker->lastName(),
            'guardianlastname'=> $this->faker->lastName(),
            'updated'=>$this->faker->randomElement(['Yes', 'No']),
            'semester'=>$this->faker->randomElement(['1st', '2nd']),
            'schoolid'=> $this->faker->regexify('[0-9]{6}'),
             'indigency'=> $this->faker->regexify('[0-9]{6}'),
            'section'=>$this->faker->numberBetween(1,10)
           
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
