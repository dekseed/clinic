<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_patients', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('HN')->comment('รหัส HN');
            $table->unsignedBigInteger('title_name_id')->nullable()->comment('รหัสคำนำหน้า');
            $table->string('first_name')->nullable()->comment('ชื่อหน้า');
            $table->string('last_name')->nullable()->comment('นามสกุล');
            $table->bigInteger('cid')->nullable()->comment('เลขบัตรปปช.');
            $table->string('phonenumber')->nullable()->comment('เบอร์โทร');
            $table->string('id_line')->nullable()->comment('id LINE');
            $table->string('facebook')->nullable()->comment('facebook');
            $table->integer('height')->nullable()->comment('ส่วนสูง');
            $table->text('study')->nullable()->comment('ระดับการศึกษา');
            $table->string('ethnicity')->nullable()->comment('เชื้อชาติ');
            $table->string('nationality')->nullable()->comment('สัญชาติ');
            $table->string('religion')->nullable()->comment('ศาสนา');
            $table->string('sex')->nullable()->comment('เพศ');
            $table->string('occupation')->nullable()->comment('อาชีพ');
            $table->date('birthday')->nullable()->comment('วันเกิด');
            $table->string('first_name_father')->nullable()->comment('ชื่อบิดา');
            $table->string('last_name_father')->nullable()->comment('นามสกุลบิดา');
            $table->string('first_name_mother')->nullable()->comment('ชื่อมารดา');
            $table->string('last_name_mother')->nullable()->comment('นามสกุลมารดา');
            $table->string('first_name_relation')->nullable()->comment('ชื่อบุคคลที่ติดต่อได้ในกรณีฉุกเฉิน');
            $table->string('last_name_relation')->nullable()->comment('นามสกุลบุคคลที่ติดต่อได้ในกรณีฉุกเฉิน');
            $table->string('relation_tel')->nullable()->comment('เบอร์โทรบุคคลที่ติดต่อ');
            $table->string('relationship')->nullable()->comment('ความสัมพันธ์');
            $table->integer('home_id')->nullable()->comment('เลขที่บ้าน');
            $table->integer('moo')->nullable()->comment('หมู่ที่');
            $table->string('district')->nullable()->comment('ตำบล');
            $table->string('amphoe')->nullable()->comment('อำเภอ');
            $table->string('province')->nullable()->comment('จังหวัด');
            $table->integer('zip_code')->nullable()->comment('รหัสไปรษณีย์');
            $table->boolean('status_conform')->default('0');
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
        Schema::dropIfExists('register_patients');
    }
};
