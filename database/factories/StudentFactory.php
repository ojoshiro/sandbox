<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genders = ['f' => 'female', 'm' => 'male'];
        $data['role'] = 'student';
        $data['gender'] = (array_keys($genders))[rand(0, 1)];
        $data['firstname'] = $this->faker->firstname($genders[$data['gender']]);
        $data['lastname'] = $this->faker->lastname;
        $data['email'] = filter_var( strtolower(substr($data['firstname'], 0, 1).
                            '.'.
                            $data['lastname'].
                            '@'.
                            $this->faker->freeEmailDomain), FILTER_SANITIZE_EMAIL);
        $data['active'] = rand(0, 1);
        return $data;
    }
}
