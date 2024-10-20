    <?php

    use App\Http\Controllers\Auth\ForgotPasswordController;
    use App\Http\Controllers\Auth\ResetPasswordController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\EmployerController;
    use App\Http\Controllers\JobApplicationController;
    use App\Http\Controllers\JobController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\RegisteredUserController;
    use App\Http\Controllers\SearchController;
    use App\Http\Controllers\SessionController;
    use App\Http\Controllers\TagController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', [JobController::class, 'index']);

    Route::get('/employers', [EmployerController::class, 'index']);
    Route::get('/employers/{employer}', [EmployerController::class, 'show']);

    Route::middleware('auth')->group(function () {
        Route::get('/jobs/create', [JobController::class, 'create']);
        Route::post('/jobs', [JobController::class, 'store']);
        Route::get('jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
        Route::patch('jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
        Route::delete('jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');

        Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
        Route::get('/profile/edit', [ProfileController::class, 'jobSeekerEdit'])->name('profile.edit');
        Route::patch('/profile/edit', [ProfileController::class, 'jobSeekerUpdate'])->name('profile.update');
        Route::get('/employers/{employer}/edit', [EmployerController::class, 'edit'])->name('employers.edit');
        Route::patch('/employers/{employer}', [EmployerController::class, 'update'])->name('employers.update');

        Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'apply'])->name('jobs.apply');
        Route::get('/resumes/{application}', [JobController::class, 'downloadResume'])->name('resumes.download');
        Route::delete('/applications/{application}', [JobApplicationController::class, 'delete'])->name('applications.delete');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

    Route::get('/search', SearchController::class);
    Route::get('/tags/{tag:name}', TagController::class);

    Route::middleware('guest')->group(function () {
        Route::get('/register', [RegisteredUserController::class, 'showSelection']);
        Route::get('/register/job-seeker', [RegisteredUserController::class, 'showJobSeekerForm']);
        Route::get('/register/employer', [RegisteredUserController::class, 'showEmployerForm']);

        Route::post('/register/job-seeker', [RegisteredUserController::class, 'registerJobSeeker']);
        Route::post('/register/employer', [RegisteredUserController::class, 'registerEmployer']);

        Route::get('/login', [SessionController::class, 'create']);
        Route::post('/login', [SessionController::class, 'store']);
    });

    Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
