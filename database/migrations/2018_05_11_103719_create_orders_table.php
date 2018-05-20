<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->default(0); // id khách hàng
            $table->double('amount'); // tổng giá trị đơn hàng
            $table->integer('bill_id')->unsigned(); // id của hóa đơn, thông tin địa chỉ nhận hàng, bill có thể trùng với thông tin của customer và cũng có thể khác
            $table->string('paygate');  // phương thức thanh toán
            $table->tinyInteger('status')->default(0); // trạng thái, 0: chờ xử lý, 1: đã hoàn thành, 2: hủy, 3: hoàn trả
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
