<?php

use App\Models\Family;
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
        Schema::create('family', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('role');
            $table->string('child_of');
            $table->timestamps();
        });

        $datas = array(
            [
                'name' => 'Budi',
                'gender' => 'Laki laki',
                'role' => '',
                'child_of' => '',
            ],
            [
                'name' => 'Dedi',
                'gender' => 'Laki laki',
                'role' => 'child',
                'child_of' => 'Budi',
            ],
            [
                'name' => 'Dodi',
                'gender' => 'Laki laki',
                'role' => 'child',
                'child_of' => 'Budi',
            ],
            [
                'name' => 'Dede',
                'gender' => 'Laki laki',
                'role' => 'child',
                'child_of' => 'Budi',
            ],
            [
                'name' => 'Dewi',
                'gender' => 'Perempuan',
                'role' => 'child',
                'child_of' => 'Budi',
            ],
            [
                'name' => 'Feri',
                'gender' => 'Laki laki',
                'role' => 'grandchild',
                'child_of' => 'Dedi',
            ],
            [
                'name' => 'Farah',
                'gender' => 'Perempuan',
                'role' => 'grandchild',
                'child_of' => 'Dedi',
            ],
            [
                'name' => 'Gugus',
                'gender' => 'Laki laki',
                'role' => 'grandchild',
                'child_of' => 'Dodi',
            ],
            [
                'name' => 'Gandi',
                'gender' => 'Laki laki',
                'role' => 'grandchild',
                'child_of' => 'Dodi',
            ],
            [
                'name' => 'Hani',
                'gender' => 'Perempuan',
                'role' => 'grandchild',
                'child_of' => 'Dede',
            ],
            [
                'name' => 'Hana',
                'gender' => 'Perempuan',
                'role' => 'grandchild',
                'child_of' => 'Dede',
            ],
        );
        foreach ($datas as $data){
            $category = new Family(); //The Category is the model for your migration
            $category->name =$data['name'];
            $category->gender =$data['gender'];
            $category->role =$data['role'];
            $category->child_of =$data['child_of'];
            $category->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family');
    }
};
