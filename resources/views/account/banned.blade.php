<div class="container">
    <div class="alert alert-danger text-center">
        <h4><i class="fas fa-ban"></i> حسابك محظور</h4>
        @if(session('ban_reason'))
            <p class="mt-3">السبب: {{ session('ban_reason') }}</p>
        @endif
        <p>لا يمكنك الوصول للمنصة بسبب مخالفات متكررة</p>
    </div>
</div>