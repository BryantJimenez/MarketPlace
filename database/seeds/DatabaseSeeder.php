<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(BrandsproductsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubcategoriesTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        // $this->call(BrandsproductTableSeeder::class);
        $this->call(ImageProductTableSeeder::class);
        $this->call(ProductStoreTableSeeder::class);
    }
}
