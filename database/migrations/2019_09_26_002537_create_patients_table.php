<?php

use App\patient;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->text('description', 5000)->nullable();
            $table->text('fullname', 5000)->nullable();
            $table->text('note', 5000)->nullable();
            $table->timestamps();
        });
            patient::create(['username' => 'PacientesSinCredenciales', 'password' => '123456789', 'fullname' => 'Pacientes Sin Credenciales', 'note' => 'Paciente creado para guardar los documentos online']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
