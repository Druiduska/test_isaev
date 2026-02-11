<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected const string TABLE = 'log_settings';
    protected const string COMMENT = 'Настройки логирования';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->comment(self::COMMENT);

            $table->id();
            $table->string('route')->comment('Маршрут');
            // флаг метода описан в App\Enums\HttpMethodEnum
            $table->unsignedSmallInteger('method_flag')->index()->default(0b111110)->comment('Флаг метода');
            $table->text('statuses')->nullable()->comment('json массив http статусов отличных от нормального завершения ([401, 403, 422,  301])');
            $table->string('chanel')->nullable()->comment('Канал логирования');
            $table->text('comment')->nullable()->comment('Комментарий');

            $table->timestamps();
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

