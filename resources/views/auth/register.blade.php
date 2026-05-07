<x-guest-layout>
    <!-- Heading with Icon -->
    <div style="text-align: center; margin-bottom: 32px;">
        <div style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--corporate-orange) 0%, #f59e0e 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
            <i class="bi bi-person-plus-fill" style="font-size: 28px; color: white;"></i>
        </div>
        <h2 style="color: var(--corporate-navy); font-weight: 700; font-size: 28px; margin: 0 0 8px 0; letter-spacing: -0.5px;">Daftar di SIPUS</h2>
        <p style="color: #858d97; font-size: 14px; margin: 0; line-height: 1.5;">Buat akun untuk memulai pengajuan surat online</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div style="margin-bottom: 20px; display: flex; flex-direction: column; gap: 8px;">
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-2 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap Anda" style="border: 2px solid #e5e9f0; border-radius: 10px; padding: 12px 16px; font-size: 15px; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#d0d8e0'" onmouseout="this.style.borderColor='#e5e9f0'" onfocus="this.style.borderColor='var(--corporate-teal)'; this.style.boxShadow='0 0 0 4px rgba(23, 162, 184, 0.1)'" onblur="this.style.borderColor='#e5e9f0'; this.style.boxShadow='none'" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: #dc3545; font-size: 13px;" />
        </div>

        <!-- Email Address -->
        <div style="margin-bottom: 20px; display: flex; flex-direction: column; gap: 8px;">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="contoh@email.com" style="border: 2px solid #e5e9f0; border-radius: 10px; padding: 12px 16px; font-size: 15px; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#d0d8e0'" onmouseout="this.style.borderColor='#e5e9f0'" onfocus="this.style.borderColor='var(--corporate-teal)'; this.style.boxShadow='0 0 0 4px rgba(23, 162, 184, 0.1)'" onblur="this.style.borderColor='#e5e9f0'; this.style.boxShadow='none'" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #dc3545; font-size: 13px;" />
        </div>

        <!-- Password -->
        <div style="margin-bottom: 20px; display: flex; flex-direction: column; gap: 8px;">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-2 w-full"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required autocomplete="new-password" style="border: 2px solid #e5e9f0; border-radius: 10px; padding: 12px 16px; font-size: 15px; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#d0d8e0'" onmouseout="this.style.borderColor='#e5e9f0'" onfocus="this.style.borderColor='var(--corporate-teal)'; this.style.boxShadow='0 0 0 4px rgba(23, 162, 184, 0.1)'" onblur="this.style.borderColor='#e5e9f0'; this.style.boxShadow='none'" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #dc3545; font-size: 13px;" />
        </div>

        <!-- Confirm Password -->
        <div style="margin-bottom: 24px; display: flex; flex-direction: column; gap: 8px;">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

            <x-text-input id="password_confirmation" class="block mt-2 w-full"
                            type="password"
                            name="password_confirmation" placeholder="••••••••" required autocomplete="new-password" style="border: 2px solid #e5e9f0; border-radius: 10px; padding: 12px 16px; font-size: 15px; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#d0d8e0'" onmouseout="this.style.borderColor='#e5e9f0'" onfocus="this.style.borderColor='var(--corporate-teal)'; this.style.boxShadow='0 0 0 4px rgba(23, 162, 184, 0.1)'" onblur="this.style.borderColor='#e5e9f0'; this.style.boxShadow='none'" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: #dc3545; font-size: 13px;" />
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full px-6 py-3 rounded-10px text-white" style="background: linear-gradient(135deg, var(--corporate-orange) 0%, #f59e0e 100%); border: none; cursor: pointer; font-weight: 600; font-size: 15px; transition: all 0.3s ease; border-radius: 10px; letter-spacing: 0.3px;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(253, 126, 20, 0.3)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
            {{ __('Buat Akun') }}
        </button>

        <!-- Login Link -->
        <div style="text-align: center; margin-top: 24px; padding-top: 24px; border-top: 1px solid #e5e9f0;">
            <p style="color: #858d97; font-size: 14px; margin: 0;">Sudah punya akun? 
                <a href="{{ route('login') }}" style="color: var(--corporate-teal); text-decoration: none; font-weight: 600; transition: all 0.3s ease;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Masuk di sini</a>
            </p>
        </div>

        <!-- Terms -->
        <p style="color: #858d97; font-size: 12px; text-align: center; margin: 16px 0 0 0; line-height: 1.5;">
            Dengan mendaftar, Anda menyetujui Syarat & Ketentuan kami
        </p>
    </form>
</x-guest-layout>
