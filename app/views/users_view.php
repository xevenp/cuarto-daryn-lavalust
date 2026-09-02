<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$users = $users ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Directory</title>
    <style>
        :root {
            --ink: #17211f;
            --muted: #6d7975;
            --paper: #f5f7f2;
            --surface: #ffffff;
            --line: #e1e8e2;
            --accent: #176b5b;
            --accent-soft: #e1f1eb;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            color: var(--ink);
            background: radial-gradient(circle at top right, #dcefe6 0, transparent 34%), var(--paper);
            font-family: "DM Sans", "Segoe UI", sans-serif;
        }
        .users-page { width: min(1120px, calc(100% - 40px)); margin: 0 auto; padding: 72px 0 80px; }
        .page-heading { display: flex; align-items: end; justify-content: space-between; gap: 24px; margin-bottom: 28px; }
        .eyebrow { margin: 0 0 10px; color: var(--accent); font-size: .73rem; font-weight: 800; letter-spacing: .14em; text-transform: uppercase; }
        h1 { max-width: 520px; margin: 0; font-family: Georgia, "Times New Roman", serif; font-size: clamp(2.6rem, 6vw, 5rem); font-weight: 400; line-height: .95; }
        .summary { display: flex; align-items: center; gap: 10px; padding: 12px 16px; border: 1px solid var(--line); border-radius: 8px; background: rgba(255,255,255,.72); color: var(--muted); font-size: .9rem; white-space: nowrap; }
        .summary strong { color: var(--ink); font-size: 1.3rem; }
        .table-shell { overflow: hidden; border: 1px solid var(--line); border-radius: 8px; background: var(--surface); box-shadow: 0 18px 45px rgba(23,33,31,.08); }
        .table-scroll { overflow-x: auto; }
        table { width: 100%; min-width: 680px; border-collapse: collapse; text-align: left; }
        th { padding: 17px 24px; border-bottom: 1px solid var(--line); background: #f8faf7; color: var(--muted); font-size: .7rem; font-weight: 800; letter-spacing: .1em; text-transform: uppercase; }
        td { padding: 20px 24px; border-bottom: 1px solid var(--line); font-size: .95rem; }
        tbody tr { transition: background-color 160ms ease; }
        tbody tr:hover { background: #f7fbf8; }
        tbody tr:last-child td { border-bottom: 0; }
        td:first-child { color: var(--accent); font-variant-numeric: tabular-nums; font-weight: 800; }
        td:nth-child(2), td:nth-child(3) { font-weight: 700; }
        td:nth-child(4) { color: var(--muted); }
        td:last-child span { display: inline-block; padding: 7px 11px; border-radius: 999px; background: var(--accent-soft); color: var(--accent); font-size: .82rem; font-weight: 700; }
        .empty-state { padding: 64px 24px; color: var(--muted); text-align: center; }
        .empty-state strong { display: block; margin-bottom: 8px; color: var(--ink); font-family: Georgia, "Times New Roman", serif; font-size: 1.5rem; font-weight: 400; }
        @media (max-width: 640px) {
            .users-page { width: min(100% - 24px, 1120px); padding: 42px 0 56px; }
            .page-heading { align-items: start; flex-direction: column; margin-bottom: 20px; }
            .summary { align-self: stretch; justify-content: space-between; }
            th, td { padding-right: 16px; padding-left: 16px; }
        }
    </style>
</head>
<body>
    <main class="users-page">
        <header class="page-heading">
            <div>
                <p class="eyebrow">Directory / People</p>
                <h1>Users directory</h1>
            </div>
            <div class="summary">
                <strong><?= count($users); ?></strong>
                <span><?= count($users) === 1 ? 'registered user' : 'registered users'; ?></span>
            </div>
        </header>
        <section class="table-shell" aria-label="Registered users">
            <?php if (empty($users)): ?>
                <div class="empty-state"><strong>No users yet</strong>The directory is ready for its first entry.</div>
            <?php else: ?>
                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr><th scope="col">ID</th><th scope="col">First Name</th><th scope="col">Last Name</th><th scope="col">Email</th><th scope="col">Username</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= htmlspecialchars((string) ($user['id'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars((string) ($user['firstname'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars((string) ($user['lastname'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars((string) ($user['email'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><span><?= htmlspecialchars((string) ($user['username'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
