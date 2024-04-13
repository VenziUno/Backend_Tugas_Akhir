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

        Schema::create('roles', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name')->uniqid();
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('config_rfids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip');
            $table->timestamps();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',45);
            $table->string('route_name')->nullable();
            $table->timestamps();
        });

        Schema::create('sub_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',45);
            $table->unsignedBigInteger('menu_id');
            $table->string('route_name');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('menu_id')->references('id')->on('menus');
        });

        Schema::create('authorization_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',10);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role_id');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('photo')->nullable();
            $table->string('religion')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phone_number', 13)->nullable();
            $table->string('address')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('districts')->nullable();
            $table->string('portal_code')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('members', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('nis',11);
            $table->string('rfid');
            $table->string('gender');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('class');
            $table->string('address');
            $table->string('portal_code');
            $table->text('file');
            $table->text('notes');
            $table->boolean('status');
            $table->unsignedBigInteger('users_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('users_id')->references('id')->on('users');
        });

        Schema::create('authorizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_id');
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->unsignedBigInteger('sub_menu_id')->nullable();
            $table->unsignedBigInteger('authorization_type_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('sub_menu_id')->references('id')->on('sub_menus');
            $table->foreign('authorization_type_id')->references('id')->on('authorization_types');
        });

        Schema::create('media_types', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name',255);
            $table->char('code',5);
            $table->char('mrac',5)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('gmds', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->char('code',5);
            $table->string('name',255);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('content_types', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name',255);
            $table->char('code',5);
            $table->char('mrac',5)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('carrier_types', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name',255);
            $table->char('code',5);
            $table->char('mrac',5)->nullable();
            $table->timestamps();
        });

        Schema::create('authors', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name',255);
            $table->string('birth_year')->nullable();
            $table->string('type',255);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('publishers', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name',255);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name',255);
            $table->text('address')->nullable();
            $table->string('phone_number', 13)->nullable();
            $table->text('portal_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name',255);
            $table->char('classification_code')->nullable();
            $table->char('subjects_type');
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name',255);
            $table->char('code',4);
            $table->timestamps();
        });

        Schema::create('places', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name',255);
            $table->timestamps();
        });

        Schema::create('item_statuses', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name',255);
            $table->string('code',255);
            $table->timestamps();
        });

        Schema::create('collection_types', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name',255);
            $table->timestamps();
        });

        Schema::create('doc_languages', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('labels', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('config_rfids');
        Schema::dropIfExists('users');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('sub_menus');
        Schema::dropIfExists('authorization_types');
        Schema::dropIfExists('authorizations');
        Schema::dropIfExists('members');
        Schema::dropIfExists('gmds');
        Schema::dropIfExists('media_types');
        Schema::dropIfExists('content_types');
        Schema::dropIfExists('carrier_types');
        Schema::dropIfExists('authors');
        Schema::dropIfExists('publishers');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('places');
        Schema::dropIfExists('item_statuses');
        Schema::dropIfExists('collection_types');
        Schema::dropIfExists('doc_languages');
        Schema::dropIfExists('labels');
    }
};
