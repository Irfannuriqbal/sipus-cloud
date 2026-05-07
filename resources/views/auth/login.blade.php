<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <!-- Heading with Icon -->
    <div style="text-align: center; margin-bottom: 32px;">
        <div style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--corporate-teal) 0%, #1385a6 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
            <i class="bi bi-lock-fill" style="font-size: 28px; color: white;"></i>
        </div>
        <h2 style="color: var(--corporate-navy); font-weight: 700; font-size: 28px; margin: 0 0 8px 0; letter-spacing: -0.5px;">Masuk ke SIPUS</h2>
        <p style="color: #858d97; font-size: 14px; margin: 0; line-height: 1.5;">Akses akun Anda untuk melanjutkan pengajuan surat</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div style="margin-bottom: 20px;">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="contoh@email.com" style="border: 2px solid #e5e9f0; border-radius: 10px; padding: 12px 16px; font-size: 15px; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#d0d8e0'" onmouseout="this.style.borderColor='#e5e9f0'" onfocus="this.style.borderColor='var(--corporate-teal)'; this.style.boxShadow='0 0 0 4px rgba(23, 162, 184, 0.1)'" onblur="this.style.borderColor='#e5e9f0'; this.style.boxShadow='none'" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #dc3545; font-size: 13px;" />
        </div>

        <!-- Password -->
        <div style="margin-bottom: 20px;">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-2 w-full"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required autocomplete="current-password" style="border: 2px solid #e5e9f0; border-radius: 10px; padding: 12px 16px; font-size: 15px; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#d0d8e0'" onmouseout="this.style.borderColor='#e5e9f0'" onfocus="this.style.borderColor='var(--corporate-teal)'; this.style.boxShadow='0 0 0 4px rgba(23, 162, 184, 0.1)'" onblur="this.style.borderColor='#e5e9f0'; this.style.boxShadow='none'" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #dc3545; font-size: 13px;" />
        </div>

        <!-- Remember Me -->
        <div style="margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between;">
            <label for="remember_me" class="inline-flex items-center" style="cursor: pointer;">
                <input id="remember_me" type="checkbox" class="rounded" style="width: 18px; height: 18px; border-color: #d0d8e0; accent-color: var(--corporate-teal); cursor: pointer;" name="remember">
                <span class="ms-2 text-sm" style="color: var(--corporate-navy); font-weight: 500;">{{ __('Ingat saya') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="text-sm" style="color: var(--corporate-teal); text-decoration: none; transition: all 0.3s ease; font-weight: 500;" href="{{ route('password.request') }}" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                    {{ __('Lupa password?') }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full px-6 py-3 rounded-10px text-white" style="background: linear-gradient(135deg, var(--corporate-teal) 0%, #1385a6 100%); border: none; cursor: pointer; font-weight: 600; font-size: 15px; transition: all 0.3s ease; border-radius: 10px; letter-spacing: 0.3px;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(23, 162, 184, 0.3)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
            {{ __('Masuk ke Akun') }}
        </button>

        <!-- Register Link -->
        <div style="text-align: center; margin-top: 24px; padding-top: 24px; border-top: 1px solid #e5e9f0;">
            <p style="color: #858d97; font-size: 14px; margin: 0;">Belum punya akun? 
                <a href="{{ route('register') }}" style="color: var(--corporate-teal); text-decoration: none; font-weight: 600; transition: all 0.3s ease;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Buat akun baru</a>
            </p>
        </div>
    </form>
</x-guest-layout>
