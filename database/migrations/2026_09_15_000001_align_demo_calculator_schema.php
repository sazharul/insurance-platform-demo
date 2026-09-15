<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('calculator_vehicle_types', 'value')) {
            Schema::table('calculator_vehicle_types', function (Blueprint $table) {
                $table->decimal('value', 8, 2)->default(2.5)->after('white_image');
            });
        }

        if (! Schema::hasColumn('calculator_risk_covers', 'value')) {
            Schema::table('calculator_risk_covers', function (Blueprint $table) {
                $table->decimal('value', 8, 2)->nullable()->after('less_amount');
            });
        }

        if (! Schema::hasColumn('calculator_countries', 'type')) {
            Schema::table('calculator_countries', function (Blueprint $table) {
                $table->tinyInteger('type')->default(1)->after('bn_name');
            });
        }

        Schema::dropIfExists('calculator_country_visits');

        Schema::create('calculator_country_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insurance_sub_type_id');
            $table->unsignedTinyInteger('country_type_id')->default(1);
            $table->unsignedInteger('day_from')->default(1);
            $table->unsignedInteger('day_to')->default(365);
            $table->decimal('age_from', 8, 2)->default(0);
            $table->decimal('age_to', 8, 2)->default(100);
            $table->decimal('amount', 12, 2)->default(0);
            $table->decimal('amount_limit', 12, 2)->default(0);
            $table->decimal('price_limit', 12, 2)->default(0);
            $table->decimal('next_price_limit', 12, 2)->default(0);
            $table->decimal('next_amount', 12, 2)->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calculator_country_visits');

        Schema::create('calculator_country_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calculator_id');
            $table->unsignedBigInteger('country_id');
            $table->string('country_type');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        if (Schema::hasColumn('calculator_countries', 'type')) {
            Schema::table('calculator_countries', fn (Blueprint $table) => $table->dropColumn('type'));
        }

        if (Schema::hasColumn('calculator_risk_covers', 'value')) {
            Schema::table('calculator_risk_covers', fn (Blueprint $table) => $table->dropColumn('value'));
        }

        if (Schema::hasColumn('calculator_vehicle_types', 'value')) {
            Schema::table('calculator_vehicle_types', fn (Blueprint $table) => $table->dropColumn('value'));
        }
    }
};
