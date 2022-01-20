<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained('assignments');
            $table->foreignId('user_id')->constrained('users');
            $table->string('link');
            $table->timestamps();
        });
        Schema::table('solutions',function(Blueprint $table){
            $table->unique(['user_id','assignment_id'],'user_assignment_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solutions',function(Blueprint $table){
            $table->dropIfExists('user_assignment_unique');
        });
        Schema::dropIfExists('solutions');
    }
}
