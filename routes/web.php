<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('test', 'TestController@testView');


// Home Page
/**
 * @api {get} /home Request Home Page
 * @apiName GetHomePage
 * @apiGroup Home Page
 * @apiPermission All
 *
 * @apiSuccess {string} title Title for Home Page.
 * @apiSuccess {array} sheduler Array of days and Lessons in day.
 * @apiSuccess {view} Home Template for Home Page
 */
Route::get('/', 'Home\HomeController@showShedule');

// Authorization
//Auth::routes();
Route::get('/home', 'Users\HomeController@index')->name('home');

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout')->name('logout');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset','Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('register','Users\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Users\RegisterController@register');

// Shedule
/**
 * @api {get} /shedule Request Shedule
 * @apiName GetShedule
 * @apiGroup Shedule
 * @apiPermission All
 *
 * @apiSuccess {string} title Title for Home Page.
 * @apiSuccess {array} sheduler Array of days and Lessons in day.
 * @apiSuccess {view} Home Template for Shedule
 */
Route::get('shedule', 'Shedule\SheduleController@getShedule');

/**
 * @api {get} /editshedule Edit Shedule
 * @apiName EditShedule
 * @apiGroup Shedule
 * @apiPermission Director
 *
 * @apiSuccess {array} Days Array of all working days.
 * @apiSuccess {array} Lessons Array of all Lessons.
 * @apiSuccess {array} DaysLessons Array of lessons in each day.
 * @apiSuccess {view} ShowDayLessons Template for Edit Shedule.
 */
Route::get('editshedule', 'Shedule\DayLessonsController@showDaysLessons')->middleware('is_director');

/**
 * @api {post} /editshedule Update Shedule
 * @apiName UpdateShedule
 * @apiGroup Shedule
 * @apiPermission Director
 *
 * @apiParam {Number} adayID   Mandatory Day ID.
 * @apiParam {Number} lessonID Mandatory Lesson ID.
 * @apiParam {Number} position Mandatory Day ID.
 */
Route::post('editshedule', 'Shedule\DayLessonsController@updateLesson')->middleware('is_director');

/**
 * @api {get} /addshedulelesson/:id Add Lesson Form
 * @apiName AddLessonForm
 * @apiGroup Shedule
 * @apiPermission Director
 *
 * @apiParam {Number} id dayID unique ID.
 *
 * @apiSuccess {string} dayName Name of day for add lesson.
 * @apiSuccess {array} lessons Array of all Lessons.
 * @apiSuccess {array} lpositions Array of all  Lessons position for this day.
 * @apiSuccess {Number} atLast Number last position + 1.
 * @apiSuccess {view} AddLessonForm Template for show Add Lesson Form.
 */
Route::get('addshedulelesson/{id}', 'Shedule\DayLessonsController@showAddLessonForm')->middleware('is_director');

/**
 * @api {post} /addshedulelesson/:id Add Lesson
 * @apiName AddLesson
 * @apiGroup Shedule
 * @apiPermission Director
 *
 * @apiParam {Number} id dayID unique ID.
 * @apiParam {Number} lessonID ID of added Lesson, unique ID.
 * @apiParam {Number} position Lesson position in Day unique.
 */
Route::post('addshedulelesson/{id}', 'Shedule\DayLessonsController@addLesson')->middleware('is_director');

/**
 * @api {get} /delshedule/day/:dayID/dellesson/:lesonID/position/:positionID Delete Lesson
 * @apiName DelLesson
 * @apiGroup Shedule
 * @apiPermission Director
 *
 * @apiParam {Number} dayID dayID unique ID.
 * @apiParam {Number} lessonID lessonID unique ID.
 * @apiParam {Number} positionID positionID unique ID.
 */
Route::get('delshedule/day/{dayID}/dellesson/{lesonID}/position/{positionID}', 'Shedule\DayLessonsController@delLesson')->middleware('is_director');


// Stat
/**
 * @api {get} /astatistic/:id Get User Statistic.
 * @apiName GetStatistic
 * @apiGroup Statistic
 * @apiPermission Student or Parent
 *
 * @apiParam {Number} id User id, unique ID.
 *
 * @apiSuccess {array} stat All Statistic for selected User.
 * @apiSuccess {view} student_stat Template for User Stat.
 */
Route::get('statistic/{id}', 'Stat\StatController@showUserStat')->middleware('stat_user');

/**
 * @api {get} /editstatistic Select Param Form.
 * @apiName GetStatisticParam
 * @apiGroup Statistic
 * @apiPermission Teacher
 *
 * @apiSuccess {array} students All Students.
 * @apiSuccess {array} lessons All Lessons.
 * @apiSuccess {view} TeacherStatForm Template for select User and Lesson.
 */
