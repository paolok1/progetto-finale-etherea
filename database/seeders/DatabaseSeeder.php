<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public $categories = [
        'Lingerie',
        'Abbigliamento sexy',
        'Toys',
        'Libri e riviste',
        'Attrezzatura',
        'Sadomaso',
        'Candele profumate ed oli da massaggio'
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        foreach ($this->categories as $category ){
            Category::create([
                'name'=>$category
            ]);
        }
    }
}
