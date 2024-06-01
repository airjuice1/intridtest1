<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ProductList;
use App\Models\ModelList;
use App\Models\ParamList;
use App\Models\OptionList;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vendor_code');
            $table->foreignIdFor(ProductList::class);
            $table->foreignIdFor(ModelList::class);
            $table->foreignIdFor(ParamList::class);
            $table->foreignIdFor(OptionList::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
