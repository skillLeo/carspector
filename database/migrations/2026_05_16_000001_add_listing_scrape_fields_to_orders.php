<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddListingScrapeFieldsToOrders extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('listing_seller_name')->nullable()->after('advertisement_link');
            $table->string('listing_seller_address')->nullable()->after('listing_seller_name');
            $table->text('listing_image')->nullable()->after('listing_seller_address');
            $table->string('listing_price')->nullable()->after('listing_image');
            $table->string('listing_scrape_status')->nullable()->after('listing_price'); // success / partial / failed
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['listing_seller_name','listing_seller_address','listing_image','listing_price','listing_scrape_status']);
        });
    }
}
