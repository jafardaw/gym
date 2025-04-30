<div class="container">
    <div class="alert alert-warning text-center">
        <h4><i class="fas fa-lock"></i> حسابك موقوف مؤقتاً</h4>
        @if($until)
            <p>سيتم تفعيل حسابك في: {{ $until }}</p>
        @endif
        <p>السبب: مخالفة شروط الاستخدام</p>
        <a href="{{ route('contact') }}" class="btn btn-outline-primary">
            التواصل مع الدعم الفني
        </a>
    </div>
</div>