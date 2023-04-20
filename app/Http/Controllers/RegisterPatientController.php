<?php

namespace App\Http\Controllers;

use App\Models\Register_patient;
use Illuminate\Http\Request;

class RegisterPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);

        $data = new Register_patient();
        $data->
        $data->HN =
        $data->unsignedBigInteger('title_name_id')->nullable()->comment('รหัสคำนำหน้า');
        $data->string('first_name')->nullable()->comment('ชื่อหน้า');
        $data->string('last_name')->nullable()->comment('นามสกุล');
        $data->bigInteger('cid')->nullable()->comment('เลขบัตรปปช.');
        $data->string('phonenumber')->nullable()->comment('เบอร์โทร');
        $data->string('id_line')->nullable()->comment('id LINE');
        $data->string('facebook')->nullable()->comment('facebook');
        $data->integer('height')->nullable()->comment('ส่วนสูง');
        $data->text('study')->nullable()->comment('ระดับการศึกษา');
        $data->string('ethnicity')->nullable()->comment('เชื้อชาติ');
        $data->string('nationality')->nullable()->comment('สัญชาติ');
        $data->string('religion')->nullable()->comment('ศาสนา');
        $data->string('sex')->nullable()->comment('เพศ');
        $data->string('occupation')->nullable()->comment('อาชีพ');
        $data->date('birthday')->nullable()->comment('วันเกิด');
        $data->string('first_name_father')->nullable()->comment('ชื่อบิดา');
        $data->string('last_name_father')->nullable()->comment('นามสกุลบิดา');
        $data->string('first_name_mother')->nullable()->comment('ชื่อมารดา');
        $data->string('last_name_mother')->nullable()->comment('นามสกุลมารดา');
        $data->string('first_name_relation')->nullable()->comment('ชื่อบุคคลที่ติดต่อได้ในกรณีฉุกเฉิน');
        $data->string('last_name_relation')->nullable()->comment('นามสกุลบุคคลที่ติดต่อได้ในกรณีฉุกเฉิน');
        $data->string('relation_tel')->nullable()->comment('เบอร์โทรบุคคลที่ติดต่อ');
        $data->string('relationship')->nullable()->comment('ความสัมพันธ์');
        $data->integer('home_id')->nullable()->comment('เลขที่บ้าน');
        $data->integer('moo')->nullable()->comment('หมู่ที่');
        $data->string('district')->nullable()->comment('ตำบล');
        $data->string('amphoe')->nullable()->comment('อำเภอ');
        $data->string('province')->nullable()->comment('จังหวัด');
        $data->integer('zip_code')->nullable()->comment('รหัสไปรษณีย์');
        $data->boolean('status_conform')->default('0');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register_patient  $register_patient
     * @return \Illuminate\Http\Response
     */
    public function show(Register_patient $register_patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Register_patient  $register_patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Register_patient $register_patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Register_patient  $register_patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register_patient $register_patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register_patient  $register_patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register_patient $register_patient)
    {
        //
    }
}
