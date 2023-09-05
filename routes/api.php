<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CertificationCodeController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ClientEmployeeController;
use App\Http\Controllers\Api\ClientUserController;
use App\Http\Controllers\Api\CounselingReserveController;
use App\Http\Controllers\Api\CounselingReserveNoticeController;
use App\Http\Controllers\Api\CounselingReserveReportSangyoiController;
use App\Http\Controllers\Api\CounselingReserveSangyoiController;
use App\Http\Controllers\Api\KihoninfHospitalController;
use App\Http\Controllers\Api\QuestionAnswerController;
use App\Http\Controllers\Api\QuestionnaireController;
use App\Http\Controllers\Api\QuestionTableController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\SangyoiController;
use App\Http\Controllers\Api\SangyoiScheduleController;
use App\Http\Controllers\Api\UserCompanyController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['api'], 'prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('find-password', [AuthController::class, 'findPassword']);
    Route::post('reset-password', [AuthController::class, 'resetPassword']);
    Route::post('test-send-mail', [AuthController::class, 'testSendMail']);
    Route::get('me', [AuthController::class, 'me']);
    // Route::post('update-profile', [AuthController::class, 'updateProfile']);
    // Route::get('logout', [AuthController::class, 'logout']);
});

Route::group(['middleware' => ['api']], function () {
    Route::post('upload-template/{name}', [Controller::class, 'uploadTemplate']);
    Route::post('certification-code/verify', [CertificationCodeController::class, 'verify']);
    Route::resource('certification-code', CertificationCodeController::class);
    Route::get('client/download-excel', [ClientController::class, 'downloadExcel']);
    Route::get('client/download-working-time-excel', [ClientController::class, 'downloadWTExcel']);
    Route::get('client/download-working-time-excel-clone', [ClientController::class, 'downloadWTExcelClone']);
    Route::get('sangyoi/download-excel', [SangyoiController::class, 'downloadExcel']);
    Route::get('client-employee/get-pdf-file/{id}', [ClientEmployeeController::class, 'getPdfFile']);
    Route::post('question-table/send-forwarded-email-survey', [QuestionTableController::class, 'sendForwardedEmailSurvey']);
});

Route::group(['middleware' => ['assign.guard:sangyoi', 'api', 'auth.jwt']], function () {
    Route::post('sangyoi-schedule/store-multi', [SangyoiScheduleController::class, 'storeMulti']);
    Route::post('sangyoi-schedule/cancel', [SangyoiScheduleController::class, 'cancel']);
    Route::get('sangyoi-schedule/cancel-option', [SangyoiScheduleController::class, 'cancelOption']);
    Route::resource('sangyoi-schedule', SangyoiScheduleController::class);
    Route::resource('counseling-reserve-sangyoi', CounselingReserveSangyoiController::class);
    Route::get('counseling-reserve-report/scan-pdf', [CounselingReserveReportSangyoiController::class, 'scanPdf']);
    Route::resource('counseling-reserve-report', CounselingReserveReportSangyoiController::class);
});

Route::group(['middleware' => ['assign.guard:clientUser', 'api', 'auth.jwt']], function () {
    Route::post('client-employee/upload-pdf', [ClientEmployeeController::class, 'uploadPdf']);
    Route::resource('client-employee', ClientEmployeeController::class);
    Route::resource('client-user', ClientUserController::class);
    Route::resource('report', ReportController::class);
});

Route::group(['middleware' => ['assign.guard:user', 'api', 'auth.jwt']], function () {
    Route::resource('user', UserController::class);
    Route::post('client/upload-excel', [ClientController::class, 'uploadExcel']);
    Route::post('client/upload-working-time-excel', [ClientController::class, 'uploadWTExcel']);
    Route::post('client/upload-working-time-excel-clone', [ClientController::class, 'uploadWTExcelClone']);
    Route::get('client/option', [ClientController::class, 'option']);
    Route::get('client/counseling-reserve', [ClientController::class, 'counselingReserveIndex']);
    Route::get('client/counseling-reserve/{id}/scan-pdf', [ClientController::class, 'counselingReserveDetailScanPdf']);
    Route::get('client/counseling-reserve/{id}', [ClientController::class, 'counselingReserveDetail']);
    Route::resource('client', ClientController::class);
    Route::post('sangyoi/upload-excel', [SangyoiController::class, 'uploadExcel']);
    Route::get('sangyoi/schedule/detail', [SangyoiController::class, 'scheduleDetail']);
    Route::get('sangyoi/schedule', [SangyoiController::class, 'schedule']);
    Route::get('sangyoi/payment-summary', [SangyoiController::class, 'paymentSummaryIndex']);
    Route::get('sangyoi/payment-summary/{id}/scan-pdf', [SangyoiController::class, 'paymentSummaryDetailScanPdf']);
    Route::get('sangyoi/payment-summary/{id}', [SangyoiController::class, 'paymentSummaryDetail']);
    Route::get('sangyoi/option', [SangyoiController::class, 'option']);
    Route::post('sangyoi/upload-pdf', [SangyoiController::class, 'uploadPdf']);
    Route::get('sangyoi/maching-ng/{id}', [SangyoiController::class, 'machingNgIndex']);
    Route::post('sangyoi/maching-ng', [SangyoiController::class, 'machingNgStore']);
    Route::resource('sangyoi', SangyoiController::class);
    Route::get('user-company', [UserCompanyController::class, 'detail']);
    Route::patch('user-company', [UserCompanyController::class, 'update']);
    Route::resource('counseling-reserve-notice', CounselingReserveNoticeController::class);
});

Route::group(['middleware' => ['assign.guard:code', 'api', 'auth.jwt']], function () {
    Route::get('counseling-reserve/check-survey', [CounselingReserveController::class, 'checkSurvey']);
    Route::post('counseling-reserve/cancel', [CounselingReserveController::class, 'cancel']);
    Route::patch('counseling-reserve', [CounselingReserveController::class, 'update']);
    Route::resource('counseling-reserve', CounselingReserveController::class);
    Route::resource('question-answer', QuestionAnswerController::class);
    Route::get('questionnaire/get-name', [QuestionnaireController::class, 'getName']);
    Route::resource('questionnaire', QuestionnaireController::class);
    Route::resource('kihoninf-hospital', KihoninfHospitalController::class);
    Route::post('question-table/send-forwarded-email-interview', [QuestionTableController::class, 'sendForwardedEmailInterview']);
});
