<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    // User::factory()->create([
    //   'name' => 'Test User',
    //   'email' => 'test@example.com',
    // ]);

    $handle = fopen(base_path('database/sample_products.csv'), 'r');
    fgetcsv($handle);
    $chunksize = 10;
    while (!feof($handle)) {
      $chunkdata = [];
      for ($i = 0; $i < $chunksize; $i++) {
        $data = fgetcsv($handle);
        if ($data === false) {
          break;
        }
        $chunkdata[] = $data;
      }

      foreach ($chunkdata as $column) {
        Products::create([
          'product' => $column[3],
          'product_image' => explode(',', $column[28])[0],
          'price' => rand(10, 100) * 10
        ]);
      }
    }
    fclose($handle);
  }
}
