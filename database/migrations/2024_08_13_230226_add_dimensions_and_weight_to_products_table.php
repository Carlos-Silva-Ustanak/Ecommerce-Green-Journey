<?php

// database/migrations/2024_08_13_XXXXXX_add_dimensions_and_weight_to_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDimensionsAndWeightToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('weight', 10, 2)->nullable()->after('price'); // Peso em gramas
            $table->decimal('length', 10, 2)->nullable()->after('weight'); // Comprimento em cm
            $table->decimal('width', 10, 2)->nullable()->after('length');  // Largura em cm
            $table->decimal('height', 10, 2)->nullable()->after('width');   // Altura em cm
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['weight', 'length', 'width', 'height']);
        });
    }
}