Route::get('editstatistic', 'Stat\TeacherStatController@showTeacherStatForm')->middleware('is_teacher');

/**
 * @api {post} /editstatistic Edit Statistic Form.
 * @apiName EditStatisticForm
 * @apiGroup Statistic
 * @apiPermission Teacher
 *
 * @apiParam {Number} student_id User id, unique ID.
 * @apiParam {Number} lesson_id Lesson id, unique ID.
 *
 * @apiSuccess {route} updatestatistic/student/ All Students.
 */
Route::post('editstatistic', 'Stat\TeacherStatController@redirectStatForm')->middleware('is_teacher');

/**
 * @api {get} /updatestatistic/student/:studentID/lesson/:lessonID Update Statistic Form.
 * @apiName UpdateStatisticForm
 * @apiGroup Statistic
 * @apiPermission Teacher
 *
 * @apiParam {Number} studentID User id, unique ID.
 * @apiParam {Number} lessonID Lesson id, unique ID.
 *
 * @apiSuccess {array} stat Statistic for Student.
 * @apiSuccess {string} studentName Student First Name and Last Name.
 * @apiSuccess {string} lessonName Lesson Name.
 * @apiSuccess {view} EditStatForm Template for Update Statistic.
 */
Route::get('updatestatistic/student/{studentID}/lesson/{lessonID}', 'Stat\TeacherStatController@showEditStatForm')->middleware('is_teacher');

/**
 * @api {post} /updatestatistic/student/:studentID/lesson/:lessonID Update Statistic.
 * @apiName UpdateStatistic
 * @apiGroup Statistic
 * @apiPermission Teacher
 *
 * @apiParam {Number} studentID User id, unique ID.
 * @apiParam {Number} lessonID Lesson id, unique ID.
 * @apiParam {Number} id Statistic id, unique ID.
 * @apiParam {Number} rating  Student Rating.
 * @apiParam {timestamp} created_at DataTime Create.
 * @apiParam {timestamp} updated_at DataTime Update.
 */
Route::post('updatestatistic/student/{studentID}/lesson/{lessonID}', 'Stat\TeacherStatController@updateStat')->middleware('is_teacher');

/**
 * @api {get} /updatestatistic/student/:studentID/lesson/:lessonID/addstatistic Add Statistic Form.
 * @apiName AddStatisticForm
 * @apiGroup Statistic
 * @apiPermission Teacher
 *
 * @apiParam {Number} studentID User id, unique ID.
 * @apiParam {Number} lessonID Lesson id, unique ID.
 *
 * @apiSuccess {Number} studentID User id, unique ID.
 * @apiSuccess {Number} lessonID Lesson id, unique ID.
 * @apiSuccess {string} studentName Student full name.
 * @apiSuccess {string} lessonName Lesson name.
 * @apiSuccess {view} AddStatForm Template for Student Add.
 */
Route::get('updatestatistic/student/{studentID}/lesson/{lessonID}/addstatistic', 'Stat\TeacherStatController@showAddStatForm')->middleware('is_teacher');

/**
 * @api {post} /updatestatistic/student/:studentID/lesson/:lessonID/addstatistic Add Statistic.
 * @apiName AddStatistic
 * @apiGroup Statistic
 * @apiPermission Teacher
 *
 * @apiParam {Number} users_id User id, unique ID.
 * @apiParam {Number} lessons_id Lesson id, unique ID.
 * @apiParam {Number} rating Rating.
 */
Route::post('updatestatistic/student/{studentID}/lesson/{lessonID}/addstatistic', 'Stat\TeacherStatController@addStat')->middleware('is_teacher');

/**
 * @api {get} /delstatistic/:id Delete Statistic.
 * @apiName DelStatistic
 * @apiGroup Statistic
 * @apiPermission Teacher
 *
 * @apiParam {Number} id Statistic id, unique ID.
 */
Route::get('delstatistic/{id}', 'Stat\TeacherStatController@delStat')->middleware('is_teacher');

/**
 * @api {get} /directorstatistic All Statistic Form.
 * @apiName AllStatisticForm
 * @apiGroup Statistic
 * @apiPermission Director
 *
 * @apiSuccess {array} lessons All Lessons.
 * @apiSuccess {view} DirectorStatForm Template for Select Lesson to get Statistic.
 */
Route::get('directorstatistic', 'Stat\DirectorStatController@showStatForm')->middleware('is_director');

/**
 * @api {post} /directorstatistic All Statistic.
 * @apiName AllStatistic
 * @apiGroup Statistic
 * @apiPermission Director
 *
 * @apiSuccess {array} stat All Statistic for selected Lesson.
 * @apiSuccess {view} ShowDirectorStat Template for Statistic for selected Lesson.
 */
