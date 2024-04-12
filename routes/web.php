<?php
use App\Http\Controllers\CommentaireController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::redirect('/login', '/login');
    // Route::get('/home', function () {
    //     if (session('status')) {
    //         return redirect()->route('admin.home')->with('status', session('status'));
    //     }
    //     return redirect()->route('admin.home');
    // });

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/home/{projet}', 'HomeController@index')->name('home.index');
Route::get('/MesTaches', 'HomeController@tache')->name('tache');

Route::get('/MesProjets','MesProjetsController@index')->name('MesProjets.index');

Auth::routes();

Route::group(['prefix' => 'collaboration', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    //Route::get('/MesProjets','MesProjetsController@index')->name('admin.MesProjets.index');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Projets
    Route::delete('projets/destroy', 'ProjetsController@massDestroy')->name('projets.massDestroy');
    Route::post('projets/media', 'ProjetsController@storeMedia')->name('projets.storeMedia');
    Route::post('projets/ckmedia', 'ProjetsController@storeCKEditorImages')->name('projets.storeCKEditorImages');
    Route::resource('projets', 'ProjetsController');

    // Taches
    Route::delete('taches/destroy', 'TachesController@massDestroy')->name('taches.massDestroy');
    Route::resource('taches', 'TachesController');

    // Reunions
    Route::delete('reunions/destroy', 'ReunionsController@massDestroy')->name('reunions.massDestroy');
    Route::resource('reunions', 'ReunionsController');

    //Messages
    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');

    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');

   //Video chat
    Route::get('/streaming', 'WebrtcStreamingController@index')->name('video-broadcast');
    Route::get('/streaming/{streamId}', 'WebrtcStreamingController@consumer');
    Route::post('/stream-offer', 'WebrtcStreamingController@makeStreamOffer');
    Route::post('/stream-answer', 'WebrtcStreamingController@makeStreamAnswer');



});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

//Commentaire
Route::get('/commentaire',[CommentaireController::class, 'create'])->name('commentaire.create');
Route::post('/commentaire', [CommentaireController::class, 'store'])->name('commentaire.store');

// Route::get('projet/{projet}','Admin\ProjetsController@tache');
Route::get('projet/{projet}','Admin\ProjetsController@taches')->name('projet.taches');
Route::get('tache/{tache}','Admin\TachesController@comment');
Route::get('tache/{tache}/commentaire','Admin\TachesController@commentaire');
Route::post('tache/commentaire','Admin\TachesController@storecomment');

