<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

/**
 * @extends Factory
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $unit = Unit::first();
        return [
            'id' => Uuid::uuid4(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'unit_id' => $unit->id,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public static function getSellerUsers(array $unitsIds): array
    {

        return [
            [
                'name' => 'Afonso Afancar',
                'email' => 'afonso.afancar@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Belo Horizonte']
            ],
            [
                'name' => 'Alceu Andreoli',
                'email' => 'alceu.andreoli@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Belo Horizonte']
            ],
            [
                'name' => 'Amalia Zago',
                'email' => 'amalia.zago@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Belo Horizonte']
            ],
            [
                'name' => 'Carlos Eduardo',
                'email' => 'carlos.eduardo@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Belo Horizonte']
            ],
            [
                'name' => 'Luiz Felipe',
                'email' => 'luiz.felipe@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Belo Horizonte']
            ],
            [
                'name' => 'Breno',
                'email' => 'breno@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Campo Grande']
            ],
            [
                'name' => 'Emanuel',
                'email' => 'emanuel@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Campo Grande']
            ],
            [
                'name' => 'Ryan',
                'email' => 'ryan@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Campo Grande']
            ],
            [
                'name' => 'Vitor Hugo',
                'email' => 'vitor.hugo@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Campo Grande']
            ],
            [
                'name' => 'Yuri',
                'email' => 'yuri@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Campo Grande']
            ],
            [
                'name' => 'Benjamin',
                'email' => 'benjamin@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Cuiabá']
            ],
            [
                'name' => 'Erick',
                'email' => 'erick@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Cuiabá']
            ],
            [
                'name' => 'Enzo Gabriel',
                'email' => 'enzo.gabriel@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Cuiabá']
            ],
            [
                'name' => 'Fernando',
                'email' => 'fernando@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Cuiabá']
            ],
            [
                'name' => 'Joaquim',
                'email' => 'joaquim@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Cuiabá']
            ],
            [
                'name' => 'André',
                'email' => 'andré@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Curitiba']
            ],
            [
                'name' => 'Raul',
                'email' => 'raul@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Curitiba']
            ],
            [
                'name' => 'Marcelo',
                'email' => 'marcelo@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Curitiba']
            ],
            [
                'name' => 'Julio César',
                'email' => 'julio.césar@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Curitiba']
            ],
            [
                'name' => 'Benício',
                'email' => 'benício@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Florianópolis']
            ],
            [
                'name' => 'Vitor Gabriel',
                'email' => 'vitor.gabriel@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Florianópolis']
            ],
            [
                'name' => 'Augusto',
                'email' => 'augusto@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Florianópolis']
            ],
            [
                'name' => 'Pedro Lucas',
                'email' => 'pedro.lucas@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Florianópolis']
            ],
            [
                'name' => 'Luiz Gustavo',
                'email' => 'luiz.gustavo@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Florianópolis']
            ],
            [
                'name' => 'Giovanni',
                'email' => 'giovanni@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Goiania']
            ],
            [
                'name' => 'Renato',
                'email' => 'renato@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Goiania']
            ],
            [
                'name' => 'Diego',
                'email' => 'diego@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Goiania']
            ],
            [
                'name' => 'João Paulo',
                'email' => 'joão.paulo@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Goiania']
            ],
            [
                'name' => 'Renan',
                'email' => 'renan@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Goiania']
            ],
            [
                'name' => 'Luiz Fernando',
                'email' => 'luiz.fernando@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Porto Alegre']
            ],
            [
                'name' => 'Anthony',
                'email' => 'anthony@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Porto Alegre']
            ],
            [
                'name' => 'Lucas Gabriel',
                'email' => 'lucas.gabriel@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Porto Alegre']
            ],
            [
                'name' => 'Thales',
                'email' => 'thales@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Porto Alegre']
            ],
            [
                'name' => 'Luiz Miguel',
                'email' => 'luiz.miguel@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Porto Alegre']
            ],
            [
                'name' => 'Henry',
                'email' => 'henry@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Rio de Janeiro']
            ],
            [
                'name' => 'Marcos Vinicius',
                'email' => 'marcos.vinicius@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Rio de Janeiro']
            ],
            [
                'name' => 'Kevin',
                'email' => 'kevin@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Rio de Janeiro']
            ],
            [
                'name' => 'Levi',
                'email' => 'levi@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Rio de Janeiro']
            ],
            [
                'name' => 'Enrico',
                'email' => 'enrico@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Rio de Janeiro']
            ],
            [
                'name' => 'João Lucas',
                'email' => 'joão.lucas@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Sao Paulo']
            ],
            [
                'name' => 'Hugo',
                'email' => 'hugo@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Sao Paulo']
            ],
            [
                'name' => 'Luiz Guilherme',
                'email' => 'luiz.guilherme@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Sao Paulo']
            ],
            [
                'name' => 'Matheus Henrique',
                'email' => 'matheus.henrique@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Sao Paulo']
            ],
            [
                'name' => 'Miguel',
                'email' => 'miguel@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Sao Paulo']
            ],
            [
                'name' => 'Davi',
                'email' => 'davi@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Vitória']
            ],
            [
                'name' => 'Gabriel',
                'email' => 'gabriel@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Vitória']
            ],
            [
                'name' => 'Arthur',
                'email' => 'arthur@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Vitória']
            ],
            [
                'name' => 'Lucas',
                'email' => 'lucas@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Vitória']
            ],
            [
                'name' => 'Matheus',
                'email' => 'matheus@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Vitória']
            ]
        ];
    }

    public static function getManagerUsers(array $unitsIds)
    {
        return [
            [
                'name' => 'Ronaldinho Gaucho',
                'email' => 'ronaldinho.gaucho@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Porto Alegre']
            ],


    [
                'name' => 'Roberto Firmino',
                'email' => 'roberto.firmino@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Florianópolis']
            ],
            [
                'name' => 'Alex de Souza',
                'email' => 'alex.de.souza@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Curitiba']
            ],
            [
                'name' => 'Françoaldo Souza',
                'email' => 'françoaldo.souza@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Sao Paulo']
            ],
            [
                'name' => 'Romário Faria',
                'email' => 'romário.faria@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Rio de Janeiro']
            ],
            [
                'name' => 'Ricardo Goulart',
                'email' => 'ricardo.goulart@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Belo Horizonte']
            ],
            [
                'name' => 'Dejan Petkovic',
                'email' => 'dejan.petkovic@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Vitória']
            ],
            [
                'name' => 'Deyverson Acosta',
                'email' => 'deyverson.acosta@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Campo Grande']
            ],
            [
                'name' => 'Harlei Silva',
                'email' => 'harlei.silva@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Goiania']
            ],
            [
                'name' => 'Walter Henrique',
                'email' => 'walter.henrique@magazineaziul.com.br',
                'password' => Hash::make('123mudar'),
                'unit_id' => $unitsIds['Cuiabá']
            ]

        ];
    }
    public static function getDirectorUsers()
    {
        return [
            [
                'name' => 'Vagner Mancini',
                'email' => 'vagner.mancini@magazineaziul.com.br',
                'password' => Hash::make('123mudar')
            ],
            [
                'name' => 'Abel Ferreira',
                'email' => 'abel.ferreira@magazineaziul.com.br',
                'password' => Hash::make('123mudar')
            ],
            [
                'name' => 'Rogerio Ceni',
                'email' => 'rogerio.ceni@magazineaziul.com.br',
                'password' => Hash::make('123mudar')
            ],
        ];
    }

    public static function getGeneralDirectorUsers()
    {
        return   [
            [
            'name' => 'Edson A. do Nascimento',
            'email' => 'pele@magazineaziul.com.br',
            'password' => Hash::make('123mudar')
            ]
        ];
    }

}
