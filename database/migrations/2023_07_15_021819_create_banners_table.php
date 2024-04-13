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
        Schema::create('banners', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->text('description');
            $table->text('file');
            $table->boolean('status');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('books', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->string('authors_id');
            $table->string('statement_of_responsibility')->nullable();
            $table->string('edition')->nullable();
            $table->string('specific_detail_info')->nullable();
            $table->string('gmds_id');
            $table->string('content_types_id')->nullable();
            $table->string('media_types_id')->nullable();
            $table->string('carrier_types_id')->nullable();
            $table->string('publishers_id');
            $table->string('publisher_year');
            $table->string('places_id');
            $table->string('isbn_issn',13);
            $table->string('collation')->nullable();
            $table->string('series_title')->nullable();
            $table->string('call_number')->nullable();
            $table->string('subjects_id')->nullable();
            $table->string('doc_languages_id');
            $table->text('desc')->nullable();
            $table->text('file');
            $table->boolean('opac');
            $table->string('labels_id');
            $table->unsignedInteger('current_stock')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('authors_id')->references('id')->on('authors');
            $table->foreign('gmds_id')->references('id')->on('gmds');
            $table->foreign('content_types_id')->references('id')->on('content_types');
            $table->foreign('media_types_id')->references('id')->on('media_types');
            $table->foreign('carrier_types_id')->references('id')->on('carrier_types');
            $table->foreign('publishers_id')->references('id')->on('publishers');
            $table->foreign('places_id')->references('id')->on('places');
            $table->foreign('subjects_id')->references('id')->on('subjects');
            $table->foreign('doc_languages_id')->references('id')->on('doc_languages');
            $table->foreign('labels_id')->references('id')->on('labels');
        });

        Schema::create('borrowings', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('members_id');
            $table->timestamps();
            $table->foreign('members_id')->references('id')->on('members');
        });

        Schema::create('book_detail_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('isbn_issn');
            $table->string('item_statuses_id');
            $table->string('books_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('books_id')->references('id')->on('books');
            $table->foreign('item_statuses_id')->references('id')->on('item_statuses');
        });

        Schema::create('borrowing_details', function (Blueprint $table) {
            $table->id();
            $table->string('borrowings_id');
            $table->unsignedBigInteger('book_detail_statuses_id');
            $table->date('loan_date');
            $table->date('returned_date')->nullable();
            $table->date('due_date');
            $table->string('mulct')->nullable();
            $table->string('approval')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('borrowings_id')->references('id')->on('borrowings');
            $table->foreign('book_detail_statuses_id')->references('id')->on('book_detail_statuses');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
        Schema::dropIfExists('books');
        Schema::dropIfExists('borrowings');
        Schema::dropIfExists('book_detail_statuses');
        Schema::dropIfExists('borrowing_details');
    }
};
