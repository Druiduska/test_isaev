<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    protected const string TABLE = 'products';
    protected const string COMMENT = 'Товары';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->comment(self::COMMENT);
            $table->id();
            $table->string('name')->index()->comment('Наименование товара');
            $table->decimal('price', 12, 2)->nullable()->index()->comment('Цена');
            $table->foreignId('categories_id')->index()->constrained('categories')->onDelete('cascade');
            $table->boolean('in_stock')->default(false)->index()->comment('В наличии');
            $table->float('rating')->nullable()->index()->comment('Рейтинг');
            $table->timestamps();
            if (DB::getDriverName() === 'mysql') {
                $table->fullText('name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
};