Route::post('directorstatistic', 'Stat\DirectorStatController@showStat')->middleware('is_director');

// Request
/**
 * @api {get} /showrequests Parent Meetings
 * @apiName GetMeeting
 * @apiGroup Meetings
 * @apiPermission Parent
 *
 * @apiSuccess {array} meetings All Meetings for current Parent.
 * @apiSuccess {view} ShowParentRequests Template for Parent Meetings.
 */
Route::get('showrequests', 'Request\RequestController@showRequests')->middleware('parent_request');

/**
 * @api {get} /request Add Meeting Form
 * @apiName AddMeetingForm
 * @apiGroup Meetings
 * @apiPermission Parent
 *
 * @apiSuccess {array} teachers All Teachers.
 * @apiSuccess {view} SelectTeacherForm Template for Select Teacher Form.
 */
Route::get('request', 'Request\RequestController@showSelectTeacherForm')->middleware('parent_request');

/**
 * @api {post} /request Add Meeting
 * @apiName AddMeeting
 * @apiGroup Meetings
 * @apiPermission Parent
 *
 * @apiParam {string} name Meeting Name.
 * @apiParam {string} topic Meeting Topic.
 * @apiParam {Number} userID User id, unique id.
 */
Route::post('request', 'Request\RequestController@addRequest')->middleware('parent_request');

/**
 * @api {get} /teacherrequests Teacher Meetings
 * @apiName GetTeacherMeetings
 * @apiGroup Meetings
 * @apiPermission Teacher
 *
 * @apiSuccess {array} meetings All Meetings for current Teacher.
 * @apiSuccess {view} ShowTeacherRequest Template for Teacher Meetings.
 */
Route::get('teacherrequests', 'Request\TeacherRequestController@showRequests')->middleware('is_teacher');

/**
 * @api {post} /teacherrequests Update Status Meetings
 * @apiName UpdateMeetings
 * @apiGroup Meetings
 * @apiPermission Teacher
 *
 * @apiParam {Number} meetingID Meeting ID, unique id.
 * @apiParam {Enumerable} status Meeting Status: accepted or not ("1";"0") .
 */
Route::post('teacherrequests', 'Request\TeacherRequestController@updateRequest')->middleware('is_teacher');

/**
 * @api {get} /directorrequests Director Meetings Form
 * @apiName DirectorMeetingsForm
 * @apiGroup Meetings
 * @apiPermission Director
 *
 * @apiSuccess {array} teachers All Teachers.
 * @apiSuccess {view} ShowDirectorRequestForm Template for select Teacher Meetings.
 */
Route::get('directorrequests', 'Request\DirectorRequestController@showRequestForm')->middleware('is_director');

/**
 * @api {post} /directorrequests Director Meetings
 * @apiName DirectorMeetings
 * @apiGroup Meetings
 * @apiPermission Director
 *
 * @apiParam {Number} teacherID Teacher ID, unique id.
 *
 * @apiSuccess {array} meetings All Meetings for selected Teacher.
 * @apiSuccess {view} ShowDirectorRequests Template Meetings for selected Teacher.
 */
Route::post('directorrequests', 'Request\DirectorRequestController@showRequests')->middleware('is_director');

/**
 * @api {get} /deleterequest/:id Delete Meeting
 * @apiName DeleteMeetings
 * @apiGroup Meetings
 * @apiPermission Director
 *
 * @apiParam {Number} id Meeting ID, unique id.
 */
Route::get('deleterequest/{id}', 'Request\DirectorRequestController@delRequest')->middleware('is_director');

// Users
/**
 * @api {get} /users All Users
 * @apiName GetUsers
 * @apiGroup Users
 * @apiPermission Director
 *
 * @apiSuccess {array} roles All Roles.
 * @apiSuccess {array} users All Users.
 * @apiSuccess {array} students All Students.
 * @apiSuccess {array} lessons All Lessons.
 * @apiSuccess {view} ShowDirectorUsersForm Template Users and their Roles.
 */
Route::get('users', 'Users\DirectorUserController@showUsersForm')->middleware('is_director');

/**
 * @api {post} /users Update Users
 * @apiName UpdateUsers
 * @apiGroup Users
 * @apiPermission Director
 *
 * @apiParam {array} users Key = userID Value = roleID.
 */
Route::post('users', 'Users\DirectorUserController@updateUsers')->middleware('is_director');

// No Permission Page
Route::get('NoPermission', function () { return view('NoPermission'); });

// Test
Route::post('test', function () {
    echo 'Test';
});
