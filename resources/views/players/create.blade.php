<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل لاعب رياضي</title>

    
    <style>
        body {
            background-color: #111;
            color: #f0c040;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            direction: rtl;
            margin: 0;
        }

        .container {
            background-color: #1c1c1c;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffd700;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #f0c040;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #f0c040;
            border-radius: 8px;
            background-color: #2a2a2a;
            color: #fff;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            background-color: #f0c040;
            color: #000;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #ffd700;
        }

        .success {
            text-align: center;
            color: #00ff88;
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>تسجيل لاعب جديد - VIP</h2>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('players.store') }}">
            @csrf

            <label>اسم اللاعب:</label>
            <input type="text" name="name" required>

            <label>مدة الاشتراك:</label>
            <select name="period" required>
                <option value="15">نصف شهر (15 يوم)</option>
                <option value="30">شهر كامل (30 يوم)</option>
            </select>

            <button type="submit">تسجيل</button>
        </form>
    </div>

</body>
</html>
