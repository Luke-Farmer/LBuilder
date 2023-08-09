<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-auth">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 auth-form-container shadow-md overflow-hidden">
        <div class="flex flex-row justify-center items-center" style="margin-bottom: 0.75rem;">
            {{ $logo }}
            <h1 class="text-white" style="font-size: 2rem;font-weight: bold;">
                @if(Illuminate\Support\Facades\Route::is('login'))
                    Welcome Back!
                @elseif(Illuminate\Support\Facades\Route::is('register'))
                    Create account!
                @endif
            </h1>
        </div>
        <p class="text-white text-center" style="margin-bottom: 1.5rem;">If you need any assistance, send a message to {{ config('app.support_email') ?? 'Set `SUPPORT_EMAIL` in .env file' }}. We will get back to you as soon as possible!</p>
        {{ $slot }}
    </div>
</div>
