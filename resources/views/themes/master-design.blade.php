<div class="main-invitation" style="font-family: 'serif'; color: #333; text-align: center; padding: 50px;">
    <h1 style="text-transform: uppercase; letter-spacing: 2px;">
        {{ $invitation->title ?? 'Judul Undangan' }}
    </h1>
    <div
        style="background: {{ $invitation->theme->color ?? '#f4f4f5' }}; padding: 20px; border-radius: 20px; margin: 20px auto; max-width: 600px;">
        <div class="hero-image">
            @if ($invitation->theme->thumbnail)
                <img src="{{ asset('storage/' . $invitation->theme->thumbnail) }}" alt="{{ $invitation->theme->name }}"
                    style="width: 100%; max-width: 400px; border-radius: 15px; shadow: lg;">
            @endif
        </div>
        <div class="content" style="margin-top: 20px;">
            <h2 style="font-weight: 900; color: #b45309;">
                Desain: {{ $invitation->theme->name }}
            </h2>
            <p style="font-size: 14px; color: #666; font-style: italic;">
                Edisi Terbatas - Rp{{ number_format($invitation->theme->price, 0, ',', '.') }}
            </p>
        </div>
    </div>
    <div class="details" style="margin-top: 30px;">
        <p>Kami mengundang Anda dalam acara kami...</p>
    </div>
</div>