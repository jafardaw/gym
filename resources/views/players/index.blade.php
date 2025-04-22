<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>عرض اللاعبين</title>
    <style>
        body {
            background-color: #e6e6e6;
            font-family: 'Tahoma', sans-serif;
            direction: rtl;
            padding: 30px;
            margin: 0;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #2a2a2a;
            font-size: 30px;
            margin-bottom: 40px;
        }

        .player-card {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .player-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
        }

        .player-card h3 {
            margin: 0;
            color: #4caf50;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .player-card p {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .btn:disabled {
            background-color: #bbb;
            cursor: not-allowed;
            transform: none;
        }

        .success, .error {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .success {
            color: #4CAF50;
        }

        .error {
            color: #e74c3c;
        }

        /* Animation for cards */
        .player-card {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script>
        function hideRenewButton(button) {
            button.style.display = 'none';
        }
    </script>
</head>
<body>

    <h2>قائمة اللاعبين</h2>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @elseif(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    @foreach($players as $player)
    <div class="player-card">
        <h3>{{ $player->name }}</h3>
        <p><strong>تاريخ البداية:</strong> {{ \Carbon\Carbon::parse($player->start_date)->format('Y-m-d') }}</p>
        <p><strong>تاريخ الانتهاء:</strong> {{ \Carbon\Carbon::parse($player->end_date)->format('Y-m-d') }}</p>
        <p><strong>عدد الأيام الكلي:</strong> {{ $player->days_count }}</p>
        <p><strong>الأيام المستخدمة:</strong> {{ $player->days_used }}</p>
        <p><strong>الأيام المتبقية:</strong> {{ $player->days_count - $player->days_used }}</p>

        @if($player->days_used < $player->days_count)
    <form method="POST" action="{{ route('players.markDay', $player->id) }}">
        @csrf
        <button type="submit" class="btn">حضر اليوم</button>
    </form>
@else
    <button class="btn" disabled>انتهى الاشتراك</button>
@endif

@if($player->days_used >= $player->days_count)
<form method="POST" action="{{ route('players.renew', $player->id) }}" onsubmit="hideRenewButton(this.querySelector('button'))">
    @csrf
    <input type="number" name="period" min="1" required placeholder="عدد الأيام الجديدة">
    <button type="submit" class="btn">تجديد الاشتراك</button>
</form>
@endif

    </div>
@endforeach


</body>
</html>
