<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Tạo cột id kiểu unsignedBigInteger
            $table->unsignedBigInteger('user_id'); // ID người bán
            $table->string('name'); // Tên sản phẩm
            $table->text('description'); // Mô tả sản phẩm
            $table->decimal('price', 10, 2); // Giá sản phẩm
            $table->string('condition'); // Tình trạng sản phẩm (new/used)
            $table->unsignedBigInteger('category_id'); // Liên kết danh mục
            $table->string('images')->nullable(); // Hình ảnh sản phẩm
            $table->boolean('is_sold')->default(false); // Trạng thái bán
            $table->timestamps();
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
