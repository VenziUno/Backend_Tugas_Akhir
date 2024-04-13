<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigRfidController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookDetailStatusController;
use App\Http\Controllers\GmdController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\BorrowingDetailController;
use App\Http\Controllers\MediaTypeController;
use App\Http\Controllers\ContentTypeController;
use App\Http\Controllers\CarrierTypeController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ItemStatusController;
use App\Http\Controllers\CollectionTypeController;
use App\Http\Controllers\DocLanguageController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::get('/public/book', [BookController::class, 'getBook']);
Route::get('/public/book/{id}', [BookController::class, 'getSingleBook']);
Route::get('/public/borrowingdetail/member/{id}', [BorrowingDetailController::class, 'getBorrowingMember']);
Route::get('/public/borrowingdetail/index/{bookId}', [BookDetailStatusController::class, 'getBook']);
Route::get('/public/label', [LabelController::class, 'getLabel']);
Route::get('/public/collectiontype', [CollectionTypeController::class, 'getCollectionType']);
Route::get('/public/gmd', [GmdController::class, 'getGmd']);
Route::get('/public/doclanguage', [DocLanguageController::class, 'getDocLanguage']);
Route::post('/public/member/{nis}', [MemberController::class, 'resetPasswordMember']);


Route::middleware(['auth:api'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('menu', [MenuController::class, 'index']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);

    Route::middleware(['Authorizations'])->group(function () {

        Route::prefix('/borrowing')->group(function () {
            Route::get('/', [BorrowingController::class, 'getBorrowing'])->name('master_gmd_view_index');
            Route::get('/report', [BorrowingController::class, 'getBorrowingReport'])->name('master_gmd_view_index');
            Route::get('/code', [BorrowingController::class, 'getBorrowingCode'])->name('master_gmd_view_code');
            Route::get('/{id}', [BorrowingController::class, 'getSingleBorrowing'])->name('master_gmd_view_show');
            Route::post('/', [BorrowingController::class, 'addBorrowing'])->name('master_gmd_add_store');
            Route::post('/{id}', [BorrowingController::class, 'editBorrowing'])->name('master_gmd_update_update');
            Route::delete('/{id}', [BorrowingController::class, 'deleteBorrowing'])->name('master_gmd_delete_destory');
        });

        Route::prefix('/borrowingdetail')->group(function () {
            Route::get('/', [BorrowingDetailController::class, 'getBorrowingDetail'])->name('master_gmd_view_index');
            Route::get('/report', [BorrowingDetailController::class, 'getBorrowingDetailReport'])->name('master_gmd_view_index');
            Route::get('/code', [BorrowingDetailController::class, 'getBorrowingDetailCode'])->name('master_gmd_view_code');
            Route::get('/{id}', [BorrowingDetailController::class, 'getSingleBorrowingDetail'])->name('master_gmd_view_show');
            Route::post('/', [BorrowingDetailController::class, 'addBorrowingDetail'])->name('master_gmd_add_store');
            Route::post('/return/{id}', [BorrowingDetailController::class, 'editBookReturn'])->name('book_bookDetail_update_update');
            Route::post('/extension/{id}', [BorrowingDetailController::class, 'editBookExtension'])->name('book_bookDetail_update_update');
            Route::post('/extension/member/{id}', [BorrowingDetailController::class, 'editBookExtensionMember'])->name('book_bookDetail_update_update');
            Route::post('/{id}', [BorrowingDetailController::class, 'editBorrowingDetail'])->name('master_gmd_update_update');
            Route::delete('/{id}', [BorrowingDetailController::class, 'deleteBorrowingDetail'])->name('master_gmd_delete_destory');
        });

        Route::prefix('/bookdetailstatus')->group(function () {
            Route::get('/', [BookDetailStatusController::class, 'getBooks'])->name('book_bookDetail_view_index');
            Route::get('/index/{bookId}', [BookDetailStatusController::class, 'getBook'])->name('book_bookDetail_view_index');
            Route::get('/code', [BookDetailStatusController::class, 'getBookCode'])->name('book_bookDetail_view_code');
            Route::get('/show/{bookId}', [BookDetailStatusController::class, 'getSingleBookTransaksi'])->name('book_bookDetail_view_show');
            Route::get('/RFID/{ibsn_issn}', [BookDetailStatusController::class, 'getSingleBookSign'])->name('book_bookDetail_view_show');
            Route::post('/', [BookDetailStatusController::class, 'addBook'])->name('book_bookDetail_add_store');
            Route::post('/{id}', [BookDetailStatusController::class, 'editBook'])->name('book_bookDetail_update_update');
            Route::delete('/{id}', [BookDetailStatusController::class, 'deleteBook'])->name('book_bookDetail_delete_destory');
        });

        Route::prefix('/gmd')->group(function () {
            Route::get('/', [GmdController::class, 'getGmd'])->name('master_gmd_view_index');
            Route::get('/code', [GmdController::class, 'getGmdCode'])->name('master_gmd_view_code');
            Route::get('/{id}', [GmdController::class, 'getSingleGmd'])->name('master_gmd_view_show');
            Route::post('/', [GmdController::class, 'addGmd'])->name('master_gmd_add_store');
            Route::post('/{id}', [GmdController::class, 'editGmd'])->name('master_gmd_update_update');
            Route::delete('/{id}', [GmdController::class, 'deleteGmd'])->name('master_gmd_delete_destory');
        });

        Route::prefix('/mediatype')->group(function () {
            Route::get('/', [MediaTypeController::class, 'getMediaType'])->name('book_bookdetail_view_index');
            Route::get('/code', [MediaTypeController::class, 'getMediaTypeCode'])->name('book_bookdetail_view_code');
            Route::get('/{id}', [MediaTypeController::class, 'getSingleMediaType'])->name('book_bookdetail_view_show');
            Route::post('/', [MediaTypeController::class, 'addMediaType'])->name('book_bookdetail_add_store');
            Route::post('/{id}', [MediaTypeController::class, 'editMediaType'])->name('book_bookdetail_update_update');
            Route::delete('/{id}', [MediaTypeController::class, 'deleteMediaType'])->name('book_bookdetail_delete_destory');
        });

        Route::prefix('/contenttype')->group(function () {
            Route::get('/', [ContentTypeController::class, 'getContentType'])->name('book_bookdetail_view_index');
            Route::get('/code', [ContentTypeController::class, 'getContentTypeCode'])->name('book_bookdetail_view_code');
            Route::get('/{id}', [ContentTypeController::class, 'getSingleContentType'])->name('book_bookdetail_view_show');
            Route::post('/', [ContentTypeController::class, 'addContentType'])->name('book_bookdetail_add_store');
            Route::post('/{id}', [ContentTypeController::class, 'editContentType'])->name('book_bookdetail_update_update');
            Route::delete('/{id}', [ContentTypeController::class, 'deleteContentType'])->name('book_bookdetail_delete_destory');
        });

        Route::prefix('/carriertype')->group(function () {
            Route::get('/', [CarrierTypeController::class, 'getCarrierType'])->name('book_bookdetail_view_index');
            Route::get('/code', [CarrierTypeController::class, 'getCarrierTypeCode'])->name('book_bookdetail_view_code');
            Route::get('/{id}', [CarrierTypeController::class, 'getSingleCarrierType'])->name('book_bookdetail_view_show');
            Route::post('/', [CarrierTypeController::class, 'addCarrierType'])->name('book_bookdetail_add_store');
            Route::post('/{id}', [CarrierTypeController::class, 'editCarrierType'])->name('book_bookdetail_update_update');
            Route::delete('/{id}', [CarrierTypeController::class, 'deleteCarrierType'])->name('book_bookdetail_delete_destory');
        });

        Route::prefix('/publisher')->group(function () {
            Route::get('/', [PublisherController::class, 'getPublisher'])->name('book_bookdetail_view_index');
            Route::get('/code', [PublisherController::class, 'getPublisherCode'])->name('book_bookdetail_view_code');
            Route::get('/{id}', [PublisherController::class, 'getSinglePublisher'])->name('book_bookdetail_view_show');
            Route::post('/', [PublisherController::class, 'addPublisher'])->name('book_bookdetail_add_store');
            Route::post('/{id}', [PublisherController::class, 'editPublisher'])->name('book_bookdetail_update_update');
            Route::delete('/{id}', [PublisherController::class, 'deletePublisher'])->name('book_bookdetail_delete_destory');
        });

        Route::prefix('/place')->group(function () {
            Route::get('/', [PlaceController::class, 'getPlace'])->name('book_bookdetail_view_index');
            Route::get('/code', [PlaceController::class, 'getPlaceCode'])->name('book_bookdetail_view_code');
            Route::get('/{id}', [PlaceController::class, 'getSinglePlace'])->name('book_bookdetail_view_show');
            Route::post('/', [PlaceController::class, 'addPlace'])->name('book_bookdetail_add_store');
            Route::post('/{id}', [PlaceController::class, 'editPlace'])->name('book_bookdetail_update_update');
            Route::delete('/{id}', [PlaceController::class, 'deletePlace'])->name('book_bookdetail_delete_destory');
        });

        Route::prefix('/supplier')->group(function () {
            Route::get('/', [SupplierController::class, 'getSupplier'])->name('book_bookdetail_view_index');
            Route::get('/code', [SupplierController::class, 'getSupplierCode'])->name('book_bookdetail_view_code');
            Route::get('/{id}', [SupplierController::class, 'getSingleSupplier'])->name('book_bookdetail_view_show');
            Route::post('/', [SupplierController::class, 'addSupplier'])->name('book_bookdetail_add_store');
            Route::post('/{id}', [SupplierController::class, 'editSupplier'])->name('book_bookdetail_update_update');
            Route::delete('/{id}', [SupplierController::class, 'deleteSupplier'])->name('book_bookdetail_delete_destory');
        });

        Route::prefix('/author')->group(function () {
            Route::get('/', [AuthorController::class, 'getAuthor'])->name('book_bookdetail_view_index');
            Route::get('/code', [AuthorController::class, 'getAuthorCode'])->name('book_bookdetail_view_code');
            Route::get('/{id}', [AuthorController::class, 'getSingleAuthor'])->name('book_bookdetail_view_show');
            Route::post('/', [AuthorController::class, 'addAuthor'])->name('book_bookdetail_add_store');
            Route::post('/{id}', [AuthorController::class, 'editAuthor'])->name('book_bookdetail_update_update');
            Route::delete('/{id}', [AuthorController::class, 'deleteAuthor'])->name('book_bookdetail_delete_destory');
        });

        Route::prefix('/subject')->group(function () {
            Route::get('/', [SubjectController::class, 'getSubject'])->name('book_bookdetail_view_index');
            Route::get('/code', [SubjectController::class, 'getSubjectCode'])->name('book_bookdetail_view_code');
            Route::get('/{id}', [SubjectController::class, 'getSingleSubject'])->name('book_bookdetail_view_show');
            Route::post('/', [SubjectController::class, 'addSubject'])->name('book_bookdetail_add_store');
            Route::post('/{id}', [SubjectController::class, 'editSubject'])->name('book_bookdetail_update_update');
            Route::delete('/{id}', [SubjectController::class, 'deleteSubject'])->name('book_bookdetail_delete_destory');
        });

        Route::prefix('/location')->group(function () {
            Route::get('/', [LocationController::class, 'getLocation'])->name('book_bookdetail_view_index');
            Route::get('/code', [LocationController::class, 'getLocationCode'])->name('book_bookdetail_view_code');
            Route::get('/{id}', [LocationController::class, 'getSingleLocation'])->name('book_bookdetail_view_show');
            Route::post('/', [LocationController::class, 'addLocation'])->name('book_bookdetail_add_store');
            Route::post('/{id}', [LocationController::class, 'editLocation'])->name('book_bookdetail_update_update');
            Route::delete('/{id}', [LocationController::class, 'deleteLocation'])->name('book_bookdetail_delete_destory');
        });

        Route::prefix('/itemstatus')->group(function () {
            Route::get('/', [ItemStatusController::class, 'getItemStatus'])->name('book_bookdetail_view_index');
            Route::get('/code', [ItemStatusController::class, 'getItemStatusCode'])->name('book_bookdetail_view_code');
            Route::get('/{id}', [ItemStatusController::class, 'getSingleItemStatus'])->name('book_bookdetail_view_show');
            Route::post('/', [ItemStatusController::class, 'addItemStatus'])->name('book_bookdetail_add_store');
            Route::post('/{id}', [ItemStatusController::class, 'editItemStatus'])->name('book_bookdetail_update_update');
            Route::delete('/{id}', [ItemStatusController::class, 'deleteItemStatus'])->name('book_bookdetail_delete_destory');
        });

        Route::prefix('/collectiontype')->group(function () {
            Route::get('/', [CollectionTypeController::class, 'getCollectionType'])->name('book_bookdetail_view_index');
            Route::get('/code', [CollectionTypeController::class, 'getCollectionTypeCode'])->name('book_bookdetail_view_code');
            Route::get('/{id}', [CollectionTypeController::class, 'getSingleCollectionType'])->name('book_bookdetail_view_show');
            Route::post('/', [CollectionTypeController::class, 'addCollectionType'])->name('book_bookdetail_add_store');
            Route::post('/{id}', [CollectionTypeController::class, 'editCollectionType'])->name('book_bookdetail_update_update');
            Route::delete('/{id}', [CollectionTypeController::class, 'deleteCollectionType'])->name('book_bookdetail_delete_destory');
        });

        Route::prefix('/doclanguage')->group(function () {
            Route::get('/', [DocLanguageController::class, 'getDocLanguage'])->name('book_bookdetail_view_index');
            Route::get('/code', [DocLanguageController::class, 'getDocLanguageCode'])->name('book_bookdetail_view_code');
            Route::get('/{id}', [DocLanguageController::class, 'getSingleDocLanguage'])->name('book_bookdetail_view_show');
            Route::post('/', [DocLanguageController::class, 'addDocLanguage'])->name('book_bookdetail_add_store');
            Route::post('/{id}', [DocLanguageController::class, 'editDocLanguage'])->name('book_bookdetail_update_update');
            Route::delete('/{id}', [DocLanguageController::class, 'deleteDocLanguage'])->name('book_bookdetail_delete_destory');
        });

        Route::prefix('/label')->group(function () {
            Route::get('/', [LabelController::class, 'getLabel'])->name('book_bookdetail_view_index');
            Route::get('/code', [LabelController::class, 'getLabelCode'])->name('book_bookdetail_view_code');
            Route::get('/{id}', [LabelController::class, 'getSingleLabel'])->name('book_bookdetail_view_show');
            Route::post('/', [LabelController::class, 'addLabel'])->name('book_bookdetail_add_store');
            Route::post('/{id}', [LabelController::class, 'editLabel'])->name('book_bookdetail_update_update');
            Route::delete('/{id}', [LabelController::class, 'deleteLabel'])->name('book_bookdetail_delete_destory');
        });

        Route::prefix('/role')->group(function () {
            Route::get('/', [RoleController::class, 'getRole'])->name('setting_role_view_index');
            Route::get('/code', [RoleController::class, 'getRoleCode'])->name('setting_role_view_code');
            Route::get('/{id}', [RoleController::class, 'getSingleRole'])->name('setting_role_view_show');
            Route::post('/', [RoleController::class, 'addRole'])->name('setting_role_add_store');
            Route::post('/{id}', [RoleController::class, 'editRole'])->name('setting_role_update_update');
            Route::delete('/{id}', [RoleController::class, 'deleteRole'])->name('setting_role_delete_destory');
        });

        Route::prefix('/book')->group(function () {
            Route::get('/', [BookController::class, 'getBook'])->name('book_bookDetail_view_index');
            Route::get('/code', [BookController::class, 'getBookCode'])->name('book_bookDetail_view_code');
            Route::get('/{id}', [BookController::class, 'getSingleBook'])->name('book_bookDetail_view_show');
            Route::post('/', [BookController::class, 'addBook'])->name('book_bookDetail_add_store');
            Route::post('/{id}', [BookController::class, 'editBook'])->name('book_bookDetail_update_update');
            Route::delete('/{id}', [BookController::class, 'deleteBook'])->name('book_bookDetail_delete_destory');
        });

        Route::prefix('/member')->group(function () {
            Route::get('/', [MemberController::class, 'getMember'])->name('member_view_index');
            Route::get('/code', [MemberController::class, 'getMemberCode'])->name('member_view_code');
            Route::get('/{id}', [MemberController::class, 'getSingleMember'])->name('member_view_show');
            Route::get('rfid/{RFID}', [MemberController::class, 'getSingleMemberRFID'])->name('member_view_show');
            Route::post('/', [MemberController::class, 'addMember'])->name('member_add_store');
            Route::post('/{id}', [MemberController::class, 'editMember'])->name('member_update_update');
            Route::delete('/{id}', [MemberController::class, 'deleteMember'])->name('member_delete_destory');
        });

        Route::prefix('/admin')->group(function () {
            Route::get('/', [AuthController::class, 'index'])->name('setting_admin_view_index');
            Route::get('/{id}', [AuthController::class, 'show'])->name('setting_admin_view_show');
            Route::post('/', [AuthController::class, 'store'])->name('setting_admin_add_store');
            Route::post('/{id}', [AuthController::class, 'update'])->name('setting_admin_update_update');
            Route::delete('/{id}', [AuthController::class, 'destory'])->name('setting_admin_delete_destory');
        });

        Route::prefix('/configrfid')->group(function () {
            Route::get('/', [ConfigRfidController::class, 'getConfigRfid'])->name('setting_admin_view_index');
            Route::get('/{id}', [ConfigRfidController::class, 'getSingleConfigRfid'])->name('setting_admin_view_show');
            Route::post('/{id}', [ConfigRfidController::class, 'editConfigRfid'])->name('setting_admin_update_update');
        });

        Route::prefix('/banner')->group(function () {
            Route::get('/', [BannerController::class, 'getBanner'])->name('banner_view_index');
            Route::get('/code', [BannerController::class, 'getBannerCode'])->name('banner_view_code');
            Route::get('/{id}', [BannerController::class, 'getSingleBanner'])->name('banner_view_show');
            Route::post('/', [BannerController::class, 'addBanner'])->name('banner_add_store');
            Route::post('/{id}', [BannerController::class, 'editBanner'])->name('banner_update_update');
            Route::delete('/{id}', [BannerController::class, 'deleteBanner'])->name('banner_delete_destory');
        });

        Route::prefix('/authorization')->group(function () {
            Route::get('/{id}', [AuthorizationController::class, 'getAuthorization'])->name('setting_authorization_view_index');
            Route::post('/', [AuthorizationController::class, 'editAuthorization'])->name('setting_authorization_update_index');
        });
    });
});
