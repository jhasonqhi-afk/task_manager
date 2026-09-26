<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $__env->yieldContent('title'); ?> - Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at 10% 20%, #dbeafe 0%, transparent 30%),
                radial-gradient(circle at 90% 80%, #bfdbfe 0%, transparent 30%),
                linear-gradient(135deg, #eff6ff, #dbeafe);
            min-height: 100vh;
            color: #1e3a5f;
        }

        /* =========================
           NAVIGATION
        ========================= */

        nav {
            height: 82px;
            background: linear-gradient(90deg, #173b70, #2563eb);
            color: white;
            padding: 0 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 20px rgba(30, 64, 175, 0.25);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 26px;
            font-weight: bold;
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            background: white;
            color: #2563eb;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .logo span {
            color: #60a5fa;
        }

        .nav-button {
            background: #3b9cff;
            color: white;
            text-decoration: none;
            padding: 13px 24px;
            border-radius: 30px;
            font-weight: bold;
            transition: 0.2s;
        }

        .nav-button:hover {
            background: #60a5fa;
            transform: translateY(-2px);
        }

        /* =========================
           MAIN CONTAINER
        ========================= */

        .container {
            max-width: 1250px;
            margin: 40px auto;
            padding: 0 25px;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            background: rgba(255, 255, 255, 0.92);
            border-radius: 24px;
            padding: 40px 45px;
            min-height: 300px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.12);
            margin-bottom: 28px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 450px;
            height: 450px;
            right: -100px;
            top: -150px;
            background: #dbeafe;
            border-radius: 50%;
            opacity: 0.7;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 650px;
        }

        .badge {
            display: inline-block;
            background: #dbeafe;
            color: #2563eb;
            padding: 9px 16px;
            border-radius: 30px;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-size: 58px;
            line-height: 1;
            margin-bottom: 20px;
            color: #173b70;
        }

        .hero h1 span {
            color: #2684ff;
        }

        .hero p {
            font-size: 20px;
            color: #64748b;
            margin-bottom: 25px;
        }

        /* Decorative clipboard */

        .clipboard {
            position: absolute;
            right: 13%;
            top: 45px;
            width: 150px;
            height: 190px;
            background: white;
            border: 8px solid #3b82f6;
            border-radius: 15px;
            transform: rotate(6deg);
            z-index: 3;
            box-shadow: 0 15px 25px rgba(37, 99, 235, 0.2);
        }

        .clip-top {
            position: absolute;
            width: 80px;
            height: 25px;
            background: #2563eb;
            border-radius: 8px;
            top: -20px;
            left: 27px;
        }

        .check-line {
            height: 18px;
            margin: 30px 15px -15px;
            border-radius: 4px;
            background: #bfdbfe;
        }

        /* =========================
           BUTTONS
        ========================= */

        .btn {
            display: inline-block;
            border: none;
            padding: 12px 20px;
            border-radius: 9px;
            text-decoration: none;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
        }

        .btn-edit {
            background: #f59e0b;
            color: white;
        }

        .btn-edit:hover {
            background: #d97706;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        .btn-secondary {
            background: #64748b;
            color: white;
        }

        /* =========================
           CARD
        ========================= */

        .card {
            background: rgba(255, 255, 255, 0.95);
            padding: 35px;
            border-radius: 24px;
            box-shadow: 0 15px 40px rgba(30, 64, 175, 0.10);
            margin-bottom: 28px;
        }

        /* =========================
           TASK HEADER
        ========================= */

        .task-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .task-title {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .task-icon {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #60a5fa;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .task-header h2 {
            font-size: 32px;
            color: #173b70;
        }

        /* =========================
           SEARCH
        ========================= */

        .search-box {
            width: 300px;
            padding: 13px 18px;
            border: 1px solid #dbeafe;
            border-radius: 30px;
            outline: none;
            font-size: 15px;
        }

        .search-box:focus {
            border-color: #3b82f6;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            background: #eff6ff;
            color: #173b70;
            padding: 18px;
            text-align: left;
            font-size: 15px;
        }

        td {
            padding: 20px 18px;
            border-bottom: 1px solid #e2e8f0;
            color: #475569;
        }

        tbody tr:hover {
            background: #f8fbff;
        }

        .task-name {
            font-weight: bold;
            color: #1e293b;
            font-size: 16px;
        }

        .task-description {
            color: #64748b;
        }

        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: bold;
        }

        .pending {
            background: #fef3c7;
            color: #b45309;
        }

        .completed {
            background: #dcfce7;
            color: #15803d;
        }

        /* =========================
           SUCCESS / ERROR
        ========================= */

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        /* =========================
           FORMS
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #334155;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            font-size: 15px;
            outline: none;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px #dbeafe;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* =========================
           FOOTER
        ========================= */

        .task-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            color: #64748b;
        }

        .quote {
            color: #3b82f6;
            font-style: italic;
            font-size: 16px;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 800px) {

            nav {
                padding: 0 20px;
            }

            .logo {
                font-size: 19px;
            }

            .container {
                margin: 25px auto;
            }

            .hero {
                padding: 30px;
            }

            .hero h1 {
                font-size: 42px;
            }

            .clipboard {
                display: none;
            }

            .task-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .search-box {
                width: 100%;
            }

            .task-footer {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo">
            <div class="logo-icon">✓</div>
            Personal <span>Task Manager</span>
        </div>

        <a href="<?php echo e(route('tasks.create')); ?>" class="nav-button">
            + Add Task
        </a>
    </nav>

    <main class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</body>
</html><?php /**PATH C:\Users\Lenovo\personal-task-manager\resources\views/app.blade.php ENDPATH**/ ?>